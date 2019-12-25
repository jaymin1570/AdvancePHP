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

$sql = "select * from jammu where id=?";
//prepared statement
$result = mysqli_prepare($conn,$sql);

//bind parameter
mysqli_stmt_bind_param($result,'i',$id);

$id=3;

//bind result set in variable
mysqli_stmt_bind_result($result,$id,$name,$roll_no,$address);


// execute prepared statment
mysqli_stmt_execute($result);


mysqli_stmt_fetch($result);
echo "ID:".$id." Name:".$name." Roll: ".$roll_no." Address:".$address."<br>";

// close prepared statement
mysqli_stmt_close($result);

//close Connection
mysqli_close($conn);


//fetch all table  row data
// while(mysqli_stmt_fetch($result)){
//     echo "ID:".$id." Name:".$name." Roll: ".$roll_no." Address:".$address."<br>";
// }
