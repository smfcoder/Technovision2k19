<?php
    session_start();
    $email_id=$_SESSION['email'];
    if(!isset($_SESSION['email']))
    {
        header('location:login.php');
        exit();
    }
?>
<?php
        include("conn.php");
        $sql_u="SELECT * from students Where email='$email_id';";
        $e_sql_u=mysqli_query($sql,$sql_u);
        $row=mysqli_fetch_array($e_sql_u);
        if($row['profilestat']==0)
        {
            $_SESSION['paper']='fail';
            header('location:profile.php');
        }
        include('files_idea.php');
        if($files['status_i']==1)
        {
            header("location:idea_submitted.php");
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

  <title>Idea Submission</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <?php
            if(isset($_SESSION['del_i']))
            {
                if($_SESSION['del_i']=='success')
                {
                    echo "<script>alert('File Deleted successfully');</script>";
                    unset($_SESSION['del_i']);
                }
            }
    ?>
    
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
            <h1 class="h3 mb-0 text-gray-800">Idea Submission</h1>
          
        
            
            
            
          </div>
         
          <form action="idea_submission.php" method="post" enctype="multipart/form-data" >
                <h3>Upload File</h3>
                  <div class="text-center">
                  <input type="file" name="myfile"></div><br> <br>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Group</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Idea" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Paper Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary" type="submit" name="save">upload</button></div>
                </form>
                <br>
                <br>
      
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

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
