<?php
    $navigation = \Hyde\Framework\Features\Navigation\NavigationMenu::create();
?>

<nav aria-label="Main navigation" id="main-navigation" class="flex flex-wrap items-center justify-between p-4 shadow-lg sm:shadow-xl md:shadow-none dark:bg-gray-800">
    <div class="max-w-3xl mx-auto flex flex-grow items-center flex-shrink-0">
        <div class="flex flex-grow items-center flex-shrink-0 text-gray-700 dark:text-gray-200">
            <?php echo $__env->make('hyde::components.navigation.navigation-brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

        <div class="block md:hidden">
            <button id="navigation-toggle-button" class="flex items-center px-3 py-1 hover:text-gray-700 dark:text-gray-200"
                    aria-label="Toggle navigation menu" @click="navigationOpen = ! navigationOpen">
                <svg id="open-main-navigation-menu-icon" title="Open Navigation Menu" class="dark:fill-gray-200"
                     xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24"
                     x-show="! navigationOpen" style="display: block;"
                ><title>Open Menu</title>
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
                <svg id="close-main-navigation-menu-icon" title="Close Navigation Menu" class="dark:fill-gray-200"
                     xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24"
                     x-show="navigationOpen" style="display: none;"
                ><title>Close Menu</title>
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                </svg>
            </button>
        </div>

        <div id="main-navigation-links" class="w-full x-uncloak-md md:flex flex-grow md:flex-grow-0 md:items-center md:w-auto px-6 -mx-4 border-t mt-3 pt-3 md:border-none md:mt-0 md:py-0 border-gray-200 dark:border-gray-700"
             :class="navigationOpen ? '' : 'hidden'" x-cloak>
            <ul aria-label="Navigation links" class="md:flex-grow md:flex justify-end">
                <?php $__currentLoopData = $navigation->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="md:mx-2">
                        <?php if($item instanceof \Hyde\Framework\Features\Navigation\DropdownNavItem): ?>
                            <?php if (isset($component)) { $__componentOriginald9e82732ca58b54a3cac3b3050ba2def = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald9e82732ca58b54a3cac3b3050ba2def = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'hyde::components.navigation.dropdown','data' => ['label' => \Hyde\Hyde::makeTitle($item->label),'items' => $item->items]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('hyde::navigation.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Hyde\Hyde::makeTitle($item->label)),'items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->items)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald9e82732ca58b54a3cac3b3050ba2def)): ?>
<?php $attributes = $__attributesOriginald9e82732ca58b54a3cac3b3050ba2def; ?>
<?php unset($__attributesOriginald9e82732ca58b54a3cac3b3050ba2def); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald9e82732ca58b54a3cac3b3050ba2def)): ?>
<?php $component = $__componentOriginald9e82732ca58b54a3cac3b3050ba2def; ?>
<?php unset($__componentOriginald9e82732ca58b54a3cac3b3050ba2def); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php echo $__env->make('hyde::components.navigation.navigation-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>


            <div class="ml-auto">
                <?php if (isset($component)) { $__componentOriginal654d232195658b546dcd0b8c80e91773 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal654d232195658b546dcd0b8c80e91773 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'hyde::components.navigation.theme-toggle-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('hyde::navigation.theme-toggle-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal654d232195658b546dcd0b8c80e91773)): ?>
<?php $attributes = $__attributesOriginal654d232195658b546dcd0b8c80e91773; ?>
<?php unset($__attributesOriginal654d232195658b546dcd0b8c80e91773); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal654d232195658b546dcd0b8c80e91773)): ?>
<?php $component = $__componentOriginal654d232195658b546dcd0b8c80e91773; ?>
<?php unset($__componentOriginal654d232195658b546dcd0b8c80e91773); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</nav><?php /**PATH /Users/danny/Projects/Personal/DannyvdSluijs.github.io/resources/views/vendor/hyde/layouts/navigation.blade.php ENDPATH**/ ?>