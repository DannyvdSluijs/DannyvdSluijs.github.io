<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo e($page->title()); ?></title>

<?php if(file_exists(Hyde::mediaPath('favicon.ico'))): ?>
    <link rel="shortcut icon" href="<?php echo e(Hyde::relativeLink('media/favicon.ico')); ?>" type="image/x-icon">
<?php endif; ?>


<?php echo $__env->make('hyde::layouts.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('hyde::layouts.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(Features::hasDarkmode()): ?>
    
    <meta id="meta-color-scheme" name="color-scheme" content="<?php echo e(config('hyde.default_color_scheme', 'light')); ?>">
    <script>if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) { document.documentElement.classList.add('dark'); document.getElementById('meta-color-scheme').setAttribute('content', 'dark');} else { document.documentElement.classList.remove('dark') } </script>
<?php endif; ?>


<?php echo $__env->yieldPushContent('head'); ?>


<?php echo config('hyde.head'); ?>

<?php echo Includes::html('head'); ?>

<?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/layouts/head.blade.php ENDPATH**/ ?>