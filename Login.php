
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
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email or username">
          <a href="#">Forgot Email?</a>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="inputPassword" placeholder="Password">
          <a href="#">Forgot Password?</a>
        </div>
      </form>
    </div> 
    <div class="row btn-group">
      <div class="card-body flex-column align-items-left">
        <button type="button" class="btn btn-block btn-primary mt-auto">Sign up</button>
      </div>
      <div class="card-body flex-column align-items-right">
        <button type="button" class="btn btn-block btn-primary mt-auto" onclick="login()">Login</button>
      </div>
    </div>
  </div>

  <script src="javascripts/login.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</body>

</html>