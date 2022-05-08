<?php include_once('conn.php');
?>
<html>

    <head>

        <title>Files</title>
        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <table>

            <tr>

                <td>Id</td>
                <td>Name</td>

            </tr>

            <?php
            
                $i = 1;
                $sql = "SELECT * FROM table_upload ORDER BY id DESC";

                $rows = mysqli_query($conn,$sql);


            ?>

            <?php foreach($rows as $row) :?>

            <tr>

                <td><?php echo $i++; ?></td>
                <td><?php echo $row['new_name']; ?></td>

            </tr>

            <?php endforeach; ?>
        </table>

    </body>


</html>