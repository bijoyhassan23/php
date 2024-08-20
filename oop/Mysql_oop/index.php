<pre>
<?php

/**
 * Mysqli oop
 */


 $conn = new mysqli("localhost", "root", "", "sql_test");
 if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
 }
//  $conn->query("CREATE TABLE IF NOT EXISTS users (
//     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(50)
//  )");



// $conn->begin_transaction(); 
// try{
//    $conn->query("INSERT into  users(name) values('Shihab')");
//    $conn->query("INSERT into  users(name) values('Soikot')");
//    $conn->query("INSERT into  users(name) values('Rahibul')");
//    $conn->commit();
// }catch(Exception $e){
//    $conn->rollback();
// }

$query_fun = $conn->query("SELECT * FROM users");

var_export($query_fun->num_rows);
var_export($query_fun->fetch_all());
?>
</pre>