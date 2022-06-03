<?php

    include_once('connect.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM cabtn_in_gym WHERE id = '$id'";

    $result = mysqli_query($connect,$sql);

    if($result == TRUE){

        header("location:cabtn_in_gym.php");

    }

?>