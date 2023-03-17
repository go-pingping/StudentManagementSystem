<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="./css/student.css">
    <link rel="shortcut icon" href="./images/book-solid.svg">
</head>
<body>
    <?php
        include 'nav.html';
    ?>
    <?php
        require("connection.php");
        if(isset($_GET['update'])){    
            echo '<div class="alert alert-success" role="alert">
            <strong>Success ! </strong>We had successfully updated your fields.
            <a href="./students.php">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer">
                <span>×</span>
                </button>
            </a>
            </div>'; 
        }
        $delete = false;
        if(isset($_GET['delete'])){
            echo '<div class="alert alert-success" role="alert">
            <strong>Success ! </strong>We had successfully deleted your fields.
            <a href="./students.php">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer">
                <span>×</span>
                </button>
            </a>
            </div>';
        }
    ?>
    <form action="students.php" method="post">
        <div class="StudentH">
            <?php
                echo '
                    <div class="StudentT">Select Standard</div>
                    <select name="StudentS" class="StudentS">
                        <option value="None" selected>None</option>
                        <option value="Semester_1" name="StudentS">Semester_1</option>
                        <option value="Semester_2" name="StudentS">Semester_2</option>
                    </select>
                ';
            ?>
            <button type="submit" value="Search" class="StudentB">Search</button>
        </div>
    </from>
        <center>
            <p class="StudentMT" style="width: 97%; min-width: 900px">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $StudentS = $_POST['StudentS'];
                        if ($StudentS == "None") {
                            echo "Please Select a Standard";
                        } else {
                            echo "Students of " . $StudentS;
                        }
                    } else {
                        echo "Please select a standard";
                    }
                ?>
            </p>
        </center>
        <div class="dataTables">    
            <table class="dataTable" style="width: 97%; min-width: 800px">
                <thead>
                    <tr role="row">
                        <th scope="col" style="width: 20%;">S.No</th>
                        <th scope="col" style="width: 20%;">Name</th>
                        <th scope="col" style="width: 20%;">Phone Number</th>
                        <th scope="col" style="width: 40%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require("connection.php");
                        $sno = 1;
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $StudentS = $_POST['StudentS'];
                            $sql = "SELECT * FROM student WHERE standard = '$StudentS'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <?php
                        echo "<tr><td>". $sno ."</td>";
                            $sno+=1;
                    ?>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']?>"><button type="button" class="btn-primary ">Edit</button></a>      
                            <a href="detail.php?id=<?php echo $row['id']?>"><button type="button" class="btn-success ">Show</button></a>         
                            <a href="delete.php?id=<?php echo $row['id']?>"><button type="button" class="btn-danger">Delete</button></a>         
                        </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
             <!-- <div class="page">
                <?php echo $pageinfo; ?>
            </div>  -->
        </div>
    </body>
</html>



