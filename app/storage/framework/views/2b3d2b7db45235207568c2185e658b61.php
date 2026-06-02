<?php $__env->startSection('content'); ?>

    <main id="content" class="mx-auto max-w-7xl py-16 px-8">
        <article class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mx-auto', config('markdown.prose_classes', 'prose dark:prose-invert'), 'torchlight-enabled' => Features::hasTorchlight()]); ?>">
            <?php echo e($content); ?>

        </article>
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('hyde::layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/dannyvandersluijs/Projects/DannyvdSluijs.github.io/resources/views/vendor/hyde/layouts/page.blade.php ENDPATH**/ ?>