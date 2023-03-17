<?php
    require("connection.php");
    $sql = "DELETE FROM student WHERE id=".$_GET["id"];
    $result = mysqli_query($conn, $sql);
    if($result){
        $delete = true;
        header("location:students.php?delete=$delete");
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
?>