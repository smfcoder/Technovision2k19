<?php  
	include("conn.php");
	$id = $_GET['a_id'];
	$query = "SELECT * FROM files WHERE id ='$id'";
	if(mysqli_query($sql, $query))  
	{
	    $count=1;
	    $updateQuery = "UPDATE files SET app_g=$count WHERE id=$id";
	    mysqli_query($sql, $updateQuery);
	}  
 ?>