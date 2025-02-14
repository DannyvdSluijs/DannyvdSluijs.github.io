<?php /** @var \Hyde\Pages\MarkdownPost $post */ ?>
<article class="mt-4 mb-8" itemscope itemtype="https://schema.org/Article">
    <meta itemprop="identifier" content="<?php echo e($post->identifier); ?>">
    <?php if(Hyde::hasSiteUrl()): ?>
        <meta itemprop="url" content="<?php echo e(Hyde::url('posts/' . $post->identifier)); ?>">
    <?php endif; ?>

    <header>
        <a href="<?php echo e($post->getRoute()); ?>" class="block w-fit">
            <h2 class="text-2xl font-bold text-gray-700 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white transition-colors duration-75">
                <?php echo e($post->data('title') ?? $post->title); ?>

            </h2>
        </a>
    </header>

    <footer>
        <?php if(isset($post->date)): ?>
            <span class="opacity-75">
                <span itemprop="dateCreated datePublished"><?php echo e($post->date->short); ?></span><?php echo e(isset($post->author) ? ',' : ''); ?>

            </span>
        <?php endif; ?>
        <?php if(isset($post->author)): ?>
            <span itemprop="author" itemscope itemtype="https://schema.org/Person">
            <span class="opacity-75">by</span>
            <span itemprop="name">
                <?php echo e($post->author->name ?? $post->author->username); ?>

            </span>
        </span>
        <?php endif; ?>
    </footer>

    <?php if($post->data('description') !== null): ?>
        <section role="doc-abstract" aria-label="Excerpt">
            <p class="leading-relaxed my-1">
                <?php echo e($post->data('description')); ?>

            </p>
        </section>
    <?php endif; ?>

    <footer>
        <a href="<?php echo e($post->getRoute()); ?>" class="text-indigo-500 hover:underline font-medium">
            Read post
        </a>
    </footer>
</article><?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/components/article-excerpt.blade.php ENDPATH**/ ?>