<?php 
    include_once('connect.php'); 
    $id = $_GET['id'];
    $picture = $_GET['picture'];
    $name = $_GET['name'];
?>

<html>

    <head>

        <title>Edit Cabtn</title>
        <link rel="stylesheet" href="edit_cabtn.css">

    </head>

    <body>

        <h1 class="title">Edit Cabtn</h1>

        <div class="back-form">
            <form action="" method="POST" enctype="multipart/form-data">


                <?php
                    
                    $sql = "SELECT * FROM cabtn WHERE id='$id'";

                    $result = mysqli_query($connect,$sql);

                    if($row = mysqli_fetch_assoc($result)){

                        $name = $row['name'];
                        $picture = $row['picture'];
                        $age = $row['age'];
                        $birth_day = $row['birth_day'];
                        $work = $row['work'];

                        ?>

                        <table>

                            <tr>
                                <td><lable>Name</lable></td>
                                <td><input type="name" name="name" value="<?php echo $name ;?>"></td>
                                <td><lable>Picture</lable></td>
                                <td><input type="file" name="picture" value="<?php echo $picture ;?>"></td>
                                <td><img src="<?php echo $picture ;?>" width="100px"></td>
                                <td><lable>Age</lable></td>
                                <td><input type="number" name="age" value="<?php echo $age ;?>"></td>
                                <td><lable>Birth Day</lable></td>
                                <td><input type="date" name="birth_day"value="<?php echo $birth_day ;?>"></td>
                                <td><lable>Work</lable></td>
                                <td><input type="text" name="work" value="<?php echo $work ;?>"></td>
                                <td><button name="submit" class="box">submit</button></td>
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

            $picture_name = $_FILES['picture']['name'];
            $picture_size = $_FILES['picture']['size'];
            $picture_tmp = $_FILES['picture']['tmp_name'];

            if($picture_tmp == !""){

                $new_picture = $name . $picture_name;

                $path = "cabtns/" . $name . "/";

                unlink($picture);

                $move = move_uploaded_file($new_name,$path);

            }


            $age = $_POST['age'];
            $birth_day = $_POST['birth_day'];
            $work = $_POST['work'];

            
            


            $sql2 = "UPDATE cabtn SET
                    name = '$name',
                    picture =  '$picture',
                    age = '$age',
                    birth_day = '$birth_day',
                    work = '$work'
                    WHERE id = '$id'
            ";
            
            $result2 = mysqli_query($connect,$sql2);

            if($result2 == TRUE){

                header("location:cabtn.php");
        
            }
        }
        

    ?>


</html>