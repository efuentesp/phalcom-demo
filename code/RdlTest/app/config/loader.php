<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
    [
      'App\Services'    => realpath(__DIR__ . '/../services/'),
      'App\Controllers' => realpath(__DIR__ . '/../controllers/'),
      'App\Models'      => realpath(__DIR__ . '/../models/'),
    ]
  );

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();
