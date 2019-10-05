<?php

include("conn.php");
$sl = "SELECT * FROM downloads where email='$email_id'";
$result = mysqli_query($sql, $sl);

$files = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($_POST['save'])) { 
    
    $filename = $_FILES['myfile']['name'];
    
    $title=$_POST['title'];
   
    $destination = 'uploads/' . $filename;

    
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx','doc'])) {
        echo "You file extension must be .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        
        if (move_uploaded_file($file, $destination)) {
            $q = "INSERT INTO downloads (name,filename, size) VALUES ('$title','$filename','$size')";
            
            if (mysqli_query($sql,$q)) {
                header('Location:changedownloads.php');
            }
            
        } 
        else {
            echo "Failed to upload file.";
        }
    }
}
?>

