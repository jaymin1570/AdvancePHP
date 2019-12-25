<?php
// $a = 8;
// try {
//     if ($a >= 10) {
//         echo $a;
//     } else {
//         throw new Exception("Enter Value greater than 10");
//     }
// } catch (Exception $e) {
//     echo $e->getMessage();
// } finally {
//     echo "<br>Finally Block";
// }
?>
<?php
if(isset($_REQUEST['submit'])){
   $a= $_REQUEST['a'];
   $b = $_REQUEST['b'];
   try{
       if($b<=0){
           throw new Exception("Vlaue of B is Invalid");
       }else{
           $result = $a/$b;
           echo "Answer is : ".$result;
       }
   } catch(Exception $e){
       echo $e->getMessage();
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
        A: <input type="text" name="a" id=""><span> /</span>
        B:<input type="text" name="b" id="">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>