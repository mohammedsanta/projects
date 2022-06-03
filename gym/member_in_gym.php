<?php
    include_once("connect.php");
?>

<html>

    <head>

        <title>Members</title>
        <link rel="stylesheet" href="member_in_gym.css">

    </head>


    <body>

        <?php
        
        include_once('header.html');

        ?>


        <h1>Members</h1>

        <a class="add" href="add_member_in_gym.php">Add Member</a>

        <table>

            <thead>

                <td>Name</td>
                <td>level</td>
                <td>age</td>
                <td>Action</td>

            </thead>

            <?php
            
                $sql = "SELECT * FROM members_in_gym";

                $result = mysqli_query($connect,$sql);

                while($row = mysqli_fetch_assoc($result)){

                    $id = $row['id'];
                    $name = $row['name'];

            ?>

                <tr>

                    <td><?php echo $name; ?></td>

                    <?php
                    
                    $sql2 = "SELECT * FROM table_user WHERE name='$name'";

                    $result2 = mysqli_query($connect,$sql2);

                    $num = mysqli_num_rows($result2);

                    if($num > 0){


                        if($row2 = mysqli_fetch_assoc($result2)){

                            $level = $row2['level'];
                            $age = $row2['age'];

                    ?>

                    <td><?php echo $level; ?></td>
                    <td><?php echo $age; ?></td>

                    <?php

                        }

                    }
                    ?>
                    
                    <td>
                        <a href="<?php echo "leave.php?id=" . $id; ?>">Leave</a>
                    </td>

                </tr>

            <?php

                }
            
            ?>






            <!--<tr>

                <td>proten</td>
                <td><img src=""></td>
                <td>5</td>
                <td>99.9$</td>
                <td>500</td>
                <td>
                    <a>Edit</a>
                    <a>Delete</a>
                </td>

            </tr> -->

        </table>

    </body>


</html>