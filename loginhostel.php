<?php include('server.php')?>
<?php include('headers.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="edwin">
  <div class="header">
  	<h2> Admin Login</h2>
  </div>
  <form method="post" action="loginhm.inc.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login">Login</button>
  	</div>
	  <p>Login as<a href="login.php">Student</a></p>
      </form>
</div>
</body>
</html>