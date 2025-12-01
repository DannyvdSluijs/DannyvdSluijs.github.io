---
title: 'Replacing Constants with Enums Using Rector'
description: "Rector is a powerful tool for upgrading your codebase to modern standards. One rule I missed was the ability to replace deprecated constants with an enum."
category: rector
author: 'Danny van der Sluijs'
date: '2025-12-01 19:57'
---

## Replacing Constants with Enums Using Rector
[Rector](https://getrector.com/) is a powerful tool with a large set of [rules](https://getrector.com/find-rule) to 
update your codebase to modern standards. Over time, I've come across the same situation more than once. In codebases 
that predate PHP enums, this was often managed using a set of public constants as a poor man’s enum.

When the codebase eventually moves to a PHP version with enum support, the constants are usually mirrored into a new 
enum type and deprecated. Replacing all the usages of the constants is postponed as tech debt for a later sprint.

Seeing this another time around, I used ChatGPT to quickly draft a proof of concept. It quickly became clear that Rector 
was the right tool for the job and the LLM helped with the first version, replacing the before code in the example below 
with the after version.
```php
// Before
$value = Suit::HEARTS;

// After
$value = SuitEnum::Hearts->value;

```
After iterating—adding configurability, handling self-references, and ensuring deterministic output—I ended up with a 
rule that does all the lifting, produces deterministic results and helps us get rid of these deprecated constants.

My takeaway from the process was that Rector provides a very good developer experience and making your own rule is not 
that difficult. The `refactor()` function of the rule lets you focus directly on the cases you want to transform and 
simply return `null` when you want to skip the current node that is being inspected. 

An example of the configuration and final rule I now use to migrate code away from deprecated constants looks as follows:
```php
# ./rector.php
return RectorConfig::configure()
    ->withPaths([__DIR__ . '/src'])
    ->withSkipPath('./vendor')
    ->withConfiguredRule(\App\Rector\ReplaceClassConstantWithEnumCaseRule::class, [
        'constClass' => Suit::class,
        'enumClass' => SuitEnum::class,
        'valueReplacements' => [
            'HEARTS' => 'Hearts',
            'DIAMONDS' => 'Diamonds',
            'CLUBS' => 'Clubs',
            'SPADES' => 'Spades',
        ]
    ])
    ->withSkip([
        // Skip the default set list to avoid unrelated changes.
        SetList::TYPE_DECLARATION,
    ]);
```

```php
# ./src/Rector/ReplaceClassConstantWithEnumCaseRule.php
<?php

declare(strict_types=1);

namespace App\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\ClassConstFetch;
use Rector\CodingStyle\Node\NameImporter;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

class ReplaceClassConstantWithEnumCaseRule extends AbstractRector implements ConfigurableRectorInterface
{
    private string $constClass = '';
    private string $enumClass = '';
    /** @var array<string, string>  */
    private array $valueReplacements = [];

    public function __construct(
        private readonly NameImporter $nameImporter,
    ) {}


    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(sprintf('Replace %s::* constants with %s enum cases', $this->constClass, $this->enumClass), [
            new CodeSample(
                sprintf('$value = %s::%s;', $this->constClass, array_key_first($this->valueReplacements)),
                sprintf('$value = %s::%s->value;', $this->enumClass, array_first($this->valueReplacements))
            ),
        ]);
    }

    public function getNodeTypes(): array
    {
        return [ClassConstFetch::class];
    }

    public function refactor(Node $node): ?Node
    {
        // No refactor, if the node is not a class constant fetch
        if (! $node instanceof ClassConstFetch) {
            return null;
        }

        // No refactor, if the constant does not belong to the configured class or is not a self reference
        if (! $this->isName($node->class, $this->constClass) && $this->getName($node->class) !== 'self') {
            return null;
        }

        // No refactor, if the self is in a scope different from the const class we are refactoring.
        if ($this->getName($node->class) === 'self' && $node->getAttribute('scope')?->getClassReflection()->getName() !== $this->constClass) {
            return null;
        }

        // No refactor, if no replacement was registered
        $constName = $this->getName($node->name);
        $replacement = $this->valueReplacements[$constName] ?? null;
        if ($replacement === null) {
            return null;
        }

        // Create short name and trigger import
        $enumClass = new Node\Name\FullyQualified($this->enumClass);
        $shortName = $this->nameImporter->importName($enumClass, $this->file, []);
        if ($shortName === null) {
            return null;
        }

        return new Node\Expr\PropertyFetch(
            new ClassConstFetch(new Node\Name($shortName), $replacement),
            'value'
        );
    }

    /** @param array<array-key, mixed> $configuration */
    public function configure(array $configuration): void
    {
        Assert::keyExists($configuration, 'constClass');
        Assert::keyExists($configuration, 'enumClass');
        Assert::keyExists($configuration, 'valueReplacements');
        Assert::isArray($configuration['valueReplacements']);
        Assert::allString($configuration['valueReplacements']);
        Assert::allString(array_keys($configuration['valueReplacements']));

        $this->constClass = $configuration['constClass'];
        $this->enumClass = $configuration['enumClass'];
        $this->valueReplacements = $configuration['valueReplacements'];
    }
}
```
