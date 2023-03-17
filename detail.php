<!Doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Details</title>
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="shortcut icon" href="./images/book-solid.svg">
    </head>
    <body>
        <?php
            include 'nav.html';
            require("connection.php");
            $sql = "SELECT * FROM student WHERE id=".$_GET["id"];
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '
                    <div class="card-header">
                        Student Details
                    </div>
                ';
                echo  '
                    <center>
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Welcome '. $row["name"] .'</h1>
                                <p class="card-text">Name Of Student :- <b> '.$row["name"] .' </b></p>
                                <p class="card-text">Email Of Student :- <b> '.$row["email"] .' </b></p>
                                <p class="card-text">Contact Number :- <b> '.$row["phone"] .' </b></p>
                                <p class="card-text">Gender :- <b> '.$row["gender"] .' </b></p>
                                <a href="edit.php?id='. $row["id"] .'" class="btn-primary">Edit Details</a>
                            </div>
                        </div>
                    </center>
                ';
            }
        ?>
    </body>
</html>