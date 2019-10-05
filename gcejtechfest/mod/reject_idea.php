<?php  
	include("conn.php");
	$id = $_GET['r_id'];
	$query = "SELECT * FROM idea WHERE id ='$id'";
	if(mysqli_query($sql, $query))  
	{
	    $count=1;
	    $updateQuery = "UPDATE idea SET rej_i=$count WHERE id=$id";
	    mysqli_query($sql, $updateQuery);
	}  
 ?>