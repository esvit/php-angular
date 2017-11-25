<?php

require_once '../vendor/autoload.php';

$angular = new \Bazalt\Angular("views/index.html");
$app = $angular->module('app', [
    'dir' => __DIR__,
    'file' => '/views/index.html'
]);

$app->rootScope['test'] = '123';
$app->rootScope['yourName'] = 'Vitalik';
$app->rootScope['items'] = [
    [ 'title' => 'Item 1', 'show' => true ],
    [ 'title' => 'Item 2', 'show' => false ],
    [ 'title' => 'Item 3', 'show' => true ],
    [ 'title' => 'Item 4', 'show' => false ],
    [ 'title' => 'Item 5', 'show' => true ]
];

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
$app->directive('ng-if', [
    'restrict' => 'A',
    'class' => 'Bazalt\\Angular\\Directive\\NgIf'
]);

echo $angular->bootstrap('app');