<?php
    include_once("connect.php");
?>

<html>

    <head>

        <title>Category</title>
        <link rel="stylesheet" href="category.css">

    </head>

    <body>

        <?php
            
            include_once('header.html');

        ?>


        <h1>Category</h1>

        <a href="add_category.php" class="add">Add Categry</a>

        <table>

            <thead>

                <td>Name</td>
                <td>Picture</td>
                <td>How many</td>
                <td>price</td>
                <td>weight</td>
                <td>Action</td>

            </thead>

            <?php
    
                $sql = "SELECT * FROM category";

                $result = mysqli_query($connect,$sql);

                while($row = mysqli_fetch_assoc($result)){

                    $id = $row['id']; 
                    $name = $row['name'];
                    $picture = $row['picture'];
                    $how_many = $row['how_many'];
                    $price = $row['price'];
                    $weight = $row['weight'];

                    ?>

                        <tr>

                            <td><?php echo $name; ?></td>
                            <td><img src="<?php echo $picture; ?>" width="150"></td>
                            <td><?php echo $how_many; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $weight; ?></td>
                            <td>
                                <a href="<?php echo "edit_category.php?id=" . $id . "&picture=" . $picture; ?>">Edit</a>
                                <a>Delete</a>
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