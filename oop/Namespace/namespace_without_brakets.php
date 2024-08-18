<?php

/**
 * These are no braket namespace so you have to put everything without braket
 */

namespace fifth;
class test {
    public function show() {
        return "fifth test show <br>";
    }
}

namespace sixth;
class test {
    public function show() {
        return "sixth test show <br>";
    }
}

$obj1 = new \fifth\test();
echo $obj1->show();

$obj2 = new \sixth\test();
echo $obj2->show();

$objx = new test();
echo $objx->show();



/**
 * Nested namespace
 */

namespace sixth\saven;
class test {
    public function show() {
        return "saven test show <br>";
    }
}

$objx = new test();
echo $objx->show();

namespace eight;
$obj3 = new \sixth\saven\test();
echo $obj3->show();