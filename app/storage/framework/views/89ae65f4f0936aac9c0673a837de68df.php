<?php $__env->startSection('content'); ?>

    <main id="content" class="mx-auto max-w-7xl py-16 px-8">
        <?php echo $__env->make('hyde::components.post.article', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('hyde::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/layouts/post.blade.php ENDPATH**/ ?>