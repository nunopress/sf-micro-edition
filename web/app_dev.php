<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

# Config autoload
/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__ . '/../config/autoload.php';

# MicroKernel class
require_once  __DIR__ . '/../MicroKernel.php';

# Enable Symfony Debug
Debug::enable();

# Create kernel instance
$kernel = new MicroKernel('dev', true);
$kernel->loadClassCache(); // Comment this line if you want disable the kernel class cache for speedup

# Create request instance
$request = Request::createFromGlobals();

# Give response instance
$response = $kernel->handle($request);
$response->send();

# Bye!
$kernel->terminate($request, $response);