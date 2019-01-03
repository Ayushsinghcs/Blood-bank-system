<html>
	<head>
		<title>Blood Request</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/signUpCSS.css">
	</head>

	<body>


		<div class="menu">
			<div class="div-right">
				<ul class="pull-right">
					<?php

					if(!empty($_SESSION['user_email'])){ ?>

                    	<li><a href="updateInfo.php">
                    	<?php $email=$_SESSION['user_email'];
                    	echo "$email"; ?></a></li>

					<li><a href="logout.php" name="_logout">Logout</a></li>
					<li><a href="index.php" name="_home">Home</a></li>

                    <?php }



					else { ?>
 					<li><a href="index.php" name="_home">Home</a></li>

					<?php } ?>

				</ul>
			</div>
		</div>



			<div class="outside">

				<form action="BloodRequest.php" class="form-horizontal" role="form" method="post">



					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="HName"></label>
						<div class="control-label col-sm-8">

							<select name="HName" class="form-control" placeholder="hospital name">
							<?php
							 include("connect.php");
							 $sql = "select * from hospital";
					 		$result= $conn->query($sql);
					 		while($row=$result->fetch_array())
					 		{
					 		echo "<option>";
					 		echo  $row["hospital_name"];
					 		echo "</option>";
					 		}
?>
							</select>

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="Order no"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="no" class="form-control" id="no" placeholder="order no">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="PName"></label>
						<div class="control-label col-sm-8">
							<input type="text" name="_PName" class="form-control" id="PName" placeholder=" Patient Name">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="bloodgroup"></label>
						<div class="control-label col-sm-8">
							<select name="_BloodGroup" class="form-control">
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

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="quantity"></label>
						<div class="control-label col-sm-8">
							<select name="_quantity" class="form-control">
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

         $conn = include("connect.php");

        if(isset($_POST['submit']))

        	{
                 $no = $_POST['no'];

                $Hname = $_POST['HName'];
                $PName = $_POST['_PName'];




                $bloodgroup = $_POST['_BloodGroup'];

              	$quantity = $_POST['_quantity'];

              	$sql = "INSERT INTO bloodrequest(order_no,hospital_name,patient_name,bloodgroup,quantity,enter_date)
                     VALUES('$no','$Hname', '$PName', '$bloodgroup','$quantity',sysdate)" ;




            	if($conn->query($sql)===TRUE){
                  

                   ?> <h4> Form submitted </h4><?php


              	}
              	}


  			?>
	</body>
</html>
