<!DOCTYPE html>
<html lang="<?php echo e(config('hyde.language', 'en')); ?>">
<head>
    <?php echo $__env->make('hyde::layouts.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body id="app" class="flex flex-col min-h-screen overflow-x-hidden dark:bg-gray-900 dark:text-white" x-data="{ navigationOpen: false }" x-on:keydown.escape="navigationOpen = false;">
    <?php echo $__env->make('hyde::components.skip-to-content-button', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('hyde::layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section>
        <?php echo $__env->yieldContent('content'); ?>
    </section>

    <?php echo $__env->make('hyde::layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('hyde::layouts.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH /Users/dannyvandersluijs/Projects/DannyvdSluijs.github.io/resources/views/vendor/hyde/layouts/app.blade.php ENDPATH**/ ?>