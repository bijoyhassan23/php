<pre>
<?php

/**
 * Mysqli oop
 */


 $conn = new mysqli("localhost", "root", "", "sql_test");
 if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
 }
 $conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
 )");

// $res = $conn->query("INSERT into  users(name)
//     values('Bijoy'),('Rakib'),('Rony');");

$query_fun = $conn->query("SELECT * FROM users");

var_export($query_fun->num_rows);
var_export($query_fun->fetch_all());
?>
</pre>