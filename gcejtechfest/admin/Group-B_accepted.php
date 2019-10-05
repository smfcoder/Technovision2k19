<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:login.php');
        exit();
    }
    include("file_gp.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Group-B</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    
    
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
            <h1 class="h3 mb-0 text-gray-800">Group-B Accepted Paper</h1>
          </div>
            
            <a class="btn btn-primary" href="Group-B_rejected.php">Reject Paper</a>
            <a class="btn btn-primary" href="Group-B.php">Group-B All Paper</a>
          
                  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Accepted Paper</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="25%">Name</th>
                    <th width="25%">Email</th>
                    <th width="25%">File Name</th>
                    <th width="25%">Title</th>
                    <th width="15%">Download</th>
                  </tr>
                </thead>
                <tbody>
                  
                        <?php
                            include("conn.php");
                            $output = '';
                            $grp="GROUP-B";
                            $app_g=1;
                            $query = "SELECT * FROM files Where grp='$grp' AND app_g='$app_g' ;";  
                            $result = mysqli_query($sql, $query);
                            $rows = mysqli_num_rows($result);
                            
                            if($rows > 0)  
                            {  
                                while($row = mysqli_fetch_array($result))  
                                {
                                    $email_id=$row['email'];
                                    $quer = "SELECT * FROM students where email='$email_id';";
                                    $resul = mysqli_query($sql, $quer);
                                    $ro = mysqli_fetch_array($resul);
                                    
                                    if($row['rej_g']==0){
                                    ?>
                                        <tr> 
                                        <td><?php echo $ro["name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["filename"]; ?></td> 
                                        <td><?php echo $row["title"]; ?></td>
                                        <td><a href="Group-B_accepted.php?file_id=<?php echo $row['id'] ?>">download</a></td>
                                        <script>
                                            function ConfirmDelete() 
                                            {
                                               return confirm("Are you sure you want to reject ?");
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
        <script>

    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
        
        
    }
    
}
</script>
        <center style="margin:30px;"> <a type="button" onclick="exportTableToExcel('dataTable', 'Group-B')">Export Table Data To Excel File</a></center>
     
      
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

 
<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>


</body>

</html>
