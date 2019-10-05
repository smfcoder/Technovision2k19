<?php
if (isset($_GET['file_id'])) {
    include('conn.php');
    $id = $_GET['file_id'];
    $sql_q = "SELECT * FROM downloads WHERE id=$id";
    $result = mysqli_query($sql, $sql_q);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'admin/uploads/' . $file['filename'];

    if (file_exists($filepath)) {
        $fname=basename($file['filename']);
        header("Cache-Control: public");
        header("Content-Description: FIle Transfer");
        header("Content-Disposition: attachment; filename=$fname");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");
        readfile($filepath);
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE idea SET downloads=$newCount WHERE id=$id";
        mysqli_query($sql, $updateQuery);
        exit;
    }

}
?>