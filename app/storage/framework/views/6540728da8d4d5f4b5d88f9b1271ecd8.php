<article aria-label="Article" id="<?php echo e($page->identifier); ?>" itemscope itemtype="https://schema.org/Article"
    class="<?php echo \Illuminate\Support\Arr::toCssClasses(['post-article mx-auto', config('markdown.prose_classes', 'prose dark:prose-invert'), 'torchlight-enabled' => Features::hasTorchlight()]); ?>">
    <meta itemprop="identifier" content="<?php echo e($page->identifier); ?>">
    <?php if($page->getCanonicalUrl() !== null): ?>
        <meta itemprop="url" content="<?php echo e($page->getCanonicalUrl()); ?>">
    <?php endif; ?>

    <header aria-label="Header section" role="doc-pageheader">
        <h1 itemprop="headline" class="mb-4"><?php echo e($page->title); ?></h1>
        <div id="byline" aria-label="About the post" role="doc-introduction">
            <?php echo $__env->renderWhen(isset($page->date), 'hyde::components.post.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <?php echo $__env->renderWhen(isset($page->author), 'hyde::components.post.author', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <?php echo $__env->renderWhen(isset($page->category), 'hyde::components.post.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        </div>
    </header>
    <?php echo $__env->renderWhen(isset($page->image), 'hyde::components.post.image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <div aria-label="Article body" itemprop="articleBody">
        <?php echo e($content); ?>

    </div>
    <span class="sr-only">End of article</span>
</article><?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/components/post/article.blade.php ENDPATH**/ ?>