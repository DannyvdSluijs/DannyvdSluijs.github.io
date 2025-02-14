---
title: "Figuring out how parallel processing works in PHP"
description: "Saving time of a CI/CD pipeline and learning how parallel processing works"
author: "Danny"
date: "2023-06-21"

#image: "images/og-images/figuring-ou-how-parallel-processing-works-in-php.jpg"

ogImage:
    title: "Figuring out how parallel processing works in PHP"
    subtitle: "Saving time of a CI/CD pipeline and learning how parallel processing works"
    imageUrl: "https://avatars.githubusercontent.com/u/618940?s=36"
    fileName: "figuring-out-how-parallel-processing-works-in-php"
---

# Figuring out how parallel processing works in PHP
Parallel processing isn't very common in PHP projects at least when you do this on the command line using process forking.
This blogs dives into how you can use the [Process Control Extension](https://www.php.net/manual/en/book.pcntl.php) in PHP to
get speed gains by processing in parallel.

# Introduction
For the project I do at [Infi](https://www.infi.nl) I was working on some speed improvements of a GitLab CI/CD pipeline.
One of the bigger improvements I achieved to bring down the execution time of [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer)
down from `1m10s` to `6s` by two relatively easy changes:
1. Switching off [XDebug](https://xdebug.org) before running PHPCS: Using XDebug 3 you can set the mode using an environment variable named `XDEBUG_MODE`. Setting the value to `off` causes XDebug to not  do anything and you close to zero overhead with XDebug installed. This dropped the process from `1m10s` to `29s`
2. Enable parallel processing: PHPCS was added to the CI/CD pipeline but never tweaked beyond the standard and rules that should be applied. Switching from 1 parallel process (default) to 12 processes dropped the remaining `29s` execution time to only `6s`

The first step was easily applied to all steps in the CI/CD pipeline to set `XDEBUG_MODE=off` on the pipeline level and
only set `XDEBUG_MODE=coverage` at job level when needed.

The second option got me looking through the tools in use if there is a parallel processing option. On of the tools
used is [PHPMD](https://github.com/phpmd/phpmd), and apparently it did **not** have such an option. And I found a [GitHub issue](https://github.com/phpmd/phpmd/issues/535)
was open for this feature.

Curious on how PHPCS was doing the parallel processing and how this could be applied to PHPMD I've created a [playground repo](https://github.com/DannyvdSluijs/PhpParallelProcessing). 
I looked into parallel processing in PHP which is done using the [Process Control Extension](https://www.php.net/manual/en/book.pcntl.php)


## Results
This playground offers a CLI command that can be controlled using two parameters
- `--iterations | -i`: Controls the number of iterations being run (default 10)
- `--parallel | -p`: Controls the number of parallel processes (default 1)

Each iteration is executing a `sleep(1)` to simulate a time-consuming process

| Command                        | Time results                                                          |
|--------------------------------|-----------------------------------------------------------------------|
| `time ./application.php`       | `./application.php  0.05s user 0.03s system 0% cpu 10.162 total`      |
| `time ./application.php -p 1`  | `./application.php -p 1  0.05s user 0.02s system 0% cpu 10.094 total` |
| `time ./application.php -p 2`  | `./application.php -p 2  0.05s user 0.03s system 1% cpu 5.085 total`  |
| `time ./application.php -p 3`  | `./application.php -p 3  0.05s user 0.02s system 1% cpu 4.080 total`  |
| `time ./application.php -p 5`  | `./application.php -p 5  0.05s user 0.02s system 3% cpu 2.071 total`  |
| `time ./application.php -p 10` | `./application.php -p 10  0.05s user 0.02s system 6% cpu 1.073 total` |

This showed that the workload goes down in time using the following formula `ceil(iteration / parallel processes) * 1s`