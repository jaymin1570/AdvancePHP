<?php

$cookie_name = 'user_name';
if(isset($_REQUEST['set'])){
    $cookie_value = $_REQUEST['email'];
    $cookie_expire = time()+60*60*24*2;
    setCookie($cookie_name,$cookie_value,$cookie_expire);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
    <h1>Cookie</h1>
    <form action="" method="POST" name="myform">
        Email: <input type="email" name="email" id=""><br><br>
        <input type="submit" name="set" value="Submit">
        <hr>

        <?php
            if(isset($_COOKIE[$cookie_name])){
                echo "Cookie Name is ".$cookie_name. "  and Value is ".$_COOKIE[$cookie_name]."<br>";
            }else{
                echo "Cookie not set";
            }
        ?>

    </form>
</body>
</html>