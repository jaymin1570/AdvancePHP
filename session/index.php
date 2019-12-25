<?php

session_start();

//set session variable
// $_SESSION['username']= 'jaymin';
// $_SESSION['password']= '12345678';

echo $_SESSION['username']."<br>";
echo $_SESSION['password']."<br>";

//unset single variable
// unset($_SESSION['username']);
// unset($_SESSION['password']);

//unset  variable
session_unset();

//session destroy
session_destroy();

// check session variable set or not
// if(isset($_SESSION['username'])){
//     echo "<br>session valiable set";
// }else{
//     echo "session not set";
// }
?>