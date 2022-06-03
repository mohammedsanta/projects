<?php 
    include_once('connect.php'); 
?>

<html>

    <head>

        <title>Add Cabtn</title>
        <link rel="stylesheet" href="add_cabtn.css">

    </head>

    <body>

        <h1 class="title">Add Cabten</h1>

        
        <div class="back_box">
            <form action="" method="POST" enctype="multipart/form-data">

                        <table>

                            <tr>
                                <td><lable>Name</lable></td>
                                <td><input type="name" name="name"></td>
                                <td><lable>Picture</lable></td>
                                <td><input type="file" name="picture"></td>
                                <td><img src=""></td>
                                <td><lable>Age</lable></td>
                                <td><input type="number" name="age"></td>
                                <td><lable>Birth Day</lable></td>
                                <td><input type="date" name="birth_day"></td>
                                <td><lable>Work</lable></td>
                                <td><input type="text" name="work"></td>
                                <td><button name="submit" class="box">submit</button></td>
                            </tr>

                        </table>

            </form>
        </div>

    </body>

    <?php
    
        if(isset($_POST['submit'])){


            $name = $_POST['name'];

            $picture_name = $_FILES['picture']['name'];
            $picture_size = $_FILES['picture']['size'];
            $picture_tmp = $_FILES['picture']['tmp_name'];

            $age = $_POST['age'];
            $birth_day = $_POST['birth_day'];
            $work = $_POST['work'];

            $path = "cabtns/" . $name . "/" . $name . $picture_name;
            $file = "cabtns/" . $name;

            if(!file_exists($file)){

                mkdir("cabtns/". $name);

            }

            $move = move_uploaded_file($picture_tmp,$path);

            
            $sql2 = "INSERT INTO cabtn SET
                    name = '$name',
                    picture =  '$path',
                    age = '$age',
                    birth_day = '$birth_day',
                    work = '$work'
            ";
            
            $result2 = mysqli_query($connect,$sql2);

            if($result2 == TRUE){

                header("location:cabtn.php");

            }
        }
        

    ?>


</html>