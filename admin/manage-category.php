<?php




	session_start();

if($_SESSION['id']==null){
	header('Location: index.php');
}

	require_once "../vendor/autoload.php";

	use App\classes\Category;

	$login = new App\classes\Login();

	if(isset($_GET['logout'])){

		$login->adminLogout();
	}



	$allcategorys= Category::allManageCategory();


	if(isset($_GET['delete'])){

		$id =$_GET['id'];

		Category::categoryDelete($id);
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

			<div class="col-sm-10 mx-auto">

				<div class="card">


					<div class="card-body">


							<table class="table table-dark">
							  <thead>
							    <tr>
							      <th scope="col">SI NO</th>
							      <th scope="col">Category Name</th>
							      <th scope="col">Category Description</th>
							      <th scope="col">Publication Status</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>


							  <?php while($allcategory = mysqli_fetch_assoc($allcategorys)) {?>
							    <tr>
							      <th scope="row"><?php echo $allcategory['id'];?></th>
							      <td><?php echo $allcategory['category_name'];?></td>
							      <td><?php echo $allcategory['category_description'];?></td>
							      <td><?php echo $allcategory['status'];?></td>
							      <td>
							      	
							     

							      	<a href="category_edit.php?id=<?php echo $allcategory['id']?>">Edit</a>
				                    <a href="?delete=true & id=<?php echo $allcategory['id']?>" onclick="return confirm('are you sure you want to delete it!!');">Delete</a>
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