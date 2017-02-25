<?php

use Symfony\Component\HttpFoundation\Request;

/** @var \Composer\Autoload\ClassLoader $loader */

# Config autoload
$loader = require __DIR__ . '/../app/autoload.php';

# Don't load class bootstrap file on php 7+
if (PHP_VERSION_ID > 70000) {
    include_once __DIR__ . '/../var/bootstrap.php.cache';
}

# Cache Loader
if (function_exists('apcu_fetch')) {
    $cache_loader = new \Symfony\Component\ClassLoader\ApcClassLoader(sha1(__DIR__), $loader);
    $cache_loader->register();
    $loader->unregister();
}

# Create kernel instance
$kernel = new AppKernel('prod', false);

# Don't load class cache on php 7+
if (PHP_VERSION_ID > 70000) {
    $kernel->loadClassCache();
}

# Create cache instance
$kernel = new AppCache($kernel);

# When using the HttpCache, you need to call the method in your front controller
# instead of relying on the configuration parameter
Request::enableHttpMethodParameterOverride();

# Create request instance
$request = Request::createFromGlobals();

# Give response instance
$response = $kernel->handle($request);
$response->send();

# Bye!
$kernel->terminate($request, $response);
