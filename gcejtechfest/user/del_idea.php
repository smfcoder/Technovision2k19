<?php  
	include("conn.php");
	$email_id = $_GET['email'];
	$id = $_GET['id'];
	$query = "DELETE FROM idea WHERE id ='$id'";
	session_start();
	if(mysqli_query($sql, $query))  
	{
        $e=mysqli_query($sql,$q);
		$_SESSION['del_i']='success';
		header('Location:idea_submission.php');
	}  
 ?>