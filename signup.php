<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'parts/dbConnect.php';
    $name=$_POST["userName"];
    $mail=$_POST["userMail"];
    $mobile=$_POST["mobile"];
    $password=$_POST["password"];
    $conPass=$_POST["conPassword"];
    $hobbies=$_POST["hobbies"];
    $strFormHobbies=serialize($hobbies);
    if($password==$conPass){
        $sql="INSERT INTO `userdata` (`name`, `mail`, `mobile`, `password`, `hobbies`, `dateOfJoin`) 
        VALUES ('$name', '$mail', '$mobile', '$password', '$strFormHobbies', current_timestamp())";
        $res=mysqli_query($conn,$sql);
        if($res){
            echo ("Added");
        } else{
            echo ("Error");
        }
        echo ("Pass Match");
    } else{
        echo ("Pass not Match");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Signup</title>
</head>

<body>
    <div class="container">
        <h2>Signup Here</h2>
        <hr>
        <form action="/skinfo/signup.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="userMail" name="userMail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="userName" name="userName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="conPassword" name="conPassword"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 form-check">
                <h4>Select your hobbies</h4>
                <input type="checkbox" id="reading" name="hobbies[]" value="reading">
                <label for="reading" class="form-check-label"> Reading</label><br>
                <input type="checkbox" id="photography" name="hobbies[]" value="photography">
                <label for="photography">Photography</label><br>
                <input type="checkbox" id="outdoorGame" name="hobbies[]" value="outdoorGame">
                <label for="outdoorGame">Outdoor Game</label><br>
                <input type="checkbox" id="artCraft" name="hobbies[]" value="artCraft">
                <label for="artCraft"> Art & Craft</label><br>
                <input type="checkbox" id="podcast" name="hobbies[]" value="podcast">
                <label for="podcast"> PodCast</label><br>
                <input type="checkbox" id="somethingElse" name="hobbies[]" value="somethingElse">
                <label for="somethingElse"> Something Else</label><br>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</html>