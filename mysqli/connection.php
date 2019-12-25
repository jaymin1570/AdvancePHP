<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "jaymin";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("<p style='color:red;'>Connection Failed</p>");
} else {
    echo "<p style='color:green;'>Connected Successfully...</p><hr>";
}

$sql = "select * from students";
$result = $conn->query($sql);
// echo $result->num_rows;
// $row = $result -> fetch_assoc();
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo $row['id'] . " ".$row['name'] . " ". $row['roll no'] ." " . $row['address'] . "<br>";
//     }
// }else{
//     echo "<p style='color:red;'>0 Record</p>";

// }
// echo "<hr>";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div>
        <?php
        $sql = "select * from students";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        
            echo "<table class='table container'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['roll no'] . "</td>
                                <td>" . $row['address'] . "</td>
                            </tr>";
                  
            }
            echo  "</tbody>
                </table>";
        }else{
            echo "<p style='color:red;'>0 Record Found</p>";
        }
        echo "<hr>";
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>