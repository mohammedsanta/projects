<?php 
// include connect file
include_once('connect.php'); 
?>

<html>

    <head>

        <title>Add Categoty</title>
        <link rel="stylesheet" href="add_category.css">

    </head>

        <body>

        <div class="back_box">
            <table>

            
                <form action="" method="POST" enctype="multipart/form-data">
                        
                        <tr>

                            <td><lable>Name</lanble></td>
                            <td><input type="text" name="name"></td>
                            <td><lable>Picture</lanble></td>
                            <td><input type="file" name="picture"></td>
                            <td><lable>How many</lanble></td>
                            <td><input type="number" name="how_many"></td>
                            <td><lable>price</lanble></td>
                            <td><input type="number" name="price"></td>
                            <td><lable>weight</lanble></td>
                            <td><input type="number" name="weight"></td>
                            <td><button name="submit" class="box">Submit</button></td>

                        </tr>
                        
                </form>

               

            </table>
            </div>

        </body>

        <?php
            // if click submit
            if(isset($_POST['submit'])){

                // declar variable picture
                $picture_name = $_FILES['picture']['name'];
                $picture_size = $_FILES['picture']['size'];
                $picture_tmp = $_FILES['picture']['tmp_name'];

                // declar variable inputs
                $name = $_POST['name'];
                $how_many = $_POST['how_many'];
                $price = $_POST['price'];
                $weight = $_POST['weight'];
                
                // if the file not exist
                if(!file_exists("category/" . $name)){

                    // creat directory
                    $creat_directorty = mkdir("category/" . $name);

                }

                // path picture
                $path = "category/" . $name . "/" . $name . "-" . $picture_name;

                // copy the picture
                $move = move_uploaded_file($picture_tmp,$path);

                // order sql
                $sql = "INSERT INTO category SET
                        name = '$name',
                        picture = '$path',
                        how_many = '$how_many',
                        price = '$price',
                        weight = '$weight'
                ";

                // proccess the order
                $result = mysqli_query($connect,$sql);

                if($result == TRUE){

                    header("location:category.php");
    
                }

            }

        ?>


</html>