<?php
require __DIR__ . '/vendor/autoload.php';

$factory = new \Aura\Html\HelperLocatorFactory;
$helpers = $factory->newInstance();

$view_factory = new \Aura\View\ViewFactory;
$view = $view_factory->newInstance($helpers);

$view_registry = $view->getViewRegistry();
$directory = __DIR__ . '/templates/views/';
$iterator = new DirectoryIterator($directory);
foreach ($iterator as $fileinfo) {
    if ($fileinfo->isFile()) {
        $view_registry->set($fileinfo->getBasename('.php'), $fileinfo->getPathname());
    }
}

$layout_registry = $view->getLayoutRegistry();
$layout_registry->set('default', __DIR__ . '/templates/layouts/default.php');
// for those who are lazy ;-)
/*
$directory = __DIR__ . '/templates/layouts/';
$iterator = new DirectoryIterator($directory);
foreach ($iterator as $fileinfo) {
    if ($fileinfo->isFile()) {
        $layout_registry->set($fileinfo->getBasename('.php'), $fileinfo->getPathname());
    }
}
*/
$view->setData(array('name' => 'Aura'));

$view->setView('browse');
$view->setLayout('default');

echo $view->__invoke();
