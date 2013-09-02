<?php

namespace tests;

require_once (is_file(__DIR__ . '/../vendor/autoload.php') ? (__DIR__ . '/../vendor/autoload.php') : '../vendor/autoload.php');

$loader = new \Composer\Autoload\ClassLoader();
$loader->add('tests', __DIR__ . '/..');
$loader->register();