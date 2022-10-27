<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="stylesheets/application.css">
  <title>RW Login page</title>
</head>

<body>
  <div class="loginLogo row">
    <div class="col">
      <h1>Big Logo</h1>
    </div>
  </div>

  <div class="card login">
    <div class="row"> 
      <h2>Login</h2>
    </div>
    <div class="row">
      <div class="mb-3">
        <label for="einputEmail1">Email address</label>
        <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="Email address or username">
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
        <button type="submit" class="btn btn-primary" onclick="login()">Submit</button>
      </div>
    </div>
  </div>

  <script src="javascripts/login.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</body>
</html>