<?php

namespace App\classes;

use App\classes\Database;


class Blog
{



	public function addBlogInfo($data){






	$directory = "../assets/images/";

	$imageUrl =$directory.$_FILES['blog_image']['name'];



	$filetype = pathinfo($_FILES['blog_image']['name'],PATHINFO_EXTENSION);

	$check =getimagesize($_FILES['blog_image']['tmp_name']);

	if($check){

		if(file_exists($imageUrl)){
			die(" this file already use please choose the another image");
		}else{

			if($_FILES['blog_image']['size']>5000000){
				die("this image file is too large");
			}else{

				if($filetype!="PNG" && $filetype!="JPG"){
					die("please select the jpg or png image");

				}else{
						 move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
                        $sql="INSERT INTO blog (category_id, blog_title, short_description, long_description, blog_image, status) VALUES ('$data[category_id]','$data[blog_title]','$data[short_description]','$data[long_description]','$imageUrl','$data[status]')";
                        if(mysqli_query(Database::dbConnection(),$sql)){
                            $message="Insert Successfully";
                            return $message;
                        } else{
                            die("Query problem".mysqli_error(Database::dbConnection()));
                        }

				}


			}
		}

	}else{
		die("please enter the valid image file?");
	}


			
}


	public function allBlogManage()
	{

		$sql ="SELECT * FROM blogs ";

		if(mysqli_query(Database::dbConnection(),$sql)){
			$resultAllBlog= mysqli_query(Database::dbConnection(),$sql);
			return  $resultAllBlog;
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));
		}

	}


	public function blogIdInfo($id)

	{

		$sql = "SELECT * FROM blogs WHERE id ='$id'";

		if(mysqli_query(Database::dbConnection(),$sql))
		{
			$getblogid= mysqli_query(Database::dbConnection(),$sql);

			return $getblogid;
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));
		}
	}




	public function updateBlogInfo($data)
	{

		$sql = "UPDATE blogs SET category_name='$data[category_name]',blog_title='$data[blog_title]' ,short_description='$data[short_description]',long_description='$data[long_description]',blog_image='$data[blog_image]', status='$data[status]' WHERE id='$data[id]' ";

		if(mysqli_query(Database::dbConnection(),$sql))
		{
			header('Location: manage_blog.php');
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));
		}


	}

	public function BlogDelete($id)
	{

		$sql=" DELETE FROM blogs WHERE id='$id'";

		if(mysqli_query(Database::dbConnection(),$sql)){
			header('Location: manage_blog.php');
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));


		}
	}

	public function getAllPublicCategoryInfo(){

		$sql= "SELECT * FROM category WHERE status=1";

		if(mysqli_query(Database::dbConnection(),$sql)){
			
			$queryResult = mysqli_query(Database::dbConnection(),$sql);

			return $queryResult;
		}else{

			die("query problem".mysqli_error(Database::dbConnection()));


		}
	}

}







?>