<?php

/**
 * This name space start with braket so all the name space mustbe stay with brakets on this page
 */

namespace thard{
    class test{
        public function show(){
            return "Thard test show <br>";
        }
    }
}

namespace fourth{
    $obj2 = new \thard\test();
    echo ($obj2->show());
}