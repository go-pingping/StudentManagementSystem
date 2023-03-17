<?php
    require("connection.php");
?>
<?php
    $msg = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['radios'];
        $standard = $_POST['standard'];
        $sql = "INSERT INTO student (name, email, phone, gender, standard) VALUES ('$name', '$email', '$phone', '$gender', '$standard')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $msg =  '<div class="alert alert-warning" role="alert">
            <strong>Error ! </strong> We are facing some issues right now. Please try again after some time.
            <a href="./index.php">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer">
            <span>×</span>
            </button>
            </a>
            </div>';
        }
        else{
            $msg =  '<div class="alert alert-success" role="alert">
            <strong>Success ! </strong>Your data has been saved successfully.
            <a href="./index.php">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer">
            <span>×</span>
            </button>
            </a>
            </div>';
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Record Manager</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="shortcut icon" href="./images/book-solid.svg">
</head>
<body>
    <?php
        include 'nav.html';
    ?>
    <?php
        echo $msg;
    ?>
    <!-- form -->
    <form action="index.php" method="POST">
        <div class="container">
            <h2 class="indexT">Add Student Details</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control-s" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="name">Standard</label>
                    <input type="text" class="form-control-sm" id="standard" name="standard" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control-m" id="inputEmail4" name="email" required>
                </div>
                <div class="form-group">
                    <label for="inputnumber">Phone Number</label>
                    <input type="number" class="form-control-l" id="inputnumber" placeholder="eg. 1234567890" name="phone" required>
                </div>
                <div class="form-radio">
                    <label for="radios">Gender</label>
                    <input class="form-radio-input" type="radio" name="radios" id="radios1" value="Male" checked>
                    <label class="form-radio-label" for="radios1">
                        Male
                    </label>
                    <input class="form-radio-input" type="radio" name="radios" id="radios2" value="Female">
                    <label class="form-radio-label" for="radios2">
                        Female
                    </label>
                </div>
                <button type="submit" class="btn-primary">Submit</button>
            </div>
        </div>
    </form>
</body>
</html>