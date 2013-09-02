<?php

require_once '../vendor/autoload.php';

$ng = new \Bazalt\Angular("views/index.html");
$ng->directive('ng-app', [
    'restrict' => 'A',
    'class' => 'Bazalt\\Angular\\Directive\\NgApp'
]);
$ng->directive('ng-model', [
    'restrict' => 'A',
    'class' => 'Bazalt\\Angular\\Directive\\NgModel'
]);
$ng->directive('ng-repeat', [
    'restrict' => 'A',
    'class' => 'Bazalt\\Angular\\Directive\\NgRepeat'
]);

echo $ng->html();