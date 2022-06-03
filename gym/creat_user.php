<?php

    include_once('connect.php');

?>

<html>

    <head>
        <title>New User</title>
        <link rel="stylesheet" href="creat_user.css">
    </head>

    <body>

        <?php
            
            include_once('header.html');

        ?>


        <div class="title"><h1>Creat User</h1></div>

        <div class="back-form">
            <form action="" method="POST" enctype="multipart/form-data">

                <table>

                    <tr>
            
                        <td>
                            <lable>Name : </lable>
                            <input type="name" name="name">
                        </td>
                        <td>
                            <lable>Age : </lable>
                            <input type="data" name="age">
                        </td>
                        <td>
                            <lable>Phone Number : </lable>
                            <input type="name" name="phone">
                        </td>
                        <td>
                            <lable>The Picture : </lable>
                            <input type="file" name="picture">
                        </td>
                        <td>
                            <lable>First Month : </lable>
                            <input type="date" name="first_month">
                        </td>
                        <td>
                            <lable>Level : </lable>
                            <input type="name" name="level">
                        </td>
                        <td>
                            <lable>Date Expire : </lable>
                            <input type="date" name="expired">
                        </td>
                        <td>
                            <lable>Debt : </lable>
                            <input type="name" name="debt">
                        </td>
                        <td>
                            <button name="submit">Submit</button>
                        </td>
                        
                    </tr>
        
                </table>

            </form>
        </div>

        <?php
        
            if(isset($_POST['submit'])){

                $name   = $_POST['name'];
                $age    = $_POST['age'];
                $phone  = $_POST['phone'];

                // Picture
                $file_name  = $_FILES['picture']['name'];
                $file_size  = $_FILES['picture']['size'];
                $file_tmp   = $_FILES['picture']['tmp_name'];

                $file_new_name = $name . "-" .$age . $file_name;

                $path_file = "users/" . $name . "-" . $age;

                $path_picture = $path_file . "/" . $file_new_name;



                $first_month = $_POST['first_month'];
                $level = $_POST['level'];
                $expired = $_POST['expired'];
                $debt = $_POST['debt'];

                $sql = "INSERT INTO table_user SET
                        name = '$name',
                        age = '$age',
                        phone_number = '$phone',
                        picture = '$path_picture',
                        first_month = '$first_month',
                        level = '$level',
                        expired = '$expired',
                        debt = '$debt'
                        ";

                $result = mysqli_query($connect,$sql);

                if($result == TRUE){

                    

                    mkdir($path_file);

                
                    $move = move_uploaded_file($file_tmp,$path_picture);

                    header("location:login.php");

                }

            }
        
        ?>

    </body>

</html>