<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            background-color: #ffeb3b99;
        }

        .container {
            border: none;
            margin: auto auto;
            font-size: 4vh;
            margin-top: 3rem;
        }

        input {
            text-align: center;
        }
        table,td{
            border : 2px solid red;
        }
        .titems{
            margin: auto auto;
            margin-top: 6rem;
            font-size: 4vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="item">
                Enter a particular date: <input type="date" name="datedetails">
            </div>
            <div class="item">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                    type="submit" name="subdetails" value="SUBMIT">
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['subdetails'])) {
        $datedetails = $_POST['datedetails'];
        $sql = "SELECT * FROM user WHERE Date = '$datedetails' ";
        $result = mysqli_query($conn, $sql);
        echo "<div class='titems'><h4>The convention centers Booked on this dates are: \n";
        echo "<table>";
        echo "<tr><td>Name</td><td>Contact</td><td>Convention Center</td><td>Date</td><td>Capacity</td></tr>";
        foreach ($result as $row) {
            echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Contact'] . "</td><td>" . $row['Convention'] . "</td><td>" . $row['Date'] . "</td><td>" . $row['Capacity'] . "</td></tr>";
        }
        echo "</table></div>";

    }
    ?>
</body>

</html>