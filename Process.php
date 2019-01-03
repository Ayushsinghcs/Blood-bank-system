<html>
	<head>
		<title>Process</title>
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

					<li><a href="logout.php" name="_logout">Logout</a></li>
					<li><a href="index.php" name="_home">Home</a></li>


					<!-- <li><a href="donar.php" name="_Donar">Donar</a></li> -->
                    <?php }



					else { ?>
<!-- 					<li><a href="login.php">Staff Login</a></li>  -->
 					<li><a href="index.php" name="_home">Home</a></li>

<!-- 					<li><a href="signup.php">Staff SignUp</a></li>  -->
<!-- 					<li><a href="admin.php">Admin LogIn</a></li>    -->

					<?php } ?>

				</ul>
			</div>
		</div>



			<div class="outside">

				<form action="Process.php" class="form-horizontal" role="form" method="post">

                    <!-- <div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="Oid"></label>
						<div class="control-label col-sm-8">
							<input type="number" name="_Oid" class="form-control" id="Oid" placeholder="Enter Order Number">
						</div>
					</div>
 -->




					<div class="form-group">
						<label class="control-label col-sm-3 glyphicon glyphicon-user" for="Oid"></label>
						<div class="control-label col-sm-8">

							<select name="Oid" class="form-control" placeholder="Enter Order Number">
							<?php
						 include("connect.php");
                          	$sql =  'SELECT ordernum FROM bloodrequest';
								$result=$conn->query($sql)
						  ?>  <option value="">Select OrderNum</option> <?php
								while($row=$result->fetch_array())
								{
								echo "<option>";
								echo  $row["order_no"];
								echo "</option>";
								}
								?>
							</select>

							</select>
							<!-- <input type="text" name="_testresult" class="form-control" id="testresult" placeholder="Test Result"> -->

						</div>
					</div>

  					<div class="form-group">
    					<div class="col-sm-offset-3 col-sm-3">
      						<button name="submit" id="submit" type="submit" class="btn btn-default">Process</button>
    					</div>
  					</div>
					  <!-- <a href="login.html">LogIn</a> -->
				</form>
		</div>


        <?php
        // $conn = oci_connect('albalawiw', 'V00770335', 'localhost:20037/xe');
        $conn = include("connect.php");

            if(isset($_POST['submit']))

            {
               // $tid = $_POST['_tid'];
                $Oid = $_POST['Oid'];
                echo $Oid ;
                // $lid = $_POST['lid'];
                // echo $lid;
              	// ECHO  $Oid;
				$sql1 = "SELECT order_no from bloodrequest WHERE order_num = '$Oid'";

				if($conn->query($sql1)){


					 $sql2 = "UPDATE blood set quantity = (select (blood.quantity - bloodrequest.quantity) from bloodrequest ,blood where bloodrequest.bloodgroup =blood.bloodgroup and bloodrequest.order_no = $Oid)where bloodgroup = (select bloodrequest.bloodgroup from bloodrequest ,blood where bloodrequest.bloodgroup = blood.bloodgroup and bloodrequest.order_no =  $Oid )";
//     			 // ECHO  $insert
//             	//echo $insertExec;
//
 					if($conn->query($sql2)){
                       $staff_mail= $_SESSION['user_email'];
                       $sql3 = "SELECT id from staff where email = '$staff_mail' " ;
											 $result3 =  $conn->query($sql3);
											 while($row3 = $result3->fetch_array())
											 {
                	 $vid =  $row3['id'] ;
								 				}
//
//                   		?> <h4> Updated Blood Table </h4>  <?php
                		$sql4 = "INSERT into shipment(order_no,staff_id) VALUES ((select order_no from bloodrequest where order_no = '$Oid'),'$vid' ) ";
 						$sql5 = "Delete from bloodrequest where bloodrequest.order_no = '$Oid'";
 					$result4 = $conn->query($sql4);
					$result5 = $conn->query($sql5);

 						if($result4){
// 							?> <h4> Insert the ordernum in shipping </h4>  <?php
// 					//Echo 'Insert the ordernum in shipping';
// 				///echo \r\n;
 						               }

 						if($result5){
 							?> <h4> Delete the request from  BLOODREQUEST table</h4>  <?php
//  					//echo 'Delete the request from  BLOODREQUEST table';
 							           }
 						}


 					 else {
 					 	 ?> <h4> Blood out of stock</h4>  <?php


 					      }
 					 }
//
               // }
				else{
					?> <h4> The ordernum is not in  BLOODREQUEST </h4>  <?php ;

				}

			 }




?>


	</body>
</html>
