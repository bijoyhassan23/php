<?php

if(isset($_POST['searchData'])){
    if($_POST['searchData'] != '' && $_POST['searchData'] != ' '){
        $searchText = preg_replace('/\s*$/i', '', $_POST['searchData']);
        $searchText = preg_replace('/\s+/i', '.*|', $searchText);
        $searchData = "WHERE first_name REGEXP '{$searchText}' OR last_name REGEXP '{$searchText}'";
    }else{
        $searchData = '';
    }
}

$conn = mysqli_connect("localhost", "root", "", "sql_test") or die("Connection Failed");
$sql = "SELECT * FROM students {$searchData}";
$result = mysqli_query($conn, $sql);

$output = "";

if(mysqli_num_rows($result) > 0){
    $output .= '<table border="1", width="100%" cellspacing="0" cellpadding="10px">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    ';

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
                        <td> {$row['id']} </td>
                        <td>{$row['first_name']} {$row['last_name']}</td>
                        <td><input type='button' class='edit-btn' data-eid='{$row['id']}' value='Edit'></td>
                        <td><input type='button' class='deleted-btn' data-id='{$row['id']}' value='Delete'></td>
                    </tr>";
    }

    $output .= '</table>';

}else{
    $output .= "No records found";
}

echo $output;

mysqli_close($conn);

?>