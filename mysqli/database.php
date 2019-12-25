<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";

$conn = mysqli_connect($db_host,$db_user,$db_password);

if(!$conn){
    die("<p style='color:red;'>connection Failed</p>");
}
echo "Connected Successfully <hr>";

$sql = "CREATE DATABASE jaymin20";
if(mysqli_query($conn,$sql)){
    echo "<p style='color:green;'>Database Created Successfully..</p>";
}else{
    echo "<p style='color:red;'>Unable to Create Database</p>";

}


?>