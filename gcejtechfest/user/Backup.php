         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            My Upload</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    
                    <th width="25%">File Name</th>
                    <th width="25%">Title</th>
                    <th width="15%">Group</th>
                    <th width="15%">Edit</th>
                    <th width="15%">Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    
                    <th width="25%">File Name</th>
                    <th width="25%">Title</th>
                    <th width="15%">Group</th>
                    <th width="15%">Edit</th>
                    <th width="15%">Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                        <?php
                           
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM files ORDER BY id ASC";  
                            $result = mysqli_query($sql, $query);
                            $rows = mysqli_num_rows($result);
                            
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    
                                    if($email_id== $row['email'])
                                    {
                                    ?>
                                    <tr>  
                                    
                                    <td><?php echo $row["filename"]; ?></td> 
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><?php echo $row["grp"]; ?></td>
                                    <td><a href="edit_paper_submission.php?id=<?php echo $row['id'];?>"  class="btn btn-xs btn-primary">edit</a></td>
                                    <td><a class="btn btn-danger" Onclick="return ConfirmDelete()" href="del_paper.php?email=<?php echo $row['email'];?>&id=<?php echo $row['id'];?>">X</a></td>  
                                   <script>
                                       function ConfirmDelete() {
                                          return confirm("Are you sure you want to delete?");
                                        }
                                   </script>
                                    </tr>  
                                <?php
                                    }
                                }  
                            }  
                        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          
        </div>