<?php
require_once('accounts/settings.php');
?>
<?php 
    include('conn.php');
    session_start();
    if(isset($_SESSION['email'])) {
        unset($_SESSION['email']);
    }
    if(isset($_POST['submit']))
    {
            $username=$_POST['email'];
            $pass=$_POST['password'];
            $sel="SELECT * FROM students WHERE email='$username' AND pass='$pass';";
            $e_sel=mysqli_query($sql,$sel);
            $row=mysqli_num_rows($e_sel);
            if($username=="")
            {
                echo '<script>alert("Please enter all the details");</script>';
            }
            if($pass=="")
            {
                echo '<script>alert("Please enter all the details");</script>';
            }
            if($row==0)
            {
                    $_SESSION['email']="fail";
            }
            else
            {
                $_SESSION['email']=$username;
                header('Location:index.php');
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

  <title>Student - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="p-3 mb-2 bg-light text-dark">
    <?php
            if(isset($_SESSION['email']))
            {
                if($_SESSION['email']=='fail')
                {
                    echo '<script>alert("Email or Password incorrect")</script>';
                    unset($_SESSION['email']);
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
                    <h1 class="h4 text-gray-900 mb-4">Welcome ! ! !</h1>
                  </div>
                  <form class="user" action="login.php" method="POST">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    
                    <div class="row justify-content-center">
                    <div class="col-lg-8">
                    <button name="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    <a href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    </div>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                  <hr>
                  <div class="col-lg-12">
                   <div class="row justify-content-center">
                    
                    <a href="../index.php" class="btn btn-success" style="border-radius:50px;">
                      Back(Technovision 2K19)
                    </a>
                    </div>
                    
                    </div>
                  </div>
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
