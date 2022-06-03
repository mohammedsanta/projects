<?php
    include_once("connect.php");
?>

<html>

    <head>

        <title>Catbns</title>
        <link rel="stylesheet" href="cabtin_in_gym.css">

    </head>

    <body>


        <?php
                
                include_once('header.html');

        ?>


        <h1>Cabtns</h1>

        <a class="add" href="add_cabtn_in_gym.php">Add Cabtn</a>

        <table>

            <thead>

                <td>Name</td>
                <td>Work</td>
                <td>Action</td>

            </thead>

            <?php
            
                $sql = "SELECT * FROM cabtn_in_gym";

                $result = mysqli_query($connect,$sql);




                while($row = mysqli_fetch_assoc($result)){

                    $id = $row['id'];
                    $name = $row['name'];

            ?>

                <tr>

                    <td><?php echo $name; ?></td>

                    <?php
                    
                    $sql2 = "SELECT * FROM cabtn WHERE name='$name'";

                    $result2 = mysqli_query($connect,$sql2);

                    $num = mysqli_num_rows($result2);

                    if($num > 0){


                        if($row2 = mysqli_fetch_assoc($result2)){

                            $work = $row2['work'];

                    ?>

                    <td><?php echo $work; ?></td>

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