<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="stylesheets/application.css">
  <title>RW Sign Up page</title>
</head>

<body>
  <div class="loginLogo row">
    <div class="col">
      <h1>Big Logo</h1>
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
        <input type="text" class="form-control" id="username_id" placeholder="Username">
      </div>
      <div class="mb-3">
        <label for="email_id">Email address</label>
        <input type="email" class="form-control" id="email_id" aria-describedby="emailHelp" placeholder="Email address">
      </div>
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
        <button type="login" class="btn btn-primary" onclick="GoToLogin()">&nbspLogin&nbsp</button>
      </div>
      <div class="col text-end">
        <button type="submit" class="btn btn-primary" onclick="CreateAccount()">Submit</button>
      </div>
    </div>
  </div>

  <script src="javascripts/login.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>