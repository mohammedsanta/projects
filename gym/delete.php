<?php

    include_once('connect.php');

    $id = $_GET['id'];

    $dir = $_GET['file'];


    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
    
        }
    
        return rmdir($dir);

    }


    deleteDirectory($dir);

    $sql = "DELETE FROM table_user WHERE id = '$id'";

    $result = mysqli_query($connect,$sql);

    if($result == TRUE){

        header("location:home.php");

    }








    
    

?>