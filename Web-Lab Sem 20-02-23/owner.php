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
    a{
        text-decoration: none;
        color: black;
    }
    button:hover{
        cursor : pointer;
    }
    body{
        display: flex;
        background-color: #00ffff4f;
        flex-direction: column;
    }
    .container{
        border: 2px solid red;
        margin: auto auto;
        margin-top: 8rem;
        padding: 5px;
        background-color: #ffa5006e;
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
    <h1>CONVENTION CENTER DETAILS</h1>
    <div class="container">
        
        <form method="post" onsubmit="return validation()">
        <div class="item">
            <b>Name :</b> <input type="text" name="Name" id="Name">
        </div>
        <div class="item">
            <b>Location :</b> <input type="text" name="location" id="location">
        </div>
        <div class="item">
            <b>Capacity :</b> <input type="text" name="capacity" id="capacity">
        </div>
        <div class="item">
            <b>Available Date :</b> <input type="date" name="date" id="date">
        </div>
        <div class="item">
            <b>Contact No:</b> <input type="text" name="contact" id="contact">
        </div>
        <div class="item">
            <input type="submit" name="sub"> <button> <a href="/sem/user.php">User</a></button>
        </div>
        </form>
    </div>
<?php

if (isset($_POST['sub'])) {
    $name = $_POST['Name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $date = $_POST['date'];
    $contact = $_POST['contact'];
    $sql = "INSERT INTO owner VALUES ('$name','$location','$capacity','$date','$contact')";
    $result = mysqli_query($conn,$sql);
}
?>
<script>
    function validation(){
        if(document.getElementById('Name').value.length==0){
            alert("Please enter a valid name");
            return false;
        }
        if(document.getElementById('location').value.length==0){
            alert("Please enter a valid location");
            return false;
        }
        if(document.getElementById('capacity').value <= 0){
            alert("Please enter a valid capacity");
            return false;
        }
        if(document.getElementById('date').value==""){
            alert("Please select a valid date");
            return false;
        }
        if(document.getElementById('contact').value.length == 0){
            alert("Please enter a valid contact number");
            return false;
        }
    }
</script>
</body>
</html>