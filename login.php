<?php
session_start();
 ?>
<html>
<head>
<title>login page</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link type="text/css" rel="stylesheet" media="all" href="style.css"/>
   <link href="https://fonts.googleapis.com/css?family=Anton|Bree+Serif|Chicle|Roboto|FontAwesome" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div>
<div class="central">
<img src="trackinglogo.png" class="img-responsive" style="margin: 0 auto">
<p style="text-align:center;font-family:FontAwesome;font-size:24px;color:white"><strong>Combine</strong></p>
<p style="text-align:center;font-size:20px;font-family:FontAwesome;color:white"><strong>Tracking system</strong></p>

<form action="check.php" method="post">
<div class="central1">
  <div class="form-group">
    <label for="username">username:</label>
    <input type="text" class="form-control" name="username" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  </div>
  <div class="central2">
  <div class="checkbox">
    <label><input type="checkbox" required> Remember me</label>
  </div>
  <p><a href="signup.html">Create an account</a> </p>
  <div style="text-align:center">
  <button type="submit" class="btn btn-success" style="margin: 0 auto">Login</button>
  <button type="reset" class="btn btn-warning" style="margin: 0 auto; margin-left:10%;">Reset</button>
  </div>
 </div>
</form>

</div>
		</body>
		</html>
		