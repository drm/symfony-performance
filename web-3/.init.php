<?php
$loader = require_once __DIR__ . '/../app/bootstrap.php.cache';

use Symfony\Component\HttpFoundation\Request;

Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
