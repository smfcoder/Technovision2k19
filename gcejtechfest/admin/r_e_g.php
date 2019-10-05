<?php 
    include('conn.php');
    session_start();
    if(isset($_SESSION['username'])) {
        unset($_SESSION['username']);
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
                $ss="SELECT * FROM supper WHERE email='$email';";
                $ess=mysqli_query($sql,$ss);
                $x=mysqli_num_rows($ess);
                if($x>0)
                {
                        $ent="INSERT INTO admin (user,pass) VALUES ('$name','$pass');";
                        $e_ent=mysqli_query($sql,$ent);
                        if($e_ent)
                        {
                            $_SESSION['reg']="success";
                            $_SESSION['username']=$name;
                        }
                        else
                        {
                            $_SESSION['reg']="fail";
                        }
                    
                }
                else
                {
                    $_SESSION['reg']="dont";
                }
            }
            else
            {
                    $_SESSION['reg']="invalid";
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

  <title>Admin - Registration</title>

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
                else if($_SESSION['reg']=='dont')
                {
                    echo '<script>alert(" Dont try ");</script>';
                    unset($_SESSION['reg']);
                    
                }
                else
                {
                    echo '<script>alert(" Password and Re-Password Not match ");</script>';
                    unset($_SESSION['reg']);
                    
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
                <h1 class="h4 text-gray-900 mb-4"></h1>
              </div>
              <form class="user" action="r_e_g.php" method="post" >
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="Username">
                  </div>
                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Enter supper mail">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="pass"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="repass" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-lg-6">
                <button name="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                </form>
              <hr>
             
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
