<?php

namespace App\classes;

use App\classes\Database;


class Category
{

	public function addCategory($data){

		$sql="INSERT INTO category(category_name,category_description,status) VALUES('$data[category_name]','$data[category_description]','$data[status]')";

		if(mysqli_query(Database::dbConnection(),$sql)){

			header('Location: manage-category.php');
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));
		}


	}



	public function allManageCategory()
	{

		$sql ="SELECT * FROM category";

		if(mysqli_query(Database::dbConnection(),$sql)){

			$getresult=mysqli_query(Database::dbConnection(),$sql);

			return $getresult;
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));


		}
	}



	public function categoryInfoId($id)
	{
		$sql="SELECT * FROM category WHERE id='$id'";

		if(mysqli_query(Database::dbConnection(),$sql)){
			$queryresult= mysqli_query(Database::dbConnection(),$sql);
			return $queryresult;
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));


		}

	}


	public function UpdateCategory($data){

				$sql ="UPDATE category SET category_name='$data[category_name]',category_description='$data[category_description]',status='$data[status]' WHERE id='$data[id]'";

		if(mysqli_query(Database::dbConnection(),$sql)){


			header('Location: manage-category.php');
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));


		}
	}


	public function categoryDelete($id)
	{
		$sql=" DELETE FROM category WHERE id='$id'";

		if(mysqli_query(Database::dbConnection(),$sql)){
			header('Location: manage-category.php');
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));


		}
	}
}





?>