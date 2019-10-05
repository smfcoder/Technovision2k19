<?php
    session_start();
    $email_id=$_SESSION['email'];
    if(!isset($_SESSION['email']))
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

  <title>Home | User Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    
    <?php
        include("conn.php");
        $sql_u="SELECT * from students Where email='$email_id';";
        $e_sql_u=mysqli_query($sql,$sql_u);
        $row=mysqli_fetch_array($e_sql_u);
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="profile.php">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Profile</div>
                       <?php
                            include('conn.php');
                            $sell="SELECT * FROM students WHERE email='$email_id';";
                            $e_sell=mysqli_query($sql,$sell);
                            $rowl=mysqli_fetch_array($e_sell);
                            $numl=mysqli_num_rows($e_sell);
                            if($numl>0)
                            {
                                if($rowl['profilestat']==0)
                                {
                      ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Incomplete</div>
                      <?php
                                }
                                else
                                {
                        ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Complete</div>
                    <?php
                                
                                }
                            }
                    ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="payment.php">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Payment</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="paper_submission.php">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Paper</div>
                      <?php
                            include('conn.php');
                            $sel="SELECT * FROM files WHERE email='$email_id';";
                            $e_sel=mysqli_query($sql,$sel);
                            $row=mysqli_fetch_array($e_sel);
                            $num=mysqli_num_rows($e_sel);
                            if($num>0)
                            {
                                if($row['app_g']==0)
                                {
                      ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">UnApproved</div>
                      <?php
                                }
                                else
                                {
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Approved</div>
                    <?php
                                
                                }
                            }
                            else{
                    ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Incompleted</div>
                    <?php
                    
                            }
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div></a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="idea_submission.php">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Idea Submission </div>
                      <?php
                            include('conn.php');
                            $s="SELECT * FROM idea WHERE email='$email_id';";
                            $e_s=mysqli_query($sql,$s);
                            $r=mysqli_fetch_array($e_s);
                            $nu=mysqli_num_rows($e_s);
                            if($nu>0)
                            {
                                if($r['app_i']==0)
                                {
                      ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">UnApproved</div>
                      <?php
                                }
                                else
                                {
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Approved</div>
                    <?php
                                
                                }
                            }
                            else{
                    ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Incompleted</div>
                    <?php
                    
                            }
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>

            
        <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="rules.php">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rules and Guidelines</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div></a>
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
