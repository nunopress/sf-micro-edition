<?php

# Config autoload
/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__ . '/../config/autoload.php';

# MicroKernel class
require_once  __DIR__ . '/../MicroKernel.php';

# Create kernel instance
$kernel = new MicroKernel('prod', false);
$kernel->loadClassCache();

# Create request instance
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

# Give response instance
$response = $kernel->handle($request);
$response->send();

# Bye!
$kernel->terminate($request, $response);
