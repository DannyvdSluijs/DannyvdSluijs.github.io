---
title: 'The unknown Composer commands'
date: 2023-08-25 07:47:55
layout: post
tags: 
- PHP
- Composer

image: "images/og-images/the-unknown-composer-commands.jpg"

ogImage:
    title: "The unknown Composer commands"
    subtitle: "Discovering what they do and how they can help"
    imageUrl: "https://avatars.githubusercontent.com/u/618940?s=36"
    fileName: "the-unknown-composer-commands"
---

# The unknown Composer commands
If you're programming in PHP your familiar with [Composer](https://getcomposer.org/) and more specifically with the 
`composer install`, `composer require` and `composer update` commands. But did you know there are more commands? Let's 
take a look at these unknown commands and what they offer.

## Composer outdated
The `composer outdated` command returns a list of installed packages and the latest version available. Using the flags 
`--direct --no-dev --patch-only --locked` the full list can be reduced to a set of direct non-dev dependencies which 
have a patch version update available. These should be easy updates to apply to you codebase. 

```
$ composer outdated
Color legend:
- patch or minor release available - update recommended
- major release available - update possible
  doctrine/dbal 3.6.4 3.6.6 Powerful PHP database abstraction layer (DBAL) with many features for database schema introspection and management.
  laravel/framework v9.52.10 v10.20.0 The Laravel Framework.
```

## Composer audit
Using `composer audit` command runs a check of the installed versions of your dependencies against the 
[Packagist Security Advisories](https://packagist.org/apidoc#list-security-advisories) similar to a `npm audit` This 
command is actually one you should run in the project pipeline, where it would block any work to be merged making fixing
the vulnerability the top priority.

```
$ composer audit
Found 1 security vulnerability advisory affecting 1 package:
+-------------------+-------------------------------------------------------------+
| Package           | symfony/http-kernel                                         |
| CVE               | CVE-2022-24894                                              |
| Title             | CVE-2022-24894: Prevent storing cookie headers in HttpCache |
| URL               | https://symfony.com/cve-2022-24894                          |
| Affected versions | >=2.0.0,<2.1.0|>=2.1.0, ... ,<6.1.12|>=6.2.0,<6.2.6         |
| Reported at       | 2023-02-01T08:00:00+00:00                                   |
+-------------------+-------------------------------------------------------------+
```

This command also has a `--locked` flag to run the check based on the `composer.lock` contents instead of the installed 
versions on disk. And similar to the `composer outdated` command there is also a `--no-dev` flag, but depending on your 
level of strictness you may want to skip this flag as all vulnerabilities should be fixed.

## Composer bump
The `composer bump` command might the most unknown command. This command updates the requirements in the `composer.json` 
file bumping the requirement constraint to the current version installed. This would prevent accidental downgrades of a 
package. Secondly there is a bonus side effect, making the dependency tree resolution faster as the number of packages 
that are possible for installation is being reduced.

```
$ composer bump
./composer.json has been updated (17 changes).
```

## Composer depends
Ever wondered why a specific package is installed? This is where the `composer depends` command can help. Using the 
`composer outdated` or `composer audit` commands you might run into a child dependency deeper in the dependency tree, 
and you want to see how this is a dependency for your project.

```
$ composer depends json-mapper/json-mapper --tree
json-mapper/json-mapper 2.14.4 Map JSON structures to PHP classes
└──json-mapper/laravel-package 2.3.0 (requires json-mapper/json-mapper ^2.3)
   └──infi/infilytics dev-develop (requires json-mapper/laravel-package ^2.3)
```

The above output shows that `json-mapper/json-mapper` is a child dependency of `infi/infilytics` because 
`json-mapper/laravel-package` requires it.

## Composer prohibits
With the command `composer prohibits` you can achieve (kind of) the opposite of the `composer depends` command. Using 
this command you can get a detailed output on why a certain package cannot be installed, resulting in a more effective 
search for a solution.

```
$ composer prohibits "json-mapper/json-mapper" "^1.0"
json-mapper/laravel-package 2.4.0       requires         json-mapper/json-mapper (^2.3)
json-mapper/json-mapper     1.4.2       requires         psr/log (^1.1)                            
infi/infilytics             dev-develop does not require psr/log (but 3.0.0 is installed)          
json-mapper/json-mapper     1.4.2       requires         psr/simple-cache (^1.0)                   
infi/infilytics             dev-develop does not require psr/simple-cache (but 3.0.0 is installed)
```

In the above example the package `json-mapper/json-mapper` with version constraint `^1.0` cannot be installed as the 
installed `json-mapper/laravel-package` with version `2.4.0. require `json-mapper/json-mapper` with the version constraint
`^2.3`

## Composer licenses
It might be the case that licenses of your dependencies should be using a limited set of one specific license type should 
never be part of you application. For this scenario you can use the `composer licenses` command which will return a list
of all your dependencies and the license listed in their respective `composer.json`.

```
$ composer licenses
...
json-mapper/json-mapper                2.19.0              MIT
json-mapper/laravel-package            2.4.0               MIT
laravel/framework                      v9.52.10            MIT
phpoption/phpoption                    1.9.1               Apache-2.0
phpunit/phpunit                        9.6.9               BSD-3-Clause
...
```

## Composer clear-cache
This final command is one that you might only need in very rare cases, but it is still a command that can help you in
case you run into weird behaviour during `composer install` or `composer require` commands. Running the 
`composer clear-cache` command will remove all you local caches that Composer uses in the background.

```
$ composer clear-cache
Clearing cache (cache-vcs-dir): /Users/danny/Library/Caches/composer/vcs
Clearing cache (cache-repo-dir): /Users/danny/Library/Caches/composer/repo
Clearing cache (cache-files-dir): /Users/danny/Library/Caches/composer/files
Clearing cache (cache-dir): /Users/danny/Library/Caches/composer
All caches cleared.
```

This command can also be very helpful if you want to clean up packages you should no longer have in your possession, due 
to a project termination or an expired license.

## Closing remarks
As you can see there are move Composer commands then you might have guessed and there are even more. If you want to see
all available commands you can run `composer list` to get a complete overview. Using this blog I hope the above commands 
are now "less unknown" as they are very useful in some situations.

 See if you can add steps to your pipeline for `composer audit` and `composer outdated`. Combined with a scheduled run
 of the pipeline(s) in the early morning can make you aware of a vulnerability or upgrade even before you have your first
 sip of coffee.