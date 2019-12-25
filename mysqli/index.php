<?php
// // create Connection
// $conn= mysqli_connect("localhost","root","","jaymin");
// //check connection
// if($conn)
// {
//     echo "connection successfully...";
// }

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "jaymin";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$conn) {
    die('<button style="color:red;">Connection Failed3</button>');
}
echo "connection sucessfully...";

if (isset($_REQUEST['submit3'])) {

    // echo "submit button clicked2";
    if (($_REQUEST['name'] == "") || ($_REQUEST['roll_no'] == "") || ($_REQUEST['address'] == "")) {
        echo "<small>Fill all fields....</small><hr>";
    } else {
        // echo "data successfully.....update2";
        $name = $_REQUEST['name'];
        $roll = $_REQUEST['roll_no'];
        $add = $_REQUEST['address'];

        $sql = "INSERT INTO `students`(`name`, `roll no`, `address`) VALUES ('$name','$roll','$add')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New Record Inserted Successfully...')</script>";
            // <p style='color:green;'>New Record Inserted Successfully...</p>
        } else {
            echo "<p style='color:red;'>not inserted2</p>";
        }
    }
}

if (isset($_REQUEST['delete'])) {
    $sql = "delete from students where id= {$_REQUEST['id']}";
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Record Deleted...')</script>";
    } else {
        echo "Error Unable to Delete Record";
    }
}

if (isset($_REQUEST['edit'])) {

    $sql = "select * from students where id = {$_REQUEST['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
if (isset($_REQUEST['update'])) {
    if (($_REQUEST['name'] == "") || ($_REQUEST['roll_no'] == "") || ($_REQUEST['address'] == "")) {
        echo "<small>Fill all fields....update</small><hr>";
    } else {
        $name = $_REQUEST['name'];
        $roll = $_REQUEST['roll_no'];
        $add = $_REQUEST['address'];
        
        $sql = "UPDATE `students` SET `name`= '$name',`roll no`='$roll',`address`='$add' WHERE id= {$_REQUEST['id']}";
        
        if (mysqli_query($conn, $sql)) {
           
            echo "<script>alert('Update Successfully...')</script>";
            // <p style='color:green;'>New Record Inserted Successfully...</p>
        } else {
            echo "<p style='color:red;'>not Upadted</p>";
        }
    }
}
// $sql = "INSERT INTO `students`( `name`, `roll no`, `address`) VALUES ('mehul2','422','Botad2')";

// if(mysqli_query($conn,$sql)){
//     echo "<p style='color:green;'>New record successfully..</p>";
// }
// else{
//     echo "<p style='color:red;'>something went to wrong..</p>";
// }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Jaymin Makwana</title>
</head>

<body>
    <div class="ml-4 mt-4">
        <div class="row">
            <div class="">
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

                    <button type="submit" class="btn btn-primary" name="submit3">Submit</button>
                </form>

                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($row["name"])) {
                                                                                                        echo $row["name"];
                                                                                                    } ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="roll no">Roll No</label>
                            <input type="text" class="form-control" id="roll no" name="roll_no" value="<?php if (isset($row["roll no"])) {
                                                                                                            echo $row["roll no"];
                                                                                                        } ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="Address" name="address" value="<?php if (isset($row["address"])) {
                                                                                                            echo $row["address"];
                                                                                                        } ?>">
                        </div>
                    </div>
                    <input type='hidden' name='id' value="<?php echo $row['id'] ?>">
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                </form>
            </div>
            <div class="col-sm-6">
                <?php

                $sql = "select * from students";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo '<table class="table table-triped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Roll No</th>";
                    echo "<th>Address</th>";
                    echo "<th class='text-center'>Action</th>";
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['roll no'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td><form action='' method='POST'> <input type='hidden' name='id' value=" . $row['id'] . " ><input type='submit' name='delete' class='btn btn-danger' value='Delete'><input type='submit' name='edit' class='btn btn-warning ml-4' value='Edit'></form></td>";
                        echo "<tr>";
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "<p style='color:red;'>0 Result</p>";
                }
                ?>
            </div>

        </div>
        <hr>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>


<?php
// $sql = "select * from students";
// $result = mysqli_query($conn,$sql);
// if(mysqli_num_rows($result)>0){
//     while($row = mysqli_fetch_assoc($result)){
//         echo $row['id']."<br>";
//     echo $row['name']."<br>";
//     echo $row['roll no']."<br>";
//     echo $row['address']."<br><br>";
//     }
// }
// else{
/*echo "?> <p style='color:red;'>0 Result</p> <?php";
// }

// echo $row['id']."<br>";
// echo $row['name']."<br>";
// echo $row['roll no']."<br>";
// echo $row['address']."<br>";
// echo $s;
// $m = mysqli_num_rows($s);
// echo $m; */
?>