<?php
// //validate Email using Filter...
// $email = "jayminmakwana157@gmail.com";
// $vemail = filter_var($email,FILTER_VALIDATE_EMAIL);
// if($vemail == False){
//     echo "invalid Email <br>";
// }else{
//     echo "Email is valid : " .$vemail."<br>";
// }
?>

<?php
//validate float/double using Filter...
$price = 10;
echo gettype($price)."<br>";
$vprice = filter_var($price,FILTER_VALIDATE_FLOAT);
if($vprice == False){
    echo "invalid Price <br>";
}else{
    echo "Price is valid : " .$vprice."<br>";
}
echo gettype($vprice)."<br>";

?>