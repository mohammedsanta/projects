
    <?php
    
        include_once('connect.php');
    
    ?>

<html>

    <head>

        <title>Home</title>
        <link rel="stylesheet" href="style.css">

    </head>

    <body>

    <?php
    
        include_once('header.html');

    ?>

        <img src="pictures/logo.jpg" class="logo">

        <a class="add" href="creat_user.php">Creat User</a>


        <table>

            <thead>
                <tr>

                    <td>Picture</td>
                    <td>Name</td>
                    <td>Age</td>
                    <td>Phone Number</td>
                    <td>First Month</td>
                    <td>Level</td>
                    <td>Date Expire</td>
                    <td>Dyon</td>
                    <td>Action</td>

                </tr>
            </thead>


            <?php
            
                $sql = "SELECT * FROM table_user";

                $result = mysqli_query($connect,$sql);

                while($row = mysqli_fetch_assoc($result)){

                    $id = $row['id'];
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
                                <img src="<?php echo  $url . $picture ?>" class="picture_user">
                            </td>
                            <td><?php echo $name ;?></td>
                            <td><?php echo $age;?></td>
                            <td><?php echo $phone ;?></td>
                            <td><?php echo $first_month ;?></td>
                            <td><?php echo $level ;?></td>
                            <td><?php echo $expired ;?></td>
                            <td><?php echo $debt ;?></td>
                            <td>
                                <a href="<?php echo $url . "edit.php?id=" .$id; ?>" class="button">Update</a>
                                <a href="<?php echo $url . "delete.php?id=" . $id . "&file=users/" . $name . "-" .$age ; ?>" class="button">Delete</a>
                            </td>

                        </tr>

                    <?php

                }
            
            ?>

                <!--
            <tr>

                <td>
                    <img src="pictures/logo.jpg" class="picture_user">
                </td>
                <td>owner</td>
                <td>18</td>
                <td>0111651965</td>
                <td>30/10/2021</td>
                <td>middle</td>
                <td>30/11/2021</td>
                <td>no</td>
                <td>
                    <button class="button">Update</button>
                    <button class="button">Delete</button>
                </td>

            </tr>

            -->




        </table>

    </body>

</html>