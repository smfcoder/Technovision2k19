<!DOCTYPE html>


<body>
    <?php
    include('header.php');
?>
<div class="container" style="margin-top:130px;margin-bottom:50px;">

    <div class="row justify-content-center">
        <h2><u> Reviewers </u></h2>
    </div>

<div class="table-responsive">
<table class="table table-hover">
<style>
    thead,tbody,th,tr,td{
        border:1px solid black;
        text-align:center;
    }
</style>	
	<thead>
		<tr style="background-color:#e7e6ff;">
			<th>Name</th>
			<th>Group</th>
			<th>Branch</th>
			<th>Institute</th>
		</tr>
		<tr>
		    <th colspan="4" style="background-color:#b5f5ff">Group - A</th>
		</tr>
	</thead> 
	<tbody>
	    <?php
                           
                            include("conn.php"); 
                            $output = '';
                            $gp="GROUP-A";
                            $query = "SELECT * FROM reviewers Where grp='$gp';";  
                            $result = mysqli_query($sql, $query);
                            $rows = mysqli_num_rows($result);
                            
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    
                                   
        ?>
                    		<tr>
                    			<td><?php echo $row["name"]; ?></td>
                    			<td><?php echo $row["grp"]; ?></td>
                    			<td><?php echo $row["branch"]; ?></td>
                                <td><?php echo $row["inst"]; ?></td>
                    		</tr>
		
		<?php
                                }
                            }
		?>
	    <tr>
	        <th colspan="4" style="background-color:#b5c3ff">Group - B</th>
	    </tr>
	    
	    
	    <?php
                           
                            include("conn.php"); 
                            $output = '';
                            $gpb="GROUP-B";
                            $queryb = "SELECT * FROM reviewers Where grp='$gpb';";
                            $resultb = mysqli_query($sql, $queryb);
                            $rowsb = mysqli_num_rows($resultb);
                            
                            if($rowsb > 0)  
                            {  
                                while($rowb = mysqli_fetch_array($resultb))  
                                {  
                                    
                                   
        ?>
                    		<tr>
                    			<td><?php echo $rowb["name"]; ?></td>
                    			<td><?php echo $rowb["grp"]; ?></td>
                    			<td><?php echo $rowb["branch"]; ?></td>
                                <td><?php echo $rowb["inst"]; ?></td>
                    		</tr>
		
		<?php
                                }
                            }
		?>
		<tr>
	        <th colspan="4" style="background-color:#fddbff">Group - C</th>
	    </tr>
	    <?php
                           
                            include("conn.php"); 
                            $output = '';
                            $gpc="GROUP-C";
                            $queryc = "SELECT * FROM reviewers Where grp='$gpc';";
                            $resultc = mysqli_query($sql, $queryc);
                            $rowsc = mysqli_num_rows($resultc);
                            
                            if($rowsc > 0)  
                            {  
                                while($rowc = mysqli_fetch_array($resultc))  
                                {  
                                    
                                   
        ?>
                    		<tr>
                    			<td><?php echo $rowc["name"]; ?></td>
                    			<td><?php echo $rowc["grp"]; ?></td>
                    			<td><?php echo $rowc["branch"]; ?></td>
                                <td><?php echo $rowc["inst"]; ?></td>
                    		</tr>
		
		<?php
                                }
                            }
		?>
        <tr>
	        <th colspan="4" style="background-color:#fddbff">Innovative Idea Competition</th>
	    </tr>
	    <?php
                           
                            include("conn.php"); 
                            $output = '';
                            $gpi="idea";
                            $queryi = "SELECT * FROM reviewers Where grp='$gpi';";
                            $resulti = mysqli_query($sql, $queryi);
                            $rowsi = mysqli_num_rows($resulti);
                            
                            if($rowsi > 0)  
                            {  
                                while($rowi = mysqli_fetch_array($resulti))  
                                {  
                                    
                                   
        ?>
                    		<tr>
                    			<td><?php echo $rowi["name"]; ?></td>
                    			<td><?php echo $rowi["grp"]; ?></td>
                    			<td><?php echo $rowi["branch"]; ?></td>
                                <td><?php echo $rowi["inst"]; ?></td>
                    		</tr>
		
		<?php
                                }
                            }
		?>

	</tbody>
</table>
</div>
</div>
<?php
    include('footer.php');
?>
</body>
</html>