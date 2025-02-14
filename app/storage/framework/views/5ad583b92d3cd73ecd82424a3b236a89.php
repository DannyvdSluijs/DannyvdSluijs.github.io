<?php if(config('hyde.footer') !== false): ?>
    <footer class="w-full bg-gray-100 dark:bg-gray-800">
        <div class="max-w-3xl mx-auto py-4">
            <h2 class="text-lg mb-4">
                An open source enthusiast and his stories.
            </h2>

            <div class="flex flex-wrap justify-between items-start gap-6">
                <!-- Contact Info -->
                <div class="text-stone-600 dark:text-stone-300 text-sm flex-1">
                    <p class="">Danny van der Sluijs</p>
                    <a href="mailto:dannyvandersluijs@icloud.com" class="hover:text-indigo-600 ">
                        dannyvandersluijs@icloud.com
                    </a>
                </div>

                <!-- Social Links -->
                <div class="flex flex-col space-y-2 text-sm flex-1">
                    <a href="https://github.com/DannyvdSluijs" class="flex items-center space-x-2 text-gray-600 dark:text-gray-300 hover:text-indigo-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12c0 4.42 2.87 8.17 6.84 9.49.5.09.68-.21.68-.48 0-.24-.01-.87-.01-1.71-2.78.6-3.37-1.34-3.37-1.34-.45-1.17-1.11-1.48-1.11-1.48-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03 .89 1.52 2.34 1.08 2.91.83.09-.65.35-1.08.63-1.33-2.22-.25-4.56-1.11-4.56-4.95 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.26.1-2.62 0 0 .84-.27 2.75 1.02a9.56 9.56 0 0 1 2.5-.34c.85.01 1.71.12 2.5.34 1.91-1.29 2.75-1.02 2.75-1.02.55 1.36.2 2.37.1 2.62 .64.7 1.03 1.59 1.03 2.68 0 3.85-2.35 4.7-4.59 4.95 .36.31.69.91.69 1.83 0 1.32-.01 2.38-.01 2.7 0 .27.18.58.69.48A10.02 10.02 0 0 0 22 12c0-5.52-4.48-10-10-10z"></path>
                        </svg>
                        <span>DannyvdSluijs</span>
                    </a>
                    <a href="https://www.twitter.com/EchteDanny" class="flex items-center space-x-2 text-gray-600 dark:text-gray-300 hover:text-indigo-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69 .89-.53 1.57-1.37 1.89-2.37-.83.49-1.74.85-2.71 1.04a4.48 4.48 0 0 0-7.64 4.08c-3.72-.18-7.02-1.97-9.24-4.68-.38.65-.6 1.4-.6 2.2 0 1.52.77 2.86 1.94 3.65-.72-.02-1.4-.22-1.99-.55v.06c0 2.13 1.52 3.9 3.52 4.3-.37.1-.76.15-1.17.15-.28 0-.56-.03-.83-.08 .56 1.75 2.19 3.02 4.12 3.06a8.98 8.98 0 0 1-5.55 1.92c-.36 0-.72-.02-1.07-.07a12.67 12.67 0 0 0 6.85 2c8.21 0 12.7-6.8 12.7-12.7v-.58c.87-.64 1.62-1.44 2.22-2.35z"></path>
                        </svg>
                        <span>EchteDanny</span>
                    </a>
                </div>

                <!-- About -->
                <div class="text-gray-600 dark:text-gray-300 text-sm flex-1 break-words">
                    <p> This site was build using <a href="https://hydephp.com/" class="text-indigo-600">HydePHP</a><br>
                        and <a href="https://torchlight.dev/" class="text-indigo-600">Torchlight.dev</a></p>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
<?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/layouts/footer.blade.php ENDPATH**/ ?>