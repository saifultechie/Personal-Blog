<?php


	session_start();

if($_SESSION['id']==null){
	header('Location: index.php');
}

	require_once "../vendor/autoload.php";

	$login = new App\classes\Login();

	if(isset($_GET['logout'])){

		$login->adminLogout();
	}

	$message="";



 if(isset($_POST['btn'])){

 	$addcategory = new App\classes\Category();

 	$message =$addcategory->addCategory($_POST);
 }







?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>dashboard</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

		

	<?php include 'include/menu.php';?>

	<h1 style="color:green;"><?php echo $message;?></h1>>


	<div class="container" style="margin-top:10px;">

		<div class="row">

			<div class="col-sm-8 mx-auto">

				<div class="card">


					<div class="card-body">

						<form action="" method="post">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
							    <div class="col-sm-9">
							      <input type="text" class="form-control" name="category_name">
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
							    <div class="col-sm-9">
							      <textarea class="form-control" name="category_description"></textarea>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
							    <div class="col-sm-9">
							      <input type="radio" name="status" value="1">published
							      <input type="radio" name="status" value="0">unpublished
							    </div>
							  </div>
					
							  <div class="form-group row">
							    <div class="col-sm-12">
							      <button type="submit" name="btn" class="btn btn-primary btn-block">Save category</button>
							    </div>
							  </div>
		               </form>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

	<script src="../assets/js/jquery-3.2.1.js"></script>
	<script src="../assets/js/bootstrap.bundle.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>