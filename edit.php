<?php
    require 'connection.php';
    $id=$_GET['id'];

    $sql="select * from student where id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $gender = $row['gender'];
            $standard = $row['standard'];
        }
    }else{
        echo '0 results';
    }
    $msg='';
?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Edit Student Details</title>
        <link rel="stylesheet" href="./css/edit.css">
        <link rel="shortcut icon" href="./images/book-solid.svg">
    </head>
    <body>
        <?php
            include 'nav.html';
        ?>
        <form action="update.php" method="POST">
            <div class="container">
                <h2 class="editT">Edit Student Details</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control-s" id="name" name="name" required value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="standard">Standard</label>
                        <input type="text" class="form-control-sm" id="standard" name="standard" required value = "<?php echo $standard; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control-m" id="email" value = "<?php echo $email; ?>"name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control-l" id="phone" value = "<?php echo $phone; ?>" placeholder="eg. 1234567890" name="phone" required>
                </div>
                <div class="form-radio">
                    <label for="gender" class="control-label">Gender</label>
                        <input  class="form-radio-input" type="radio" name="gender" value="Male" required="required"
                            <?php
                                if($gender=='Male'){
                                    echo 'checked';
                                }
                            ?>
                        >Male 
                        
                        <input class="form-radio-input" type="radio" name="gender" value="Female" required="required"
                            <?php
                                if($gender=='Female'){
                                    echo 'checked';
                                } 
                            ?>
                        >Female
                </div>
                <button type="submit" class="btn-primary">Update</button>
                <input type='hidden' name='id' value='<?php echo $id?>'>
            </div>
        </form>
    </body>
</html>