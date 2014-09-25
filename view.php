<?php
require __DIR__ . '/vendor/autoload.php';

$factory = new \Aura\Html\HelperLocatorFactory;
$helpers = $factory->newInstance();

$view_factory = new \Aura\View\ViewFactory;
$view = $view_factory->newInstance($helpers);

$view_registry = $view->getViewRegistry();
$view_registry->set('browse', __DIR__ . '/templates/views/browse.php');

$layout_registry = $view->getLayoutRegistry();
$layout_registry->set('default', __DIR__ . '/templates/layouts/default.php');

$view->setData(array('name' => 'Aura'));

$view->setView('browse');
$view->setLayout('default');

echo $view->__invoke();
