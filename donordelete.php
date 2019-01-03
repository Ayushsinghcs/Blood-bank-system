<html>
	<head>
		<title>Submit Donor </title>
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

					<li><a href="index.php" name="_home">Home</a></li>

					<?php

                    elseif(!empty($_SESSION['admin_email'])){ ?>


<!-- 					<li><a href="logout.php" name="_logout">Logout</a></li> -->
					<?php }

					else { ?>
<!-- 					<li><a href="login.php">Staff Login</a></li> -->
					<li><a href="donor.php">Donar</a></li>
<!-- 					<li><a href="signup.php">Staff SignUp</a></li> -->
<!-- 					<li><a href="admin.php">Admin LogIn</a></li>   -->

					<?php } ?>

				</ul>
			</div>
		</div>
			<div class="outside">
				<form action="donordelete.php" class="form-horizontal" role="form" method="post">

					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="Oid"></label>
						<div class="control-label col-sm-8">

					<select name="Oid" class="form-control" placeholder="Enter Donor ID">
							<?php
							include("connect.php");
													 $sql = 'SELECT id FROM donor';
							 $result = $conn->query($sql);
							 while($row=$result->fetch_array())
					 		{
					 		echo "<option>";
					 		echo  $row["id"];
					 		echo "</option>";
					 		}
					 		?>
                           ?>

							</select>



  					<div class="form-group">
    					<div class="col-sm-offset-3 col-sm-3">
      						<button name="submit" id="submit" type="submit" class="btn btn-default">Delete</button>
    					</div>
  					</div>
	<?php
  	    $conn = include("connect.php");
    //mysql_connect("$host", "$username", "$password")or die("cannot connect");
    //mysql_select_db("$db_name")or die("cannot select DB");


    if(isset($_POST['submit']))

            {


    		$Oid=$_POST['Oid'];

  			$sql ="Delete from blood_test WHERE D_ID = '$Oid'";
    	$result = $conn->query($sql);

    		if ($result)
    			{

    			$query2 ="Delete from donor WHERE id = '$Oid'";
    			 $conn->query($sql);
        		echo "Deleted Successfully";
       		 echo "<br>";
       			echo "<a href='donordelete.php'> Back to main page </a>";
   				 }
   			 else
    			{
        		echo "Error: " . $sql . "<br>" . $conn->error;

    }
    }
?>


	</body>
</html>
