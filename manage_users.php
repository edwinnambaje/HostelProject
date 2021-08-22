<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="web_home/css_home/edwin.css">
    <link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
 <!-- Style-CSS -->
<header>
	<div class="container agile-banner_nav">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">

			<h1><a class="navbar-brand" href="home.php">HMS <span class="display"></span></a></h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="homeadmin.php">Home <span class="sr-only">(current)</span></a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="manage_hostel.php">Manage Hostel</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="manage_users.php">Manage users</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href="allocate.php">Allocated</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href="login.php">Logout</a>
					</li>
				</ul>
			</div>

		</nav>
	</div>
</header>

<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
				<form action="manage_users.php" method="post">
					<div class="row">
					        <div class="col-md-9"> 
							<input type="text" placeholder="Search by Roll Number" name="search_box">
							</div>
							<div class="col-md-3">
							<input type="submit" value="Search" name="search"></input>
							</div>
					</div>
				</form>
			</div>
	</div>
</section>
        <div class="main-content">
            <div class="wrapper">
                <br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying Session Message
                        unset($_SESSION['add']); //REmoving Session Message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                ?>
                <br><br><br>

                <!-- Button to Add Admin -->
                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>Roll Number</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>

                    
                    <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM users";
                        //Execute the Query
                        $res = mysqli_query($db, $sql);

                        //CHeck whether the Query is Executed of Not
                        if($res==TRUE)
                        {
                            // Count Rows to CHeck whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn=5; //Create a Variable and Assign the value

                            //CHeck the num of rows
                            if($count>0)
                            {
                                //WE HAve data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
                                    $roll=$rows['roll'];
                                    $username=$rows['username'];
                                    $email=$rows['email'];
                                    $department=$rows['department'];
                                    $gender=$rows['gender'];
                                    //Display the Values in our Table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $roll; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $department; ?></td>
                                        <td><?php echo $gender; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>update_password.php?roll=<?php echo $roll; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>update_student.php?roll=<?php echo $roll; ?>" class="btn-secondary">Update student</a>
                                            <a href="<?php echo SITEURL; ?>delete_student.php?roll=<?php echo $roll; ?>" class="btn-danger">Delete student</a>
                                        </td>
                                    </tr>

                                    <?php

                                }
                            }
                            else
                            {
                                //We Do not Have Data in Database
                            }
                        }

                    ?>


                    
                </table>

            </div>
        </div>