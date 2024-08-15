<?php
 if(isset($_POST['sid']) && isset($_POST['sfname']) && isset($_POST['slname'])){
    $conn = mysqli_connect("localhost", "root", "", "sql_test") or die("Connection Failed");
    $sql = "UPDATE students
            SET first_name = '{$_POST['sfname']}',
            last_name = '{$_POST['slname']}'
            WHERE id = {$_POST['sid']}";
            if(mysqli_query($conn, $sql)){
                echo "true";
            }else{
                echo "false";
            }
 }else{
    echo "false";
 }