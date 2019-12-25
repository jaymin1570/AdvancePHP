<?php
// Sanitize Email using Filter
// $email = 'jaymin////makwana(((())))157@gmail.com';
// $vemail = filter_var($email, FILTER_SANITIZE_EMAIL);
// echo "Email is: ".$vemail."<br><br>";
// ?>

<?php
// Validation and Sanitozation
$email = 'jaymin///makwana157@gmail.com';
$semail = filter_var($email, FILTER_SANITIZE_EMAIL);
$vemail = filter_var($semail, FILTER_VALIDATE_EMAIL);
if($vemail == FALSE){
    echo "Invalid Email <br>";
}else{
    echo "valid and sanitization Email : ".$vemail."<br>";
}

?>