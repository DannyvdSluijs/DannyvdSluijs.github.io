<article aria-label="Article" id="<?php echo e($page->identifier); ?>" itemscope itemtype="https://schema.org/Article"
    class="<?php echo \Illuminate\Support\Arr::toCssClasses(['post-article mx-auto', config('markdown.prose_classes', 'prose dark:prose-invert'), 'torchlight-enabled' => Features::hasTorchlight()]); ?>">
    <meta itemprop="identifier" content="<?php echo e($page->identifier); ?>">
    <?php if($page->getCanonicalUrl() !== null): ?>
        <meta itemprop="url" content="<?php echo e($page->getCanonicalUrl()); ?>">
    <?php endif; ?>

    <header aria-label="Header section" role="doc-pageheader">
        <h1 itemprop="headline" class="mb-4"><?php echo e($page->title); ?></h1>
        <div id="byline" aria-label="About the post" role="doc-introduction">
            <?php echo $__env->renderWhen(isset($page->date), 'hyde::components.post.date', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
            <?php echo $__env->renderWhen(isset($page->author), 'hyde::components.post.author', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
            <?php echo $__env->renderWhen(isset($page->category), 'hyde::components.post.category', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
        </div>
    </header>
    <?php echo $__env->renderWhen(isset($page->image), 'hyde::components.post.image', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
    <div aria-label="Article body" itemprop="articleBody">
        <?php echo e($content); ?>

    </div>
    <span class="sr-only">End of article</span>
</article><?php /**PATH /Users/dannyvandersluijs/Projects/DannyvdSluijs.github.io/resources/views/vendor/hyde/components/post/article.blade.php ENDPATH**/ ?>