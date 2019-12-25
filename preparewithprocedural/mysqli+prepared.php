<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "jaymin2033";

//Create connection

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

//check connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
echo "Connected Successfully....<hr><br>";

if (isset($_REQUEST['submit'])) {
    if ($_REQUEST['name'] == "" || $_REQUEST['roll_no'] == "" || $_REQUEST['address'] == "") {
        echo "<small>Fill all field</small><hr>";
    } else {
        $sql = "insert into  jammu (name,roll_no,address) values (?,?,?)";
        $result = mysqli_prepare($conn, $sql);
        if ($result) {
            mysqli_stmt_bind_param($result, 'sis', $name, $roll, $add);
            $name = $_REQUEST['name'];
            $roll = $_REQUEST['roll_no'];
            $add = $_REQUEST['address'];

            mysqli_stmt_execute($result);
            echo mysqli_stmt_affected_rows($result) . "Row Inserted <br>";
            mysqli_stmt_close($result);
        } else {
            echo "Not Inserted...";
        }
    }
}

if (isset($_REQUEST['delete'])) {

    $sql = "delete from jammu where id=?";
    $result = mysqli_prepare($conn, $sql);
    if ($result) {
        mysqli_stmt_bind_param($result, 'i', $id);
        $id = $_REQUEST['id2'];
        echo $id . ":";

        mysqli_stmt_execute($result);
        echo mysqli_stmt_affected_rows($result) . "Row deleted <br>";
    } else {
        echo "Not Deleted...";
    }
}

if (isset($_REQUEST['update'])) {
    if ($_REQUEST['name'] == "" || $_REQUEST['roll_no'] == "" || $_REQUEST['address'] == "") {
        echo "<small>Fill all field</small><hr>";
    } else {
        $sql = "update jammu set name=?,roll_no=?,address=? where id = ?";
        $result = mysqli_prepare($conn, $sql);
        if ($result) {
            mysqli_stmt_bind_param($result, 'sisi', $name, $roll, $add, $id);

            $name = $_REQUEST['name'];
            $roll = $_REQUEST['roll_no'];
            $add = $_REQUEST['address'];
            $id = $_REQUEST['id2'];
            echo "updated id :" . $id;

            mysqli_stmt_execute($result);
            echo mysqli_stmt_affected_rows($result) . "Row Updated...<br>";
        }
        mysqli_stmt_close($result);
    }
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

    <title>Prepared Statement</title>
</head>

<body>
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
                if (isset($_REQUEST['edit'])) {
                    $sql = "select * from jammu where id = ?";
                    $result = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($result, 'i', $id);
                    $id = $_REQUEST['id2'];
                    echo $id . ":";
                    mysqli_stmt_bind_result($result, $id, $name, $roll, $address);
                    mysqli_stmt_execute($result);
                    mysqli_stmt_fetch($result);
                    mysqli_stmt_close($result);
                }
                ?>
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="name" name="name" value="<?php if (isset($name)) {
                                                                                                                        echo $name;
                                                                                                                    } ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="roll no">Roll No</label>
                            <input type="text" class="form-control" id="roll no" placeholder="roll no" name="roll_no" value="<?php if (isset($roll)) {
                                                                                                                                    echo $roll;
                                                                                                                                } ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="Address" placeholder="address" name="address" value="<?php if (isset($address)) {
                                                                                                                                    echo $address;
                                                                                                                                } ?>">
                        </div>
                    </div>
                    <input type='hidden' name='id2' value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                </form>

            </div>
            <div class="col-sm-8 offset-2">
                <?php
                $sql = "select * from jammu";
                $result = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_result($result, $id, $name, $roll, $add);
                mysqli_stmt_execute($result);
                mysqli_stmt_store_result($result);

                if (mysqli_stmt_num_rows($result) > 0) {
                    echo "<table class='table'>
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
                    while (mysqli_stmt_fetch($result)) {
                        echo "<tr>
                <td>" . $id . "</td>
                <td>" . $name . "</td>
                <td>" . $roll . "</td>
                <td>" . $add . "</td>
    
                <td><form action='' method='POST'> <input type='hidden' name='id2' value=" . $id . " >
                <input type ='submit' name='edit' class='btn btn-sm btn-warning mr-2' value='Edit'><input type='submit' name='delete' class='btn btn-sm btn-danger' value='Delete'>
                </form></td>
            </tr>";
                    }
                    echo  "</tbody>
                    </table>";
                } else {
                    echo "0 Records..";
                }
                ?>

            </div>

        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<?php
mysqli_stmt_close($result);
mysqli_close($conn);
?>

</html>