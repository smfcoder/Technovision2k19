<?php
    session_start();
    if(!isset($_SESSION['otp']))
    {
        header('location:forgot-password.php');
        exit();
    }
?>
<?php 
    include('conn.php');
    session_start();
    
    if(isset($_SESSION['email'])) {
        unset($_SESSION['email']);
    }
    $email=$_SESSION['otp'];
    if(isset($_POST['submit']))
    {
        include('conn.php');
        $otp=$_POST['otp'];
        $email=$_POST['email'];
        $sel="SELECT * FROM students WHERE email='$email';";
        $e_sel=mysqli_query($sql,$sel);
        $row=mysqli_fetch_array($e_sel);
        if($row['otp']==$otp)
        {
            $_SESSION['newpass']="sucess";
            header('Location:newpass.php');
        }
        else
        {
            $_SESSION['con']="fail";   
        }
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

  <title>Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <?php
            if(isset($_SESSION['con']))
            {
                if($_SESSION['con']=='fail')
                {
                    echo '<script>alert("Incorrect Otp")</script>';
                    unset($_SESSION['con']);
                }
            }
            
        
    ?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">OTP</h1>
                  </div>
                  <form class="user" action="otp.php" method="post">
                    <div class="form-group">
                      <input type="text" name="otp" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter OTP..." required>
                    </div>
                    <input name="email" value="<?php echo $email;?>" hidden>
                    <button name="submit" class="btn btn-primary btn-user btn-block">
                      Submit
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
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

</body>

</html>
