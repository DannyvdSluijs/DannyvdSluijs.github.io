by author
<address itemprop="author" itemscope itemtype="https://schema.org/Person" aria-label="The post author" style="display: inline;">
    <?php if($page->author->website): ?>
        <a href="<?php echo e($page->author->website); ?>" rel="author" itemprop="url" aria-label="The author's website">
            <?php endif; ?>
            <span itemprop="name" aria-label="The author's name" <?php echo e(($page->author->username && ($page->author->username !== $page->author->name)) ? 'title=@'. urlencode($page->author->username) : ''); ?>><?php echo e($page->author->name ?? $page->author->username); ?></span>
            <?php if($page->author->website): ?>
        </a>
    <?php endif; ?>
</address><?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/components/post/author.blade.php ENDPATH**/ ?>