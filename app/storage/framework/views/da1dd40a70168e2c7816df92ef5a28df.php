<?php
    /** @var \Hyde\Pages\MarkdownPost $page  */
    /** @var \Hyde\Framework\Features\Blogging\Models\FeaturedImage $image  */
    $image = $page->image;
?>
<figure aria-label="Cover image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="doc-cover">
    <img src="<?php echo e($image->getSource()); ?>" alt="<?php echo e($image->getAltText() ?? ''); ?>" title="<?php echo e($image->getTitleText() ?? ''); ?>" itemprop="image" class="mb-0">
    <figcaption aria-label="Image caption" itemprop="caption">
        <?php if($image->hasAuthorName()): ?>
            <span>Image by</span>
            <span itemprop="creator" itemscope="" itemtype="https://schema.org/Person">
                <?php if($image->hasAuthorUrl()): ?>
                    <a href="<?php echo e($image->getAuthorUrl()); ?>" rel="author noopener nofollow" itemprop="url">
                        <span itemprop="name"><?php echo e($image->getAuthorName()); ?></span>.
                    </a>
                <?php else: ?>
                    <span itemprop="name"><?php echo e($image->getAuthorName()); ?></span>.
                <?php endif; ?>
            </span>
        <?php endif; ?>

        <?php if($image->hasCopyrightText()): ?>
            <span itemprop="copyrightNotice"><?php echo e($image->getCopyrightText()); ?></span>.
        <?php endif; ?>

        <?php if($image->hasLicenseName()): ?>
            <span>License</span>
            <?php if($image->hasLicenseUrl()): ?>
                <a href="<?php echo e($image->getLicenseUrl()); ?>" rel="license nofollow noopener" itemprop="license"><?php echo e($image->getLicenseName()); ?></a>.
            <?php else: ?>
                <span itemprop="license"><?php echo e($image->getLicenseName()); ?></span>.
            <?php endif; ?>
        <?php endif; ?>
    </figcaption>

    <?php $__currentLoopData = $image->getMetadataArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <meta itemprop="<?php echo e($name); ?>" content="<?php echo e($value); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</figure><?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/components/post/image.blade.php ENDPATH**/ ?>