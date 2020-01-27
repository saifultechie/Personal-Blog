<?php




	session_start();

if($_SESSION['id']==null){
	header('Location: index.php');
}

	require_once "../vendor/autoload.php";

	use App\classes\Category;
	use App\classes\Blog;

	$login = new App\classes\Login();

	if(isset($_GET['logout'])){

		$login->adminLogout();
	}



	//$allcategorys= Category::allManageCategory();

	$allblogs =Blog::allBlogManage();


	if(isset($_GET['delete'])){

		$id =$_GET['id'];

		Blog::BlogDelete($id);
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


	<div class="container" style="margin-top:10px;">

		<div class="row">

			<div class="col-sm-12 mx-auto">

				<div class="card">


					<div class="card-body">


							<table class="table table-dark">
							  <thead>
							    <tr>
							      <th scope="col">SI NO</th>
							      <th scope="col">Category Name</th>
							      <th scope="col">Blog Title</th>
							      <th scope="col">Short Description</th>
							      <th scope="col">Long Description</th>
							      <th scope="col">Blog Image</th>
							      <th scope="col">Publication Status</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>


							  <?php while($allblog = mysqli_fetch_assoc($allblogs)) {?>
							    <tr>
							      <th scope="row"><?php echo $allblog['id'];?></th>
							      <td><?php echo $allblog['category_name'];?></td>
							      <td><?php echo $allblog['blog_title'];?></td>
							      <td><?php echo $allblog['short_description'];?></td>
							      <td><?php echo $allblog['long_description'];?></td>
							      <td><?php echo $allblog['blog_image'];?></td>
							      <td><?php echo $allblog['status'];?></td>
							      <td>
							      	
							     

							      	<a href="blog_edit.php?id=<?php echo $allblog['id']?>">Edit</a>
				                    <a href="?delete=true & id=<?php echo $allblog['id']?>" onclick="return confirm('are you sure you want to delete it!!');">Delete</a>
							      </td>
							    </tr>

							    <?php }?>
							   
							  </tbody>
						</table>
						
						
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