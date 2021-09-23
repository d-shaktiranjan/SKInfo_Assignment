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
    <title>Signup</title>
</head>

<body>
    <div class="container">
        <h2>Signup Here</h2>
        <hr>
        <form action="/skinfo/signup.php" method="POST">
            <input type="text" name="userName" id="userName" placeholder="Shakti Ranjan Debata"> <br>
            <input type="email" name="userMail" id="userMail" placeholder="example@mail.com"> <br>
            <input type="number" name="mobile" id="mobile"> <br>
            <input type="password" name="password" id="password" required> <br>
            <input type="password" name="conPassword" id="conPassword" required> <br>
            <div class="form-check">
                <h4>Select your hobbies</h4>
                <input type="checkbox" id="reading" name="hobbies[]" value="reading">
                <label for="reading"> Reading</label><br>
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
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>