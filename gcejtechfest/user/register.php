<?php
require_once('accounts/settings.php');
?>
<?php 
    include('conn.php');
    session_start();
    if(isset($_SESSION['email'])) {
        unset($_SESSION['email']);
    }
    if(isset($_SESSION['reg'])) {
        unset($_SESSION['reg']);
    }
    if(isset($_POST['submit']))
    {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $repass=$_POST['repass'];
            if($pass==$repass)
            {
                $sel="SELECT * FROM students WHERE email='$email';";
                $e_sel=mysqli_query($sql,$sel);
                $row=mysqli_num_rows($e_sel);
                if($row==0)
                {
                        $ent="INSERT INTO students (name,email,pass) VALUES ('$name','$email','$pass');";
                        $e_ent=mysqli_query($sql,$ent);
                        if($e_ent)
                        {
                            $_SESSION['reg']="success";
                            $_SESSION['email']=$email;
                        }
                        else
                        {
                            $_SESSION['reg']="fail";
                        }
                }
                else
                {
                    $_SESSION['reg']="already";
                }
            }
            else
            {
                    $_SESSION['passw']="invalid";
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

  <title>Student - Registration</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
 <?php
            if(isset($_SESSION['reg']))
            {
                if($_SESSION['reg']=='success')
                {
                    header('location:index.php');
                }
                else if($_SESSION['reg']=='fail')
                {
                    echo '<script>alert("Registration Fail");</script>';
                    unset($_SESSION['reg']);
                }
                else
                {
                    echo '<script>alert("Already Register");</script>';
                    unset($_SESSION['reg']);
                    
                }
            }
            if(isset($_SESSION['passw']))
            {
                if($_SESSION['passw']=='invalid')
                {
                    echo '<script>alert("Password and Re-Password Incorrect");</script>';
                    unset($_SESSION['passw']);
                    
                }
            }
        
    ?>

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
         <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="register.php" method="post" >
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="pass"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="repass" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-lg-6">
                <button name="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                <a href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
              </form>
              <hr>
             
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
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
  
   

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
