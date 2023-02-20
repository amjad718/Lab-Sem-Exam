<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    a{
        text-decoration: none;
        color: black;
    }
    button:hover{
        cursor : pointer;
    }
    body{
        display: flex;
        background-color: #4caf5085;
        flex-direction: column;
    }
    .container{
        border: 2px solid red;
        margin: auto auto;
        margin-top: 8rem;
        padding: 5px;
        background-color: #9c27b07a;
    }
    .item{
        padding: 5px;
    }
    h1{
        margin: auto auto;
        margin-top: 5rem;
    }
</style>
</head>
<body>
<h1>BOOK CONVENTION CENTER</h1>
    <div class="container">
        
        <form method="post" onsubmit="return validation()">
            <div class="item">
                <b>Name: </b> <input type="text" name="nameuser" id="nameuser">
            </div>
            <div class="item">
                <b>Contact NO:</b> <input type="text" name="contactuser" id="contactuser">
            </div>
            <div class="item">
                <b>Convention Center :</b> <input type="text" name="conventionuser" id="conventionuser">
            </div>
            <div class="item">
                <b>Date of Occasion:</b> <input type="date" name="dateuser" id="dateuser">
            </div>
            <div class="item">
                <b>Capacity:</b> <input type="text" name="capacityuser" id="capacityuser">
            </div>
            <div class="item">
                <input type="submit" name="checkuser" value="Check Availability">
                <input type="submit" name="subuser" value="Book">
                <button><a href="/sem/details.php">View Booked Venues</a></button>
            </div>
        </form>
    </div>
<?php
if (isset($_POST['checkuser'])) {
    $nameuser = $_POST['nameuser'];
    $contactuser = $_POST['contactuser'];
    $conventionuser = $_POST['conventionuser'];
    $dateuser = $_POST['dateuser'];
    $capacityuser = $_POST['capacityuser'];

    $sql = "SELECT * FROM owner WHERE Date = '$dateuser' ";
    $result = mysqli_query($conn,$sql);
    echo "<h4>The convention centers available on the particular dates are: \n";
    echo "<table border=1>";
    echo "<tr><td>Name</td><td>Location</td><td>Capacity</td><td>Date</td><td>Contact Details:</td></tr>";
    foreach ($result as $row) {
        echo "<tr><td>".$row['Name']."</td><td>".$row['Location']."</td><td>".$row['Capacity']."</td><td>".$row['Date']."</td><td>".$row['Contact']."</td></tr>";
    }
    echo "</table>";
}
if (isset($_POST['subuser'])) {
    $nameuser = $_POST['nameuser'];
    $contactuser = $_POST['contactuser'];
    $conventionuser = $_POST['conventionuser'];
    $dateuser = $_POST['dateuser'];
    $capacityuser = $_POST['capacityuser'];
    
    $sql = "INSERT INTO user VALUES ('$nameuser','$contactuser','$conventionuser','$dateuser','$capacityuser')";
    $result = mysqli_query($conn, $sql);
    
    $sqldlt = "DELETE FROM owner WHERE Date='$dateuser'";
    $resdlt = mysqli_query($conn, $sqldlt);
}
?>
<script>
    function validation(){
        if(document.getElementById('nameuser').value.length==0){
            alert("Please enter a valid name");
            return false;
        }
        if(document.getElementById('contactuser').value.length<=9){
            alert("Please enter valid contact details");
            return false;
        }
        if(document.getElementById('conventionuser').value.length==0){
            alert("Please enter a valid convention center name ");
            return false;
        }
        if(document.getElementById('dateuser').value==""){
            alert("Please select a valid date");
            return false;
        }
        if(document.getElementById('capacityuser').value.length==0){
            alert("Please enter the valid capacity");
            return false;
        }
    }
</script>
</body>
</html>