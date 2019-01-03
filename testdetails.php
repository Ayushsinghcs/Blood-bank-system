
<?php
  include "connect.php";
    session_start();

?>
 -->
<html>
	<head>
		<title>Test Details</title>
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

					if(!empty($_SESSION['user_email'])){ ?>

                    	<li><a href="updateInfo.php">
                    	<?php $email=$_SESSION['user_email'];
                    	echo "$email"; ?></a></li>

					<li><a href="logout.php" name="_logout">Logout</a></li>
					<li><a href="index.php" name="_home">Home</a></li>

                    <?php }



					else { ?>
					<li><a href="login.php">Staff Login</a></li>
					<li><a href="donar.php">Donar</a></li>
					<li><a href="signup.php">Staff SignUp</a></li>
					<li><a href="admin.php">Admin LogIn</a></li>

					<?php } ?>

				</ul>
			</div>
		</div>



			<div class="outside">
				<form action="testdetails.php" class="form-horizontal" role="form" method="post">

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="did"></label>
						<div class="control-label col-sm-8">

							<select name = "did" class="form-control" placeholder="Enter Order Number">

													 <?php
												  $sql = "select id from donor";
												  $result= $conn->query($sql);
												  while($row=$result->fetch_array())
												  {
												 	echo "<option>";
												 	echo  $row["id"];
												 	echo "</option>";
												  }
												 	?>


							</select>

						</div>
					</div>




					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="testresult"></label>
						<div class="control-label col-sm-8">
							<select name="testresult" class="form-control">
							<option value="">Select TestReslut</option>
							<option value="Positive">Positive</option>
							<option value="Negative">Negative</option>
							</select>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="bloodgroup"></label>
						<div class="control-label col-sm-8">
							<select name="bloodgroup" class="form-control">
							<option value="">Select BloodGroup</option>

							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>


							</select>

						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="quantity"></label>
						<div class="control-label col-sm-8">
							<select name="quantity" class="form-control">
							<option value="">Select Units</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							</select>
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

            if(isset($_POST['submit']))

            {
                $did = $_POST['did'];
                $testresult = $_POST['testresult'];
                $bloodgroup = $_POST['bloodgroup'];
                $quantity = $_POST['quantity'];

                $staff_mail= $_SESSION['user_email'];

                if(empty($did) || empty($testresult)|| empty($bloodgroup) || empty($quantity) ){
                    echo "<script>alert('All feilds are required!')</script>";
                   }

                else
                {


									$sql= "SELECT * from staff where email = '$staff_mail' " ;
									$result = $conn->query($sql);

									while($row=$result->fetch_array())
									{
										$vid= $row["id"];

									}


                 $sql2 =  "INSERT INTO blood_test(S_ID,D_ID,testresult,bloodgroup,quantity)
                    VALUES('$vid','$did','$testresult','$bloodgroup','$quantity')";
                     //  DR. cano we want to use seq_test.nextval instead of '$tid'
										 	$result2 = $conn->query($sql2);
											if($result2 === TRUE){
																	?>
																	<div class="alert alert-success col-lg-12 col-lg-push-0">
																			Form successfully submitted.
																	</div>
																	<?php

																		 }
											else{
												echo "Error: " . $sql . "<br>" . $conn->error;
													}

                    ?>

										 <?php

                 }
			}

        ?>

	</body>
</html>
