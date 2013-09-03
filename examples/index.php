<?php

require_once '../vendor/autoload.php';

$angular = new \Bazalt\Angular("views/index.html");
$app = $angular->module('app', [
    'dir' => __DIR__,
    'file' => '/views/index.html'
]);

$app->directive('ng-app', [
    'restrict' => 'A',
    'class' => 'Bazalt\\Angular\\Directive\\NgApp'
]);
$app->directive('ng-model', [
    'restrict' => 'A',
    'class' => 'Bazalt\\Angular\\Directive\\NgModel'
]);
$app->directive('ng-repeat', [
    'restrict' => 'A',
    'class' => 'Bazalt\\Angular\\Directive\\NgRepeat'
]);
$app->directive('ng-include', [
    'restrict' => 'A',
    'class' => 'Bazalt\\Angular\\Directive\\NgInclude'
]);

echo $angular->bootstrap('app');