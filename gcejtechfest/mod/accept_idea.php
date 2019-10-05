<?php  
	include("conn.php");
	$id = $_GET['a_id'];
	$query = "SELECT * FROM idea WHERE id ='$id'";
	if(mysqli_query($sql, $query))  
	{
	    $count=1;
	    $updateQuery = "UPDATE idea SET app_i=$count WHERE id=$id";
	    mysqli_query($sql, $updateQuery);
	}  
 ?>