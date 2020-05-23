<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="{{asset('')}}">
  <title>Login</title>
  <!-- Bootstrap core CSS-->
  <link href="public/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="public/backend/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="public/backend/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">
      	@if(session('status'))
      		<div class="alert alert-danger">{{session('status')}}</div>
      	@endif
        <form action="admin/login" method="POST">
        	@csrf
          <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control @error('email')is-invalid @enderror" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            @error('email')
            	<div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control @error('password')is-invalid @enderror" id="password" type="password" placeholder="Password" name="password">
            @error('password')
            	<div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember Password</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="public/backend/vendor/jquery/jquery.min.js"></script>
  <script src="public/backend/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="public/backend/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
