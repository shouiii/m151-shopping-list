<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVtakdof\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVtakdof/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerVtakdof.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerVtakdof\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerVtakdof\appDevDebugProjectContainer([
    'container.build_hash' => 'Vtakdof',
    'container.build_id' => 'b2b01857',
    'container.build_time' => 1583400692,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVtakdof');
