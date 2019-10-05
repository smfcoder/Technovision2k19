<?php  
	include("conn.php");
	$email_id = $_GET['email'];
	$id = $_GET['id'];
	$query = "DELETE FROM files WHERE id ='$id'";
	session_start();
	if(mysqli_query($sql, $query))  
	{
        $e=mysqli_query($sql,$q);
		$_SESSION['del_p']='success';
		header('Location:paper_submission.php');
	}  
 ?>