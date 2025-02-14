
<style>[x-cloak] {display: none!important}</style>


<?php if(config('hyde.load_app_styles_from_cdn', false)): ?>
    <link rel="stylesheet" href="<?php echo e(Asset::cdnLink('app.css')); ?>">
<?php elseif(Asset::hasMediaFile('app.css')): ?>
    <link rel="stylesheet" href="<?php echo e(Asset::mediaLink('app.css')); ?>">
<?php endif; ?>


<?php if(config('hyde.use_play_cdn', false)): ?>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>tailwind.config = { <?php echo Asset::injectTailwindConfig(); ?> }</script>
    <script>console.warn('The HydePHP TailwindCSS Play CDN is enabled. This is for development purposes only and should not be used in production.', 'See https://hydephp.com/docs/1.x/managing-assets');</script>
<?php endif; ?>


<?php echo $__env->yieldPushContent('styles'); ?><?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/layouts/styles.blade.php ENDPATH**/ ?>