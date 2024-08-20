<pre>
<?php

class Database{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "sql_test";

    private $mysqli = "";
    private $result = [];
    private $conn = false;

    // create connection
    public function __construct(){
        if(!$this->conn){
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if($this->mysqli->connect_error){
                $this->result[] = $this->mysqli->connect_error;
                return false;
            }
            $this->conn = true;
        }else{
            return true;
        }
    }

    // Insert Function
    public function insert($table, array $params = []){
        if($this->tableExists($table)){
            $table_colums = implode(", ", array_keys($params));
            $table_values = implode("', '", $params);
            $sql = "INSERT INTO {$table} ({$table_colums}) VALUES ('{$table_values}')";
            if($this->mysqli->query($sql)){
                $this->result[] = $this->mysqli->insert_id;
                return true;
            }else{
                $this->result[] = $this->mysqli->error;
                return false;
            }
        }else{
            return false;
        }
    }

    // update function
    public function update($table, array $params = [], $where = null){
        if($this->tableExists($table)){
            $args = [];
            foreach ($params as $key => $value) {
                $args[] = "{$key} = '{$value}'";
            }

            $sql = "UPDATE {$table} SET " . implode(", ", $args);
            if($where != null){
                $sql .= " WHERE {$where}";
            }

            if($this->mysqli->query($sql)){
                $this->result[] = $this->mysqli->affected_rows;
                return true;
            }else{
                $this->result[] = $this->mysqli->error;
                return false;
            }
           
        }else{
            return false;
        }
    }

    // delete function
    public function delete($table, $where = null){
        if($this->tableExists($table)){
            $sql = "DELETE FROM {$table}";
            if($where != null){
                $sql .= " WHERE {$where}";
            }
            if($this->mysqli->query($sql)){
                $this->result[] = $this->mysqli->affected_rows;
                return true;
            }else{
                $this->result[] = $this->mysqli->error;
                return false;
            }
        }else{
            return false;
        }
    }

    // select functio
    public function select($table, $rows = "*", $join = null, $where = null, $order = null, $limit = null){
        if($this->tableExists($table)){
            $sql = "SELECT {$rows} FROM {$table}";
            if($join != null){
                $sql .= " JOIN {$join}";
            }
            if($where != null){
                $sql .= " WHERE {$where}";
            }
            if($order != null){
                $sql .= " ORDER BY {$order}";
            }
            if($limit != null){
                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT {$start},{$limit}";
            }

            $query = $this->mysqli->query($sql);

            if($query){
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            }else{
                $this->result[] = $this->mysqli->error;
                return false;
            }
        }else{
            return false;
        }
    }

    public function pagination($table, $join = null, $where = null, $limit = null){
        if($this->tableExists($table)){
            if($limit != null){
                $sql = "SELECT COUNT(*) FROM {$table}";
                if($join != null){
                    $sql .= " JOIN {$join}";
                }
                if($where != null){
                    $sql .= " WHERE {$where}";
                }
                $query = $this->mysqli->query($sql);
                $total_record = $query->fetch_array();
                $total_record = $total_record[0];
                $total_page = ceil($total_record / $limit);

                $url = basename($_SERVER['PHP_SELF']);

                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

                $output = "<ul class='pagination'>";
                if($total_record > $limit){
                    if($page > 1){
                        $output .= "<li><a href='{$url}?page=".($page - 1)."'>Prev</a></li>";
                    }
                    for($i = 1; $i <= $total_page; $i++){
                        $cls = $i == $page ? "class=active" : "";

                        $output .= "<li><a {$cls} href='{$url}?page={$i}'>{$i}</a></li>";
                    }
                    if($page < $total_page){
                        $next = $page + 1;
                        $output .= "<li><a href='{$url}?page=".($page + 1)."'>Next</a></li>";
                    }
                }
                $output .= "</ul>";
                
                return $output;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function sql($sql){
        $query = $this->mysqli->query($sql);

        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            $this->result[] = $this->mysqli->error;
            return false;
        }
    }

    private function tableExists($table){
        $sql = "SHOW TABLES LIKE '{$table}'";
        $tableInDb = $this->mysqli->query($sql);
        if($tableInDb){
            if($tableInDb->num_rows == 1){
                return true;
            }else{
                $this->result[] = $table . " does not exist in this database.";
                return false;
            }
        }
    }

    public function getResult(){
        $val = $this->result;
        $this->result = [];
        return $val;
    }

    // close connection
    public function __destruct(){
        if($this->conn){
            $this->mysqli->close();
        }else{
            return false;
        }
    }
}



$obj = new Database();

/**------------------------------------------------------------------------------------ */


/**
 Insert data
 */
// $obj->insert("students", ["first_name" => "Mustakims", "last_name" => "Hossain"]);
// echo "Insert Result : \n\n";
// print_r($obj->getResult());

/**------------------------------------------------------------------------------------ */

/**
 Update data
 */
// $obj->update("students", ["last_name" => "Hassan"], "id = 9");
// echo "Update Result : \n\n";
// print_r($obj->getResult());

/**------------------------------------------------------------------------------------ */

/**
 Delete data
 */

// $obj->delete("students", "id = 3");
// echo "Delete Result : \n\n";
// print_r($obj->getResult());

/**------------------------------------------------------------------------------------ */

/**
 Select data
 */
// SQL Fun
// $obj->sql("SELECT * FROM students");
// echo "sql fun Result : \n\n";
// print_r($obj->getResult());

// Select fun
$obj->select('students', '*', null, null, null, 2);
echo "select Result : \n\n";
// print_r($obj->getResult());

$result = $obj->getResult();


echo "<table border='1px' cellspacing='2px' cellpadding='5px'>";
echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
echo "</tr>";
foreach($result as list("id" => $id, "first_name" => $fname, "last_name" => $lname)){
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$fname</td>";
    echo "<td>$lname</td>";
    echo "</tr>";
}
echo "</table>";

/**------------------------------------------------------------------------------------ */

/**
 Pagination
 */
echo $obj->pagination('students', null, null, 2);
// echo "Pagination Result : \n\n";
print_r($obj->getResult());

 /**------------------------------------------------------------------------------------ */



$obj->select('students', '*', null, null, null, null);

?>
</pre>