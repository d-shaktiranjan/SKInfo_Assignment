<?php

session_start();
if(isset($_SESSION['mail'])){
  header("location: index.php");
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'parts/dbConnect.php';
    $mail=$_POST["email"];
    $password=$_POST["password"];

    $sql="SELECT * FROM `userdata` WHERE mail='$mail'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if ($num>=1){
        while($row=mysqli_fetch_assoc($result)){
          if($row['password']==$password){
            $login=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['mail']=$mail;
            
            header("location: login.php");
            }
        }
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
    <title>Login</title>
</head>

<body>
    <?php include 'parts/navbar.php'?>
    <div class="container">
        <h2>Login Here</h2>
        <hr>
        <form method="POST" action="/skinfo/login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>

</html>