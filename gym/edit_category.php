<?php 
    include_once('connect.php'); 
    $id = $_GET['id'];
    $picture = $_GET['picture'];
?>

<html>

    <head>

        <title>Edit Category</title>
        <link rel="stylesheet" href="edit_category.css">

    </head>

    <body>

        <h1 class="title">Edit Category</h1>

        <div class="back-form">
            <form action="" method="POST" enctype="multipart/form-data">


                <?php
                    
                    $sql = "SELECT * FROM category WHERE id='$id'";

                    $result = mysqli_query($connect,$sql);

                    if($row = mysqli_fetch_assoc($result)){

                        $name = $row['name'];
                        $picture = $row['picture'];
                        $how_many = $row['how_many'];
                        $price = $row['price'];
                        $weight = $row['weight'];

                        ?>

                        <table>

                            <tr>
                                <td><lable>Name</lable></td>
                                <td><input type="name" name="name" value="<?php echo $name; ?>"></td>
                                <td><lable>Picture</lable></td>
                                <td><input type="file" name="picture" value="<?php echo $picture; ?>"></td>
                                <td><img src="<?php echo $picture; ?>" width="100"></td>
                                <td><lable>How many</lable></td>
                                <td><input type="number" name="how_many" value="<?php echo $how_many; ?>"></td>
                                <td><lable>price</lable></td>
                                <td><input type="nummber" name="price" value="<?php echo $price; ?>"></td>
                                <td><lable>weight</lable></td>
                                <td><input type="nummber" name="weight" value="<?php echo $weight; ?>"></td>
                                <td><button name="submit">submit</button></td>
                            </tr>

                        </table>

                        <?php





                    }

                ?>


            </form>
        </div>

    </body>

    <?php
    
        if(isset($_POST['submit'])){


            $name = $_POST['name'];
            
            $how_many = $_POST['how_many'];
            $price = $_POST['price'];
            $weight = $_POST['weight'];

            
            $sql2 = "UPDATE category SET
                    name = '$name',
                    picture =  '$picture',
                    how_many = '$how_many',
                    price = '$price',
                    weight = '$weight'
                    WHERE id = '$id'
            ";
            
            $result2 = mysqli_query($connect,$sql2);

            if($result2 == TRUE){

                header("location:category.php");
        
            }
        }
        

    ?>


</html>