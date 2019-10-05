<?php  
	include("conn.php");
	$id = $_GET['id'];
	$query = "SELECT * FROM reviewers WHERE id ='$id'";
	if(mysqli_query($sql, $query))  
	{
	    $updateQuery = "DELETE FROM reviewers WHERE id=$id";
	    mysqli_query($sql, $updateQuery);
	    header('Location:changereviewers.php');
	}  
 ?>