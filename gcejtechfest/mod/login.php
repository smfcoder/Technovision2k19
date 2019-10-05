<?php 
    include('conn.php');
    session_start();
    if(isset($_SESSION['username'])) {
        unset($_SESSION['username']);
    }
    if(isset($_POST['submit']))
    {
            include('conn.php');
            $username=$_POST['username'];
            $pass=$_POST['password'];
            $sel="SELECT * FROM moderator WHERE user='$username' AND pass='$pass';";
            $e_sel=mysqli_query($sql,$sel);
            $row=mysqli_fetch_array($e_sel);
            if($row['user']==$username && $row['pass']==$pass)
            {
                    $_SESSION['username']=$username;
                    header('Location:index.php');
            }
            else
            {
                $_SESSION['username']="fail";
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

  <title>Mod - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="p-3 mb-2 bg-light text-dark">
    <?php
            if(isset($_SESSION['username']))
            {
                if($_SESSION['username']=='fail')
                {
                    echo '<script>alert("Email or Password incorrect")</script>';
                    unset($_SESSION['username']);
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
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="login.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
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
                    
                    </div>
                    </div>
                  </form>
            
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
