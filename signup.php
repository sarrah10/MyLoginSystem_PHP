<?php
    $success = false;
    $unmatch = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/db_connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpass = $_POST["cpass"];

    if($password==$cpass){
        $SQL = "INSERT INTO `users` ( `username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $SQL);
        if($result){
            $success = true;
        }
    }
    else{
        $unmatch = "Passwords do not match.";
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

    <title>SIGNUP</title>
  </head>
  <body>
    <?php
    require 'partials/nav.php' ?>

  <?php
  if($success){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You have created your account.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
    }
    ?>
      <?php
     if($unmatch){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> '. $unmatch.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
    }
    ?>
    

    <div class="container my-4">
        <h2 class="text-center" >Signup to the website</h2>
    <form action="/Login_system/signup.php" method="post">
  <div class="mb-3">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpass">Confirm Password</label>
    <input type="password" class="form-control" id="cpass" name="cpass" >
    <div id="emailHelp" class="form-text">Make sure to type the same password</div>
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>