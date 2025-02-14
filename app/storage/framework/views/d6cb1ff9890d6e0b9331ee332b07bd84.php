<div id="__realtime-compiler-live-edit-insert">
    <!-- The live editor insert is not saved to your static site -->
    <?php
        /** @var \Hyde\Pages\Concerns\BaseMarkdownPage $page */
        $markdown = $page->markdown()->body();
    ?>
    <style><?php echo $styles; ?></style>
    <template id="live-edit-template">
        <section id="live-edit-container" style="margin-top: <?php echo e($page instanceof \Hyde\Pages\DocumentationPage ? '1rem' : '-1rem'); ?>;">
            <form id="liveEditForm" action="/_hyde/live-edit" method="POST">
                <header class="prose dark:prose-invert mb-3">
                    <h2 class="mb-0">Live Editor</h2>
                    <menu>
                        <button id="liveEditCancel" type="button">
                            Cancel
                        </button>
                        <button id="liveEditSubmit" type="submit">
                            Save
                        </button>
                    </menu>
                </header>
                <input type="hidden" name="_token" value="<?php echo e($csrfToken); ?>">
                <input type="hidden" name="page" value="<?php echo e($page->getSourcePath()); ?>">
                <input type="hidden" name="currentContentHash" value="<?php echo e(hash('sha256', $page->markdown()->body())); ?>">
                <label for="live-editor" class="sr-only">Edit page contents</label>
                <textarea name="markdown" id="live-editor" cols="30" rows="20" class="rounded-lg bg-gray-200 dark:bg-gray-800"><?php echo e($markdown); ?></textarea>
            </form>
        </section>
    </template>
    <script><?php echo $scripts; ?></script>
    <script>initLiveEdit()</script>
</div>
<?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/app/storage/framework/views/497c111ce747c73ad80c899cbb414751.blade.php ENDPATH**/ ?>