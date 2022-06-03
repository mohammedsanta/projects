<?php

    include_once('connect.php');

?>

<html>

    <head>

        <title>Creat Admin</title>
        <link rel="stylesheet" href="creat_admin.css">

    </head>

    <body>


        <?php
        
        include_once('header.html');

        ?>


        <h1>Creat Admin</h1>

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
            
            $sql = "INSERT INTO admin SET 
            username = '$username',
            password = '$password'
            ";

            $result = mysqli_query($connect,$sql);

            if($result == TRUE){

                header("location:login.php");


            }

        }
    
    ?>


</html>