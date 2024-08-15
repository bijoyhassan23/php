<?php

$json = file_get_contents('php://input');

$data = json_decode($json, true);

if($data){
    $conn = mysqli_connect("localhost", "root", "", "sql_test") or die("Connection Failed");
    $sql = "INSERT INTO students(first_name, last_name)
            values
            ('{$data['first_name']}', '{$data['last_name']}')";
    if(mysqli_query($conn, $sql)){
        echo "true";
    }else{
        echo "false";
    }
}



