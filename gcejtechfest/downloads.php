<?php
    include('file.php');
?>
<!DOCTYPE html>

<body>
<?php
    include('header.php');
?>
<div class="container" style="margin-top:130px;margin-bottom:50px;">

    <div class="row justify-content-center">
        <h2><u>Download Section</u></h2>
    </div>

<div class="table-responsive">
<table class="table table-hover">
<style>
    thead,tbody,th,tr,td{
        border:1px solid black;
    }
</style>	
	<thead>
		<tr>
			<th> Document Name </th>
			<th> File Download </th>
		</tr>
	</thead> 
	<tbody>
	    <?php
                            include("conn.php");
                            $output = '';
                            $query = "SELECT * FROM downloads;";  
                            $result = mysqli_query($sql, $query);
                            $rows = mysqli_num_rows($result);
                            
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {
                                    
                                    ?>
                		<tr>
                			<td> <?php echo $row['name']; ?></td>
                			<td><a href="downloads.php?file_id=<?php echo $row['id'] ?>">download</a></td>
                		</tr> 
		<?php
                                   
                                }
                            }  
                        ?>

	</tbody>
</table>
</div>
</div>
<div style="padding-top:100px;">
    
</div>

<?php
    include('footer.php');
?>
</body>
</html>