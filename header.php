<!DOCTYPE html>
<html lang="en">
<head>
<title>Header</title>
	<!--// Meta tag Keywords -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->

<!-- css files -->
<link rel="stylesheet" href="web_home/css_home/edwin.css">
<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all"/> <!-- Style-CSS -->
<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css">

  <title>Page</title>
</head>
<body>
<header>
	<div class="container agile-banner_nav">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">

			<h1><a class="navbar-brand" href="home.php">HMS <span class="display"></span></a></h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="services.php">Hostels</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="paymentform.php">Payment</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
						
						<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>
					</ul>
				</div>
		</nav>
	</div>
</header>
<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="web_home/js/bootstrap.js"></script>
