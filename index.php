<?php

session_start();
if(!$_SESSION['loggedin']){
  header("location: login.php");
}

include 'parts/dbConnect.php';
$userMail=$_SESSION["mail"];
$sql="SELECT * FROM `userdata` WHERE mail='$userMail'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$hobbies=unserialize($row["hobbies"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Sk Info</title>
</head>

<body>
    <?php include 'parts/navbar.php'?>
    <div class="container">
        <h2>You are loggedin!</h2>
        <hr>
        <h3>Name:-<?php echo $row["name"]?></h3>
        <h3>Gender:- <?php echo ucwords($row["gender"])?></h3>
        <h3>Mail:- <?php echo $userMail?></h3>
        <h3>Mobile:- <?php echo $row["mobile"]?></h3>
        <h3>Hobbies:- <?php
        $slNo=0;
        foreach($hobbies as $item){
            if($slNo==0){
                echo ucwords($item);
            } else{
                echo ', '.ucwords($item);
            }
            $slNo++;
        }
        ?></h3>
        <h3>Date & time of join:- <?php echo $row["dateOfJoin"]?></h3>
        <hr>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="/skinfo/logout.php" class="btn btn-danger" type="button">Logout</a>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>

</html>