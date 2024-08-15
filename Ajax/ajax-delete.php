<?php

$json = file_get_contents('php://input');

$data = json_decode($json, true);

if($data){
    $conn = mysqli_connect("localhost", "root", "", "sql_test") or die("Connection Failed");
    $sql = "DELETE FROM students WHERE id={$data['id']}";
    if(mysqli_query($conn, $sql)){
        echo "true";
    }else{
        echo "false";
    }
}



