<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/include.php"); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="stylesheets/application.css">
  <title>RW Sign Up page</title>
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
      <h2>Sign Up</h2>
    </div>
    <div class="row">
      <div class="col">
        <label for="first_name_id">First Name</label>
        <input type="text" class="form-control" id="first_name_id" placeholder="First Name">
      </div>
      <div class="col">
        <label for="last_name_id">Last Name</label>
        <input type="text" class="form-control" id="last_name_id" placeholder="Last Name">
      </div>
      <div class="mb-3">
        <label for="user_id">Username</label>
        <input type="text" class="form-control" id="username_id" placeholder="Username" max="64">
      </div>
      <!--
        <div class="mb-3">
        <label for="email_id">Email address</label>
        <input type="email" class="form-control" id="email_id" aria-describedby="emailHelp" placeholder="Email address">
      </div>
      -->
      <div class="col">
        <label for="password_id">Password</label>
        <input type="password" class="form-control" id="password_id" placeholder="Password">
      </div>
      <div class="col">
        <label for="confirm_password_id">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password_id" placeholder="Confirm">
      </div>
    </div>
    <div class="row">
      <p>Password must use 8 or more characters with a mix of letters, numbers & symbols.</p>
    </div>
    <div class="row buttons">
      <div class="col text-start">
        <button type="login" class="btn btn-primary" onclick="GoToLogin()">Back to Login</button>
      </div>
      <div class="col text-end">
        <button type="submit" class="btn btn-primary" id="btnCreateAccount" onclick="CreateAccount()">Create Account</button>
      </div>
    </div>
  </div>

  <script src="javascripts/login.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>