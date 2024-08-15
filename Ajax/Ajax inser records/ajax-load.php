<?php


$conn = mysqli_connect("localhost", "root", "", "sql_test") or die("Connection Failed");
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

$output = "";

if(mysqli_num_rows($result) > 0){
    $output .= '<table border="1", width="100%" cellspacing="0" cellpadding="10px">
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
    ';

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
                        <th> {$row['id']} </th>
                        <th>{$row['first_name']} {$row['last_name']}</th>
                    </tr>";
    }

    $output .= '</table>';

}else{
    $output .= "No records found";
}

echo $output;

mysqli_close($conn);

?>