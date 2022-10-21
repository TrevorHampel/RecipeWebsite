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
      <div class="mb-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address">
      </div>
      <div class="col">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="col">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="confirmPassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm">
      </div>
    </div>
    <div class="row">
      <p>Password must use 8 or more characters with a mix of letters, numbers & symbols.</p>
    </div> 
    <div class="row buttons">
      <div class="col text-start">
        <button type="login" class="btn btn-primary">&nbspLogin&nbsp</button>
      </div>
      <div class="col text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>

  <script src="javascripts/application.js"></script>
</body>
</html>