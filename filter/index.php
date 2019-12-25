<?php
if(isset($_REQUEST['submit'])){
    if(filter_has_var(INPUT_POST,'name')){
        echo "Name Found";
    }else{
        echo "Name Not Found";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Name: <input type="text" name="name" id="name">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>