<?php
    session_start();
    if(!isset($_SESSION['otp']))
    {
        header('location:forgot-password.php');
        exit();
    }
    if(!isset($_SESSION['newpass']))
    {
        header('location:forgot-password.php');
        exit();
    }
    
?>
<?php 
    include('conn.php');
    session_start();
    $email=$_SESSION['otp'];
    if(isset($_SESSION['email'])) {
        unset($_SESSION['email']);
    }
    if(isset($_SESSION['reg'])) {
        unset($_SESSION['reg']);
    }
    if(isset($_POST['submit']))
    {
            $email=$_POST['email'];
            
            $pass=$_POST['pass'];
            $repass=$_POST['repass'];
            if($pass==$repass)
            {
                $sel="SELECT * FROM students WHERE email='$email';";
                $e_sel=mysqli_query($sql,$sel);
                
                $updateQuery = "UPDATE students SET pass='$pass' WHERE email='$email';";
                if(mysqli_query($sql, $updateQuery))
                {
                    $_SESSION['email']=$email;
                    header('Location:index.php');
                }
                else
                {
                    $_SESSION['reg']="fail";
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
                if($_SESSION['reg']=='fail')
                {
                    echo '<script>alert("Fail");</script>';
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
                <h1 class="h4 text-gray-900 mb-4">Enter New Pass!</h1>
              </div>
              <form class="user" action="newpass.php" method="post" >
               
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="pass"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="repass" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                  </div>
                </div>
                <input name="email" value="<?php echo $email;?>" hidden>
                <div class="row justify-content-center">
                  <div class="col-lg-6">
                <button name="submit" class="btn btn-primary btn-user btn-block">
                  Submit
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
