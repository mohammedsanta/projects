<?php

    include_once('connect.php');

    $id = $_GET['id'];

    if($id == ""){

        echo "<script>alert('ID needed')</script>";

        header('location:home.php');

    }

?>

<html>

    <head>
        <title>Edit User</title>
        <link rel="stylesheet" href="edit.css">
    </head>

    <body>


        <div class="title"><h1>Edit User</h1></div>

        <div class="back-form">
        <form action="" method="POST" enctype="multipart/form-data">

            <table>


                <?php
                
                    $sql = "SELECT * FROM table_user ORDER BY id DESC";

                    $result = mysqli_query($connect,$sql);

                    if($row = mysqli_fetch_assoc($result)){
                        
                        $name = $row['name'];
                        $age = $row['age'];
                        $phone = $row['phone_number'];
                        $picture = $row['picture'];
                        $first_month = $row['first_month'];
                        $level = $row['level'];
                        $expired = $row['expired'];
                        $debt = $row['debt'];

                        ?>

                            <tr>
                                
                                <td>
                                    <lable>Name : </lable>
                                    <input type="name" value="<?php echo $name; ?>" name="name">
                                </td>
                                <td>
                                    <lable>Age : </lable>
                                    <input type="data" value="<?php echo $age; ?>" name="age">
                                </td>
                                <td>
                                    <lable>Phone Number : </lable>
                                    <input type="name" value="<?php echo $phone; ?>" name="phone">
                                </td>
                                <td>
                                    <lable>The Picture : </lable>
                                    <input type="file" value="<?php echo $picture; ?>" name="picture">
                                </td>
                                <td>
                                    <lable>First Month : </lable>
                                    <input type="date" value="<?php echo $first_month; ?>" name="first_month">
                                </td>
                                <td>
                                    <lable>Level : </lable>
                                    <input type="name" value="<?php echo $level; ?>" name="level">
                                </td>
                                <td>
                                    <lable>Date Expire : </lable>
                                    <input type="date" value="<?php echo $expired; ?>" name="expired">
                                </td>
                                <td>
                                    <lable>Debt : </lable>
                                    <input type="name" value="<?php echo $debt; ?>" name="debt">
                                </td>
                                <td>
                                    <button name="submit">Submit</button>
                                </td>

                            </tr>


                        <?php

                    }

                ?>


    
    
    
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

            $first_month = $_POST['first_month'];
            $level = $_POST['level'];
            $expired = $_POST['expired'];
            $debt = $_POST['debt'];

            $sql2 = "UPDATE table_user SET
                        name = '$name',
                        age = '$age',
                        phone_number = '$phone',
                        picture = '$file_tmp',
                        first_month = '$first_month',
                        level = '$level',
                        expired = '$expired',
                        debt = '$debt'
                        WHERE id = '$id'
            ";

            $result2 = mysqli_query($connect,$sql2);

            if($result2 == TRUE){

                header("location:home.php");
        
            }

        }

    ?>


    </body>

</html>