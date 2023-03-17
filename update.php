<?php
    $update = false;
    require('connection.php');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
            $name = $_POST["name"];    
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $gender = $_POST["gender"];
            $standard = $_POST['standard'];
            $id = $_POST["id"];
            $sql = "UPDATE student set name='$name',email='$email',phone='$phone',gender='$gender',standard='$standard' WHERE id=$id";
            $msg='';
            $result = mysqli_query($conn, $sql);
            if($result){
                $update = true;
                header("location:students.php?update=$update");
            }
            else{
                echo '<div class="alert" role="alert">
                <strong>Sorry ! </strong>for your inconvienience. We are loking towards your problem.
                <a href="./students.php">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer">
                <span>×</span>
                </button>
                </a>
                </div>';
            }
        }
?>