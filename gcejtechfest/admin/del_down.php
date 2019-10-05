<?php  
	include("conn.php");
	$id = $_GET['id'];
	$query = "SELECT * FROM downloads WHERE id ='$id'";
	if(mysqli_query($sql, $query))  
	{
	    $updateQuery = "DELETE FROM downloads WHERE id=$id";
	    mysqli_query($sql, $updateQuery);
	    header('Location:changedownloads.php');
	}  
 ?>