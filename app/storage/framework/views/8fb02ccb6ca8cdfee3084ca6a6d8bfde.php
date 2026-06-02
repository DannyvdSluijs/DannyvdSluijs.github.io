<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'level' => 1,
    'id' => null,
    'extraAttributes' => [],
    'addPermalink' => config('markdown.permalinks.enabled', true),
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'level' => 1,
    'id' => null,
    'extraAttributes' => [],
    'addPermalink' => config('markdown.permalinks.enabled', true),
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $tag = 'h' . $level;
    $id = $id ?? \Illuminate\Support\Str::slug($slot);

    $extraAttributes = array_merge($extraAttributes, [
        'id' => $addPermalink ? $id : ($extraAttributes['id'] ?? null),
        'class' => trim(($extraAttributes['class'] ?? '') . ($addPermalink ? ' group w-fit scroll-mt-2' : '')),
    ]);
?>

<<?php echo e($tag); ?> <?php echo e($attributes->merge($extraAttributes)); ?>>
    <?php echo $slot; ?>

    <?php if($addPermalink === true): ?>
        <a href="#<?php echo e($id); ?>" class="heading-permalink opacity-0 ml-1 transition-opacity duration-300 ease-linear px-1 group-hover:opacity-100 focus:opacity-100 group-hover:grayscale-0 focus:grayscale-0" title="Permalink">
            #
        </a>
    <?php endif; ?>
</<?php echo e($tag); ?>>
<?php /**PATH /Users/dannyvandersluijs/Projects/DannyvdSluijs.github.io/vendor/hyde/framework/src/Foundation/Providers/../../../resources/views/components/markdown-heading.blade.php ENDPATH**/ ?>