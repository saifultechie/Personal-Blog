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


	$add_blog = new App\classes\Blog();

	$queryResult=$add_blog->getAllPublicCategoryInfo();


	$message="";



	if(isset($_POST['btn'])){

		$message =$add_blog->addBlogInfo($_POST);

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
	<h1><?php echo $message;?></h1>>


	<div class="container" style="margin-top:10px;">

		<div class="row">

			<div class="col-sm-10 mx-auto">

				<div class="card">


					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
							    <div class="col-sm-9">
							      <select name="category_id" class="form-control">
							      	
							      	<?php while( $category = mysqli_fetch_assoc($queryResult)) { ?>
							      	<option value="$category['id']"><?php echo $category['category_name'] ;?></option>

							      	<?php } ?>
							      	
							      </select>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-3 col-form-label">Blog title</label>
							    <div class="col-sm-9">
							      <input type="text" name="blog_title" class="form-control">
							    </div>
							  </div>

							    <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-3 col-form-label">short description</label>
							    <div class="col-sm-9">
							      <textarea class="form-control" name="short_description"></textarea>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-3 col-form-label">Long description</label>
							    <div class="col-sm-9">
							      <textarea class="form-control textarea" name="long_description" rows="10"></textarea>
							    </div>
							  </div>

							   <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
							    <div class="col-sm-9">
							      <input type="file" name="blog_image" accept="image/*">
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
							      <button type="submit" name="btn" class="btn btn-primary btn-block">Save Blog</button>
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

	<script src="../assets/tinymce/js/tinymce/tinymce.min.js"></script>

	 <script>tinymce.init({selector:'.textarea'});</script>
	<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>