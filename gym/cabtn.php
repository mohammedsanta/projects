<?php
    include_once("connect.php");
?>

<html>

    <head>

        <title>Catbns</title>
        <link rel="stylesheet" href="cabtn.css">

    </head>

    <body>


        <?php
            
            include_once('header.html');

        ?>


        <h1>Cabtns</h1>

        <a class="add" href="add_member_in_gym.php">Add Cabtn</a>

        <table>

            <thead>

                <td>Name</td>
                <td>Picture</td>
                <td>Age</td>
                <td>Birth Day</td>
                <td>Work</td>
                <td>Action</td>

            </thead>

            <?php
    
                $sql = "SELECT * FROM cabtn";

                $result = mysqli_query($connect,$sql);

                while($row = mysqli_fetch_assoc($result)){

                    $id = $row['id']; 
                    $name = $row['name'];
                    $picture = $row['picture'];
                    $age= $row['age'];
                    $bith_day = $row['birth_day'];
                    $work = $row['work'];

                    ?>

                        <tr>

                            <td><?php echo $name; ?></td>
                            <td><img src="<?php echo $picture; ?>" width="150"></td>
                            <td><input type="number" name="age" value="<?php echo $age; ?>"></td>
                            <td><input type="date" name="birth_day" value="<?php echo $bith_day; ?>"></td>
                            <td><?php echo $work; ?></td>
                            <td>
                                <a href="<?php echo "edit_cabtn.php?id=" . $id . "&name=" . $name . "&picture=" . $picture; ?>">Edit</a>
                                <a href="<?php echo "delete_cabtn.php?id=" . $id; ?>">Delete</a>
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