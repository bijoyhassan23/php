<?php

if(isset($_POST['sid'])){
    $sid = $_POST['sid'];

    $conn = mysqli_connect("localhost", "root", "", "sql_test") or die("Connection Failed");
    $sql = "SELECT * FROM students WHERE id =  {$sid}";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo(json_encode($row));
    }else{
        echo "false";
    }
}else{
    echo "false";
}