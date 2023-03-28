<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/include.php"); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="stylesheets/application.css">
  <title>RW Login page</title>
</head>

<body>
  <?php include_once("includes/nav.php"); ?>
  <div class="loginLogo row">
    <div class="col">
      <img src="images/WTFcropped.png" alt="Big WTF Logo">
    </div>
  </div>

  <div class="card login">
    <div class="row">
      <h2>Login</h2>
    </div>
    <div class="row">
      <div class="mb-3">
        <label for="einputEmail1">Email address</label>
        <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="Email address or username" max="64">
        <a href="#">Forgot Email?</a>
      </div>
      <div class="mb-3">
        <label for="inputPassword1">Password</label>
        <input type="password" class="form-control" id="inputPassword1" placeholder="Password">
        <a href="#">Forgot Password?</a>
      </div>
    </div>
    <div class="row buttons">
      <div class="col text-start">
        <button type="signup" class="btn btn-primary" onclick="signUp()">Sign up</button>
      </div>
      <div class="col text-end">
        <button type="submit" class="btn btn-primary" id="btnLogin" onclick="login()">Submit</button>
      </div>
    </div>
  </div>

  <script src="javascripts/login.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>