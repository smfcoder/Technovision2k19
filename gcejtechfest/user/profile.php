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
            <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
          </div>
          <hr>
            
          <!-- Content Row -->
          <div class="row">

        
          </div>
        <?php
            include("conn.php");
            $error = '';
            if(isset($_POST['submit']))
            {
                $name= $_POST['name'];
                $auth1=$_POST['auth1'];
                $auth2=$_POST['auth2'];
                $auth3=$_POST['auth3'];
                
                $gender= $_POST['gender'];
                $phoneno= $_POST['phoneno'];
                $clgname= $_POST['clgname'];
                $usityname= $_POST['usityname'];
                $pass = $_POST['pass'];
                $email_id=$_POST['email'];
                $state=$_POST['state'];
                $sel = "SELECT * FROM students WHERE email ='$email_id';";
                
                $e_sel=mysqli_query($sql,$sel);
                
                $upd = "UPDATE students SET name='$name',auth1='$auth1',auth2='$auth2',auth3='$auth3',gender='$gender',phoneno='$phoneno',college_name='$clgname',university_name='$usityname',pass='$pass',profilestat='1',state='$state' WHERE email='$email_id';";
                
                $e_upd=mysqli_query($sql,$upd);
                if($e_upd)
                {
                    $_SESSION['update']='success';
                }
                else
                {
                    $_SESSION['update']='failed';
                }
                
                
                
            }


?>
<!DOCTYPE html>
<html lang="en">

 <?php
        include('main/head.php');
  ?>


<body id="page-top">
 <?php

    if(isset($_SESSION['update'])) {
        if($_SESSION['update']=='success')   {
            echo '<script>alert("Profile Update Success")</script>';
            unset($_SESSION['update']);
        }
        else {
            echo '<script>alert("Sorry :(Profile Update Failed)")</script>';
            unset($_SESSION['update']);
        }
    }
    if(isset($_SESSION['paper']))
    {
        if($_SESSION['paper']=='fail')   {
                echo '<script>alert("Please Complete your Profile First ,then you can submit your Paper/Idea")</script>';
                unset($_SESSION['paper']);
        }
    }
?>    
 
    <?php
            include('conn.php');
            $selec="SELECT * FROM students WHERE email='$email_id';";
            $e_selec=mysqli_query($sql,$selec);
            $row=mysqli_fetch_array($e_selec);
    ?>
    <form method="POST" action="profile.php" name="myform" id="myform">

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" id="name" name="name"  class="form-control" placeholder="Name" value="<?php echo $row['name']; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="gender" required>
                <?php
                    if($row['gender']=="")
                    {
                        echo '<option value="">Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="other">Other</option>';
                    }
                    else{
                        echo'<option value="'.$row['gender'].'" >'.$row['gender'].'</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="other">Other</option>';
                    }
                ?>
                
               </select>
            </div>
        </div>

      
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Mobile Number</label>
            <div class="col-sm-10">
              <input type="tel" pattern="[789][0-9]{9}" name="phoneno" class="form-control" placeholder="Mobile Number" value="<?php echo $row['phoneno']; ?>" required>
            </div>
        </div>
        
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">College Name</label>
            <div class="col-sm-10">
              <input type="text" name="clgname" class="form-control" placeholder="College Name" value="<?php echo $row['college_name']; ?>" required>
            </div>
        </div>
        
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">University Name</label>
            <div class="col-sm-10">
              <input type="text" name="usityname" class="form-control" placeholder="University Name" value="<?php echo $row['university_name']; ?>" required>
            </div>
        </div>

         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
              <input type="text" name="state" class="form-control" placeholder="State" value="<?php echo $row['state']; ?>" required>
            </div>
        </div>

                
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $email_id; ?>" disabled>
            </div>
        </div>
 <style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
       
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input name="pass" type="password" id="psw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" placeholder="Password" value="<?php echo $row['pass']; ?>" required>
            </div>
        </div>

<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"></label>
            <label for="" class="col-sm-10 col-form-label">Note : In case if you are unable to login with your google login,you may login with this password and username as your email-id.</label>
        </div>
        <hr>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Team</h1>
        </div>
        <hr>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Team Member 1 Name</label>
            <div class="col-sm-10">
              <input type="text" name="auth1" class="form-control" placeholder="Team Member 1 Name" value="<?php echo $row['auth1']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Team Member 2 Name</label>
            <div class="col-sm-10">
              <input type="text" name="auth2" class="form-control" placeholder="Team Member 2 Name" value="<?php echo $row['auth2']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Team Member 3 Name</label>
            <div class="col-sm-10">
              <input type="text" name="auth3" class="form-control" placeholder="Team Member 3 Name" value="<?php echo $row['auth3']; ?>">
            </div>
        </div>
              <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" hidden>
        <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>

      
      <!-- Footer -->
      <?php
            include('main/footer.php');
        ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
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
