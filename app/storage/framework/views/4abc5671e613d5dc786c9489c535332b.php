<?php ($title = 'Latest Posts'); ?>

<?php $__env->startSection('content'); ?>

    <main id="content" class="mx-auto max-w-7xl py-12 px-8">
        <header class="max-w-3xl mx-auto">
            <div class="text-gray-700 dark:text-gray-200">
                <p class="mb-4">
                    My name is Danny van der Sluijs, and I am a Technical Lead at <a href="https://www.infi.nl">Infi</a> and Maintainer of <a href="https://jsonmapper.net">JsonMapper</a> who enjoys contributing to open source ✨.
                </p>
                <p class="mb-4">
                    To help out with the open source community there are some projects I contribute to and/or manage:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 mb-4">
                    <li><a class="text-indigo-500 hover:underline font-medium" href="https://github.com/JsonMapper/JsonMapper" target="_blank">JsonMapper</a></li>
                    <li><a class="text-indigo-500 hover:underline font-medium" href="https://github.com/jsonrainbow/json-schema"target="_blank">JSON Schema</a></li>
                    <li><a class="text-indigo-500 hover:underline font-medium" href="https://github.com/picqer/exact-php-client" target="_blank">Exact PHP Client</a></li>
                </ul>
                <p  class="mb-4">
                    If one of those open source projects is critical for your business,
                    <a href="https://github.com/sponsors/DannyvdSluijs">please consider supporting my work with your sponsoring 💕</a>
                </p>
            </div>

            <h1 class="text-3xl text-left leading-10 tracking-tight font-extrabold sm:leading-none mb-8 md:mb-12 md:text-4xl md:text-center text-gray-700 dark:text-gray-200">
                Latest Posts
                <hr />
            </h1>
        </header>

        <div id="post-feed" class="max-w-3xl mx-auto">
            <?php echo $__env->make('hyde::components.blog-post-feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('hyde::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/_pages/index.blade.php ENDPATH**/ ?>