<pre>

<?php

try{
    if(false){

    }else{
        throw new Exception("Someting is wrong in here");
    }
}catch(Exception $e){
    echo $e->getMessage() . "<br>";
    echo $e->getCode() . "<br>";
    echo $e->getfile() . "<br><br>";
    var_export($e);
}

?>
</pre>