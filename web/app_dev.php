<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

/** @var \Composer\Autoload\ClassLoader $loader */

# Config autoload
$loader = require __DIR__ . '/../config/autoload.php';

# Cache Loader
$cache_loader = new \Symfony\Component\ClassLoader\ApcClassLoader(sha1(__DIR__), $loader);
$cache_loader->register();
$loader->unregister();

# MicroKernel class
require_once  __DIR__ . '/../MicroKernel.php';

# MicroCache class
//require_once __DIR__ . '/../MicroCache.php';

# Enable Symfony Debug
Debug::enable();

# Create kernel instance
$kernel = new MicroKernel('dev', true);
$kernel->loadClassCache();

# Create cache instance
// Disable Cache for now, I need to found another way to make this simple
//$kernel = new MicroCache($kernel);

# Create request instance
$request = Request::createFromGlobals();

# Setup reverse proxy
Request::setTrustedProxies(array('127.0.0.1', $request->server->get('REMOTE_ADDR')));
Request::setTrustedHeaderName(Request::HEADER_FORWARDED, null);

# Give response instance
$response = $kernel->handle($request);
$response->send();

# Bye!
$kernel->terminate($request, $response);