<?php

use Symfony\Component\HttpFoundation\Request;

/** @var \Composer\Autoload\ClassLoader $loader */

# Config autoload
$loader = require __DIR__ . '/../config/autoload.php';

# MicroKernel class
require_once  __DIR__ . '/../MicroKernel.php';

# MicroCache class
//require_once __DIR__ . '/../MicroCache.php';

# Create kernel instance
$kernel = new MicroKernel('prod', false);
$kernel->loadClassCache();

# Create cache instance
// Disabled for now.
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
