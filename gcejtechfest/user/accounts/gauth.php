<?php
require_once('settings.php');
require_once('google-login-api.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
?>
<head>
<style type="text/css">

#information-container {
	width: 400px;
	margin: 50px auto;
	padding: 20px;
	border: 1px solid #cccccc;
}

.information {
	margin: 0 0 30px 0;
}

.information label {
	display: inline-block;
	vertical-align: middle;
	width: 150px;
	font-weight: 700;
}

.information span {
	display: inline-block;
	vertical-align: middle;
}

.information img {
	display: inline-block;
	vertical-align: middle;
	width: 100px;
}

</style>
</head>

<body>
	<?php
	        include ('conn.php');
	        session_start();
            if(isset($_SESSION['email'])) 
            {
                unset($_SESSION['email']);
            }      
	        $rname = $user_info['name'];
			$rgoogleid = $user_info['id'];
			$remail = $user_info['email'];
			$rprofile = $user_info['picture'];
            $res="SELECT * FROM students WHERE email='$remail';";
           
            $q_e=mysqli_query($sql,$res);
            if($q_e)
            {
                $no=mysqli_num_rows($q_e);
                $_SESSION['email']=$remail;
                if($no<1)
                {
                    $ins="INSERT INTO students(name,googleid,email,propicture) values('$rname','$rgoogleid','$remail','$rprofile');";
                    $e_ins=mysqli_query($sql,$ins); 
                }
            }
            header('Location:../index.php');
            
	?>


</body>
</html>