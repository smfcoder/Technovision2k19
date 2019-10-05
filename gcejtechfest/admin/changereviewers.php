<?php
    session_start();
    $email_id=$_SESSION['username'];
    if(!isset($_SESSION['username']))
    {
        header('location:login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home | Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    
   <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
        include('main/side.php');
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
            include('main/nav.php');
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Reviewers List</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            
          </div>
             <?php
            include("conn.php");
            $error = '';
            if(isset($_POST['submit']))
            {
                $name= $_POST['name'];
                $branch= $_POST['branch'];
                $grp=$_POST['group'];
                $clgname= $_POST['clgname'];
                $sel = "SELECT * FROM reviewer;";
                $e_sel=mysqli_query($sql,$sel);
                $upd = "INSERT INTO reviewers (name,branch,inst,grp) VALUES('$name','$branch','$clgname','$grp');";
                $e_upd=mysqli_query($sql,$upd);
            }


?>
<!DOCTYPE html>
<html lang="en">

 <?php
        include('main/head.php');
  ?>


<body id="page-top">
 
 
   
    <form method="POST" action="changereviewers.php" name="myform" id="myform">

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" id="name" name="name"  class="form-control" placeholder="Name" required>
            </div>
        </div>
        
        <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Group</label>
                    <div class="col-sm-10">
                      <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="group" required>
                        <option value="">Choose Group</option>
                                <option value="GROUP-A">GROUP A</option>
                                <option value="GROUP-B">GROUP B</option>
                                <option value="GROUP-C">GROUP C</option>
                                <option value="idea">Idea</option>
                      </select>
                    </div>
                </div>
       

      <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Branch</label>
            <div class="col-sm-10">
              <input type="text" name="branch" class="form-control" placeholder="Branch" required>
            </div>
        </div>
       
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">College Name</label>
            <div class="col-sm-10">
              <input type="text" name="clgname" class="form-control" placeholder="College Name" required>
            </div>
        </div>
        
        

        
       <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>

    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            My Upload</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="25%">Name</th>
                    <th width="25%">Branch</th>
                    <th width="15%">Group</th>
                    <th width="25%">College Name</th>
                    <th width="15%">Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th width="25%">Name</th>
                    <th width="25%">Branch</th>
                    <th width="15%">Group</th>
                    <th width="25%">College Name</th>
                    <th width="15%">Delete</th>                  
                  </tr>
                </tfoot>
                <tbody>
                  
                        <?php
                           
                            include("conn.php"); 
                            $output = '';  
                            $query = "SELECT * FROM reviewers ORDER BY id ASC";  
                            $result = mysqli_query($sql, $query);
                            $rows = mysqli_num_rows($result);
                            
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    
                                   
                                    ?>
                                    <tr>  
                                    
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["branch"]; ?></td>
                                    <td><?php echo $row["grp"]; ?></td>
                                    <td><?php echo $row["inst"]; ?></td>
                                    
                                    <td><a class="btn btn-danger" Onclick="return ConfirmDelete()" href="del_re.php?id=<?php echo $row['id'];?>">X</a></td>  
                                   <script>
                                       function ConfirmDelete() {
                                          return confirm("Are you sure you want to delete?");
                                        }
                                   </script>
                                    </tr>  
                                <?php
                                    
                                }  
                            }  
                        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          
        </div>    
        
<hr style="background-color:black;">
<h1 class="h3 mb-0 text-gray-800">Developers</h1>
<hr style="background-color:black;">

<div class="row">
    <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="img/omprasad.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Omprasad Hedde(LY COMP)</h5>
      <p class="card-text">Co-ordinator</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="img/shreyas1.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Shreyas Fegade (TY COMP)</h5>
      <p class="card-text">Co-coordinator/Developer</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="img/bhavesh.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Bhavesh Wani (TY COMP)</h5>
      <p class="card-text">Developer</p>
    </div>
  </div>
</div>
</div>
      <!-- Footer -->
      <?php
            include('main/footer.php');
        ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
