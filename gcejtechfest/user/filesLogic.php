<?php

include("conn.php");
$sl = "SELECT * FROM files where email='$email_id'";
$result = mysqli_query($sql, $sl);

$files = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($_POST['save'])) { 
    
    $filename = $_FILES['myfile']['name'];
    $grp=$_POST['group'];
    $title=$_POST['title'];
   
    $destination = 'uploads/' . $filename;

    
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx','doc'])) {
        echo '<script>alert("You file extension must be .pdf or .docx")</script>';
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo '<script>alert("File too large!")</script>';
    } else {
        
        if (move_uploaded_file($file, $destination)) {
            $q = "INSERT INTO files (email,filename, size, downloads,grp,title,status_g) VALUES ('$email_id','$filename','$size','0','$grp','$title','1')";
            
            if (mysqli_query($sql,$q)) {
                $_SESSION['submitted']='success';
                header('Location:paper_submitted.php');
            }
            
        } 
        else {
            echo '<script>alert("Failed to upload file.")<script>';
        }
    }
}


// if (isset($_GET['file_id'])) {
//     $id = $_GET['file_id'];

//     // fetch file to download from database
//     $sql = "SELECT * FROM students WHERE id=$id";
//     $result = mysqli_query($sql);

//     $file = mysqli_fetch_assoc($result);
//     $filepath = 'uploads/' . $file['filename'];

//     if (file_exists($filepath)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename=' . basename($filepath));
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize('uploads/' . $file['name']));
//         readfile('uploads/' . $file['name']);

//         // Now update downloads count
//         $newCount = $file['downloads'] + 1;
//         $updateQuery = "UPDATE students SET downloads=$newCount WHERE id=$id";
//         mysqli_query($conn, $updateQuery);
//         exit;
//     }

// }