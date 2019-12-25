<?php

$dsn  = "mysql:host=localhost; dbname=jaymin;";
$db_user = "root";
$db_password = "";

try {
    $conn = new PDO($dsn, $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected<br><hr>";

    //Insert Data
    if (isset($_REQUEST['submit'])) {
        //checking for empty field
        if ($_REQUEST['name'] == "" || $_REQUEST['roll_no'] == "" || $_REQUEST['address'] == "") {
            echo "<small>Fill all field</small><hr>";
        } else {
            $name = $_REQUEST['name'];
            $roll = $_REQUEST['roll_no'];
            $add = $_REQUEST['address'];

            $sql = "INSERT INTO `students`( `name`, `roll no`, `address`) VALUES ('$name','$roll','$add')";
            $result = $conn->exec($sql);
            echo $result . "row inserted";
        }
    }
    if(isset($_REQUEST['delete'])){
        
    $sql2 = "DELETE FROM `students` WHERE id ={$_REQUEST['id2']}";
      
        $result = $conn->exec($sql2);
        echo $_REQUEST['id2'];
        echo $result ."Row Deleted successfully.....";
    }
    if(isset($_REQUEST['update'])){
        
        $name = $_REQUEST['name'];
        $roll = $_REQUEST['roll_no'];
        $add = $_REQUEST['address'];
        echo "bbbb";

    $sql3 = "UPDATE `students` SET `name`= '$name',`roll no`='$roll',`address`='$add' WHERE id= {$_REQUEST['id2']} ";
        echo "chfh";
        $result = $conn -> exec($sql3);
        echo "nnvuibivv";
        echo $result."Row Upadate successfully.....";
    }
    
} catch (PDOException $e) {
    echo "connection Failed" . $e->getMessage();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PDO</title>
</head>

<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="name" name="name">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="roll no">Roll No</label>
                                <input type="text" class="form-control" id="roll no" placeholder="roll no" name="roll_no">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" id="Address" placeholder="address" name="address">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        if(isset($_REQUEST['edit'])){
                            $sql = "SELECT `name`, `roll no`, `address` FROM `students` WHERE id={$_REQUEST['id2']}";
                            $result = $conn->query($sql);
                            $row = $result->fetch(PDO::FETCH_ASSOC);
                            
                            }
                        ?>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="name" name="name" value="<?php if(isset($row['name'])){ echo $row['name'];} ?>">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="roll no">Roll No</label>
                                <input type="text" class="form-control" id="roll no" placeholder="roll no" name="roll_no" value="<?php if(isset($row['roll no'])){ echo $row['roll no'];} ?>">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" id="Address" placeholder="address" name="address" value="<?php if(isset($row['address'])){ echo $row['address'];} ?>">
                            </div>
                        </div>
                        <input type="hidden" name="id2" value="<?php echo $row['id'] ?>">
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                    </form>
                    </div>
                    <div >
                        <?php

                        $sql = "select * from students";
                        $result = $conn->query($sql);

                        if ($result->rowCount() > 0) {
                            echo "<table class='table container'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Roll No</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['name'] . "</td>
                                            <td>" . $row['roll no'] . "</td>
                                            <td>" . $row['address'] . "</td>
                                            <td><form action='' method='POST'> <input type='hidden' name='id2' value=" . $row['id'] . " ><input type='submit' name='delete' class='btn btn-sm btn-danger' value='Delete'>
                                            <input type ='submit' name='edit' class='btn btn-sm btn-warning' value='Edit'></form></td>
                                        </tr>";
                            }
                            echo  "</tbody>
                            </table>";
                        }
                        ?>
                    </div>
                    
               
            </div>
        </div>
    </div>
    <?php $conn = null; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<!-- // foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row){
//     // echo "<pre>",print_r($row),"</pre>";
//     echo print_r($row);
// }
// if($result->rowCount() > 0){
//     while($row = $result -> fetch(PDO::FETCH_ASSOC)){
//         echo "ID:".$row['id']."<br>";
//     }
// }
// else{
//     echo "0 Result";
// }

// echo "<pre>" , print_r($row) ,"</pre>"; -->

<!-- ?> -->