<?php
    $login = false;
    $unmatch = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/db_connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

        $SQL = "Select * from users where username='$username' AND password='$password'";
        $result = mysqli_query($conn, $SQL);
        $num = mysqli_num_rows($result);
        if($num==1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: welcome.php");     //redirect
        }
    else{
        $unmatch = "Invalid credentials";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LOGIN PAGE</title>
  </head>
  <body>
    <?php
    require 'partials/nav.php' ?>

  <?php
  if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> you are logged in..
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
    }
    ?>
      <?php
     if($unmatch){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $unmatch.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
    }
    ?>
    

    <div class="container my-4">
        <h2 class="text-center" >Login</h2>
    <form action="/Login_system/login.php" method="post">
  <div class="mb-3">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>