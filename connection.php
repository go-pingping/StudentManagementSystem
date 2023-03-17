<?php
    $conn = mysqli_connect("localhost", "root", "", "studentsm", "3306");
    if(!$conn){
        print("There was an error while connecting to database.");
        echo "<br>";
    }
    else{
        // print("Connection is made successfully.");
    }
?>