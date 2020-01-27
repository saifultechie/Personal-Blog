<?php


	session_start();

	use App\classes\Blog;

if($_SESSION['id']==null){
	header('Location: index.php');
}

	require_once "../vendor/autoload.php";

	$login = new App\classes\Login();

	if(isset($_GET['logout'])){

		$login->adminLogout();
	}


	$add_blog = new App\classes\Blog();

	$message="";

	$getid =$_GET['id'];

	$blogIdInfo = Blog::blogIdInfo($getid);

	$blogIdInfo =mysqli_fetch_assoc($blogIdInfo);



	if(isset($_POST['btn'])){

		$message =$add_blog->updateBlogInfo($_POST);

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

			<div class="col-sm-8 mx-auto">

				<div class="card">


					<div class="card-body">

						<form action="" method="post">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
							    <div class="col-sm-9">
							      <select name="category_name" class="form-control">
							      	
							      	<option>====category Name====</option>
							      	<option value="1">Category One</option>
							      	<option value="2">Category Two</option>
							      </select>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-3 col-form-label">Blog title</label>
							    <div class="col-sm-9">
							      <input type="text" name="blog_title" class="form-control" value="<?php echo $blogIdInfo['blog_title']?>">
							      <input type="hidden" name="id" class="form-control" value="<?php echo $blogIdInfo['id']?>">
							    </div>
							  </div>

							    <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-3 col-form-label">short description</label>
							    <div class="col-sm-9">
							      <textarea class="form-control" name="short_description"><?php echo $blogIdInfo['short_description']?></textarea>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-3 col-form-label">Long description</label>
							    <div class="col-sm-9">
							      <textarea class="form-control" name="long_description"><?php echo $blogIdInfo['long_description']?></textarea>
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
							      <input type="radio" name="status" <?php echo ($blogIdInfo['status']==1)?'checked':'' ?> value="1">published
							      <input type="radio" name="status" <?php echo ($blogIdInfo['status']==0)?'checked':'' ?> value="0">unpublished
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