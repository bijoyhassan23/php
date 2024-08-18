<?php

/**
 * Thi will autometically load the file
 * you need to create a normal fun and you need to register it
 */

function auto_load_fun($class){
    require $class . ".php";
}

spl_autoload_register('auto_load_fun');

$test = new first();
$test1 = new second();