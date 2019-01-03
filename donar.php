
<!-- <!Doctype html> -->
<html>
	<head>
		<title>donar</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/signUpCSS.css">
	</head>

	<body>


		<div class="menu">
			<div class="div-right">
				<style>
					ul#menu li {
					    display:inline;
					}
					</style>
				<ul class="pull-right"  id="menu">
					<?php
					session_start();
					if(!empty($_SESSION['user_email'])){ ?>

                    	<li><a href="updateInfo.php">
                    	<?php $email=$_SESSION['user_email'];
                    	echo "$email"; ?></a></li>
                    <li><a href="index.php" name="_home">Home</a></li>
                    <li><a href="testdetails.php" name="_Testdetails">Test Details</a></li>
					<li><a href="logout.php" name="_logout">Logout</a></li>




                    <?php }



					else { ?>

					<li><a href="logout.php" name="_logout">Logout</a></li>
					<li><a href="index.php" name="_home">Home</a></li>


					<?php } ?>

				</ul>
			</div>
		</div>



			<div class="outside">
				<form action="donar.php" class="form-horizontal" role="form" method="post">



					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="fname"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_fname" class="form-control" id="fname" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="lname"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_lname" class="form-control" id="lname" placeholder="Last Name">
						</div>
					</div>



					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="phone"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_phone" class="form-control" id="phone" placeholder="Enter Phone">
						</div>
					</div>



  					<div class="form-group">
    					<div class="col-sm-offset-3 col-sm-3">
      						<button name="submit" id="submit" type="submit" class="btn btn-default">Submit</button>
    					</div>
  					</div>
				</form>
		</div>

        <?php

        	 include("connect.php");
            if(isset($_POST['submit']))

            {
                // $did = $_POST['_did'];
                $fname = $_POST['_fname'];
                $lname =$_POST['_lname'];
                // $bloodgroup = $_POST['_bloodgroup'];
                $phone = $_POST['_phone'];


                if( empty($fname) || empty($lname) ||empty($phone)){
                    echo "<script>alert('All feilds are required!')</script>";
                }

                else
                {

                $sql = "INSERT INTO donor(firstname,lastname,phonenumber)
                    VALUES('$fname','$lname','$phone')";
										$result = $conn->query($sql);
                // $stid = oci_parse($conn, '$insert ');
								if($result === TRUE){
														?>
														<div class="alert alert-success col-lg-12 col-lg-push-0">
																Form successfully submitted.
														</div>
														<?php

															 }
								else{
									echo "Error: " . $sql . "<br>" . $conn->error;
										}
                 }
			}

        ?>

	</body>
</html>
