<?php
  require 'config.inc.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Allocate</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<!--bootsrap -->

	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/edwin.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
    </head>

<body>
<div class="inner-page-banner" id="home"> 	   
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="homeadmin.php">HMS<span class="display"></span></a></h1>
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
	</header>
	<!--Header-->
</div>
<!-- //banner --> 
<br><br><br>

<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
				<form action="allocate_room.php" method="post">
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
<?php
   if (isset($_POST['search'])) {
   	   $search_box = $_POST['search_box'];
   	   /*echo "<script type='text/javascript'>alert('<?php echo $search_box; ?>')</script>";*/
   	   $hostel_id = $_SESSION['hostel_id'];
   	   $query_search = "SELECT * FROM Application WHERE rolllike '$search_box%' and Hostel_id = '$hostel_id' and Application_status = '1'";
   	   $result_search = mysqli_query($conn,$query_search);

   	   //select the hostel name from hostel table
       $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
       $result6 = mysqli_query($conn,$query6);
       $row6 = mysqli_fetch_assoc($result6);
       $hostel_name = $row6['Hostel_name'];
   	   ?>
   	   <div class="container">
   	   <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Hostel</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
   	   if(mysqli_num_rows($result_search)==0){
   	   	  echo '<tr><td colspan="4">No Rows Returned</td></tr>';
   	   }
   	   else{
   	   	  while($row_search = mysqli_fetch_assoc($result_search)){
      		//get the name of the student to display
            $roll= $row_search['roll'];

            $query7 = "SELECT * FROM users WHERE roll= '$roll'";
            $result7 = mysqli_query($db,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $student_name = $row7['username'];
            
      		echo "<tr><td>{$student_name}</td><td>{$row_search['roll']}</td><td>{$hostel_name}</td><td>{$row_search['Message']}</td></tr>\n";

   	   }
   }
   ?>
   </tbody>
  </table>
</div>
<?php
}
  ?>

<div class="container">
<h2 class="heading text-capitalize mb-sm-5 mb-4"> Applications Received </h2>
<?php
   $hostel_id = isset($_SESSION['hostel_id']);
   $query1 = "SELECT * FROM Application where Hostel_id = '$hostel_id' and Application_status = '1'";
   $result1 = mysqli_query($db,$query1);
   //select the hostel name from hostel table
   $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
   $result6 = mysqli_query($db,$query6);
   $row6 = mysqli_fetch_assoc($result6);
   $hostel_name = $row6['Hostel_name'];
?>
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Roll number</th>
        <th>Hostel</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($result1)==0){
         echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }
      else{
      	while($row1 = mysqli_fetch_assoc($result1)){
      		//get the name of the student to display
            $roll= $row1['roll']; 
            $query7 = "SELECT * FROM users WHERE roll= '$roll'";
            $result7 = mysqli_query($db,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $student_name =$row7['username'];
            
      		echo "<tr><td>{$student_name}</td><td>{$row1['roll']}</td><td>{$hostel_name}</td><td>{$row1['Message']}</td></tr>\n";
      	}
      }
    ?>
    </tbody>
  </table>
</div>
<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
				<form action="allocate_room.php" method="post">
					<div class="row"> 
							<input type="submit" value="Allocate" name="submit">
					</div>
				</form>
			</div>
	</div>
</section>
<?php
if(isset($_POST['submit'])){
   $result1 = mysqli_query($db,$query1);
   
   /*echo "<script type='text/javascript'>alert('<?php echo $room_no ?>')</script>";*/
   while($row1 = mysqli_fetch_assoc($result1)){
         //find the minimum room number
     $query2 = "SELECT * FROM Room where Room_No = (SELECT MIN(Room_No) FROM Room where Allocated = '0' and Hostel_id = '$hostel_id')";
     $result2 = mysqli_query($db,$query2);
     if(!$result2){
     	   echo "<script type='text/javascript'>alert('Rooms not available')</script>";
     	   exit();
     }
     $row2 = mysqli_fetch_assoc($result2);
     $room_no = $row2['Room_No'];
     $roll= $row1['roll'];
     $query3 = "UPDATE Application SET Application_status = '0',Room_No = '$room_no' WHERE roll= '$roll'";
     $result3 = mysqli_query($conn,$query3);
     /*echo "<script type='text/javascript'>alert('<?php echo $result3; ?>')</script>";*/
     if($result3){
     	$room_id = $row2['Room_id'];
     	$query4 = "UPDATE Student SET Hostel_id = '$hostel_id',Room_id = '$room_id' WHERE roll= '$roll'";
     	$result4 = mysqli_query($conn,$query4);
     	if($result4){
     		$query5 = "UPDATE Room SET Allocated = '1' where Room_id = '$room_id'";
     		$result5 = mysqli_query($conn,$query5);
     		if($result5){
     		    echo "<script type='text/javascript'>alert('Rooms Allocated Successfully')</script>";	
     		}
     	}
     	else{
     		echo "<script type='text/javascript'>alert('Failed to allocate Rooms')</script>";
     	}
     }
     else{
     	echo "<script type='text/javascript'>alert('Failed to allocate Rooms')</script>";
     }

   }
   
}
?>
<br>
<br>
<br>