<?php
$dsn = "mysql:host=localhost;dbname=jaymin2033";
$db_user = "root";
$db_password = "";

try{
    $conn = new PDO($dsn,$db_user,$db_password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected <br><br>";
}
catch(PDOException $e){
    echo "Connection Failed .." . $e ->getMessage();
}

// try{
//     $sql = "select * from jammu";
//     //preapared statement
//     $result = $conn->prepare($sql);
//     //execute prepared statement
//     $result ->execute();

//     //bind by column number
//     // $result -> bindColumn(1,$id);
//     // $result -> bindColumn(2,$name);
//     // $result -> bindColumn(3,$roll);
//     // $result -> bindColumn(4,$add);

//     $result -> bindColumn('id',$id);
//     $result -> bindColumn('name',$name);
//     $result -> bindColumn('roll_no',$roll);
//     $result -> bindColumn('address',$add);

//     while($result->fetch(PDO::FETCH_BOUND)){
//         echo "ID:".$id." Name:".$name." Roll: ".$roll." Address:".$add."<br><br>";
//     }

//     //fetch data
//     // while($row = $result->fetch(PDO::FETCH_ASSOC)){
//     // echo "ID: ".$row['id']."Name: ".$row['name']."Roll NO: ".$row['roll_no']."Address: ".$row['address']."<br><br>";
//     // }
// }
// catch(PDOException $e){
//     echo $e -> getMessage();
// }

// try{
//     $sql = "select * from jammu where id = :id";
//     // $sql = "select * from jammu where id = ? && name= ?";
//     $result = $conn -> prepare($sql);
//     // $result ->bindParam(':id',$id);
//     // $result ->bindValue(1,94);
//     // $id = 96;
//     $result->execute(array(':id'=>94));
//     $row = $result->fetch(PDO::FETCH_ASSOC);
//     echo "ID: ".$row['id']."Name: ".$row['name']."Roll NO: ".$row['roll_no']."Address: ".$row['address']."<br><br>";
// }catch(PDOException $e){
//     echo $e -> getMessage();
// }

//close 
unset($result);
//close connection
$conn = null;
?>