<?php 
    include_once('connect.php'); 
?>

<html>

    <head>

        <title>Add Cabtn In Gym</title>
        <link rel="stylesheet" href="add_cabtn_in_gym.css">

    </head>

    <body>

        <h1 class="title">Add Cabtn In Gym</h1>

        <div class="back_box">
            <form action="" method="POST" enctype="multipart/form-data">

                        <table>

                            <tr>
                                <td><lable>Name</lable></td>
                                <td>
                                    <select name="name">

                                    <?php
                                    
                                        $sql = "SELECT * FROM cabtn";

                                        $result = mysqli_query($connect,$sql);

                                    

                                        while($row = $rows = mysqli_fetch_assoc($result)){

                                            $name = $row['name'];


                                            
                                        ?>


                                                <option value="<?php echo $name;?>"><?php echo $name ;?></option>
                                        


                                        <?php

                                        }


                                        
                                        ?>

                                    </select>


                                </td>
                                <td><button name="submit" class="box">submit</button></td>
                            </tr>

                        </table>

            </form>
        </div>

    </body>

    <?php
    
        if(isset($_POST['submit'])){


            $name = $_POST['name'];

            $sql2 = "INSERT INTO cabtn_in_gym SET
                    name = '$name'
            ";

            $result2 = mysqli_query($connect,$sql2); 

            if($sql2 == TRUE){

                header("location:cabtn_in_gym.php");

            }

        }
        

    ?>


</html>