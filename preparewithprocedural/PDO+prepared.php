<?php
$dsn = "mysql:host=localhost;dbname=jaymin2033";
$db_user = "root";
$db_password = "";

try {
    $conn = new PDO($dsn, $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected <br><br>";
} catch (PDOException $e) {
    echo "Connection Failed .." . $e->getMessage();
}

if (isset($_REQUEST['submit'])) {
    if ($_REQUEST['name'] == "" || $_REQUEST['roll_no'] == "" || $_REQUEST['address'] == "") 
        echo "<small>Fill all field</small><hr>";
    } else {
        $sql = "insert into jammu (name,roll_no,address) values (:name,:roll_no,:address)";
        $result = $conn -> prepare($sql);

        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':roll_no',$roll,PDO::PARAM_INT);
        $result->bindParam(':address',$add,PDO::PARAM_STR);

        $name = $_REQUEST['name'];
        $roll = $_REQUEST['roll_no'];
        $add = $_REQUEST['address'];

        $result -> execute();

        echo $result -> rowCount() . "Row Inserted <br>";
        unset($result);
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
        </div>
        <?php
        $sql = "select * from jammu";
        $result = $conn->prepare($sql);
        $result->execute();

        if ($result->rowCount() > 0) {
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
            while (($row = $result->fetch(PDO::FETCH_ASSOC))) {
                echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" .  $row['name'] . "</td>
                <td>" .  $row['roll_no'] . "</td>
                <td>" .  $row['address'] . "</td>
    
                <td><form action='' method='POST'> <input type='hidden' name='id2' value=" . $row['id'] . " >
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>