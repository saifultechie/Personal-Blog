<?php 

require_once "../vendor/autoload.php";

$login = new App\classes\Login();

$message="";

session_start();


if(isset($_SESSION['id'])){

	header('Location: dashboard.php');
}

if(isset($_POST['btn'])){

	$message=$login->adminLoginCheck($_POST);




}




?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>admin login</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">


</head>
<body>

	<div class="container" style="margin-top:200px;">

		<div class="row">

			<div class="col-sm-6 mx-auto">

			    <h3><?php echo $message;?></h3>

				<div class="card">


					<div class="card-body">

						<form action="" method="post">
					  <div class="form-group row">
					    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
					    <div class="col-sm-9">
					      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
					    </div>
					  </div>
			
					  <div class="form-group row">
					    <div class="col-sm-12">
					      <button type="submit" name="btn" class="btn btn-primary btn-block">Sign in</button>
					    </div>
					  </div>
               </form>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>