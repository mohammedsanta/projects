
<?php
    //connect to local server
    include_once('conn.php');

    if(isset($_POST['upload'])){
        //declar a variable
        $location = "uploads/";
        $file_new_name = date('dmy') . time() . $_FILES['file']['name'];
        $file_name = $_FILES["file"]["name"];
        $file_size = $_FILES["file"]["size"];
        $file_tmp = $_FILES["file"]["tmp_name"];

        /*

        how we can get mb from bytes
        (mb*1024)*1024

        in my case i'm 10 mb limit
        (10*1024)*1024

        */
        
        if($file_size > 10485760){ // check file size is 10mb or not
            //size of file is larger than limet
            echo "<script>alert('The File is Larger than Limet..the limet is 10MB');</script>";

        }else{
            //size of file is good 

            $sql = "INSERT INTO table_upload (name,new_name)
            VALUES('$file_name','$file_new_name')
            ";
            //execute query
            $result = mysqli_query($conn,$sql);
            if($result == TRUE){
                //uploading is done
                move_uploaded_file($file_tmp,$location.$file_new_name);
                echo "<script>alert('Your File Uploaded');</script>";
            }else{
                echo "<script>alert('Your File Filed Uploaded');</script>";
            }

        }

    }

?>

<html>

    <head>

        <title>Upload File</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">

    </head>

    <body>

        <div class="box">

            <h1>Upload Your File</h1>

            <form action="" method="POST" enctype="multipart/form-data">

                <input type="file" name="file" id="upload" class="choose" required>

                <button name="upload">Upload</button>

            </form>

        </div>



    </body>


</html>