<?php

$variable = new \stdClass();
$variable->test = 'test';
$variable->array = [
  'test', 'test2'
];


echo "var_dump: <br/>";
echo "<pre>";
var_dump($variable);
echo "</pre>";


echo "<br/> print_r: <br/>";
echo "<pre>";
print_r($variable);
echo "</pre>";


echo "<br/> echo not existed variable: <br/>";
echo "<pre>";
print_r($notExistedVariable[2]);
echo "</pre>";

error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "With set display_errors<pre>";
echo $notExistedVariable[2];
echo "</pre>";
