<?php include('server.php') ?>
<div id="wrapper" class="w3ls_wrapper w3layouts_wrapper">
			<div id="steps" style="margin:0 auto;" class="agileits w3_steps">
					<fieldset class="step agileinfo w3ls_fancy_step">
						<legend>Personal Info</legend>
						<div class="abt-agile">
							<div class="abt-agile-left">
							</div>
							<div class="abt-agile-right">
								<h3><?php echo $_SESSION['username'];?></h3>
								<h5>Student</h5>
								<ul class="address">
									<li>
											<li><b>Roll No </b></li>
											<li>: <?php echo $_SESSION['roll']; ?></li>
									</li>
									<li>
											<li><b>username </b></li>
											<li>: <?php echo $_SESSION['username']; ?></li>
									</li>
									<li>
											<li><b>Department </b></li>
											<li>: <?php echo $_SESSION['department']; ?></li>
									</li>
									<li>
											<li><b>YEAR OF STUDY </b></li>
											<li>: <?php echo $_SESSION['year']; ?></li>
									</li>
								</ul>
							</div>
								<div class="clear"></div>
						</div>
				</fieldset>