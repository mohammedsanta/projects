<?php

    include_once('connect.php');


?>

<html>

    <head>

        <title>Login</title>
        <link rel="stylesheet" href="login.css">

    </head>

    <body>

    <?php
        
        include_once('header.html');

    ?>


        <h1>Admin Panal</h1>

        <div class="back_box">

                <form action="" method="POST">

                    <table>

                        <tr>

                            <td>Username : </td>
                            <td>
                                <input type="text" name="username" class="box">
                            </td>
                            <td>Password : </td>
                            <td>
                                <input type="password" name="password" class="box">
                            </td>

                            <td>
                                <button name="submit" class="box">Submit</button>
                            </td>

                        </tr>
                    
                    </table>

                </form>
        </div>

    </body>

    <?php
    
        if(isset($_POST['submit'])){

            //echo "<script>alert('done')</script>";

            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

            $result = mysqli_query($connect,$sql);

            $num = mysqli_num_rows($result);

            if($num == 1){

                //echo "<script>alert('correct User')</script>";

                header("location:home.php");

            }

        }
    
    ?>


</html>