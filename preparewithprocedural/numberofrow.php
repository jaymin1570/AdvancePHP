<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "jaymin2033";

//Create connection

$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

//check connection
if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}
echo "Connected Successfully....<hr><br>";

$sql = "select * from jammu";

//prepared statement
$result = mysqli_prepare($conn,$sql);

//execute statement
mysqli_stmt_execute($result);

// store reult
mysqli_stmt_store_result($result);

//number of rows
$total_row = mysqli_stmt_num_rows($result);
echo $total_row;

//free result
mysqli_stmt_free_result($result);
?>