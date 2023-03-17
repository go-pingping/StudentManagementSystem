<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./images/book-solid.svg">
    <title>Login System</title>
</head>
<body>
    <div class="navbar">
        <a class="navbar-brand" href="#">
            <img src="./images/logo.svg" alt="Logo" style="width: 40px;">
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Students</a>
                </li>
            </ul>
        </div>
        <div class="navbar-right">
           <a href="#">Student Management System</a>
        </div>
    </div>
    <center>
        <div class="main">
            <div class="tit">Login System</div>
            <form action="login.php" method="post">
                <div class="lab">
                    <span class="text">UserName</span>
                    <input type="text" name="username" class="kuang" placeholder="eg. jack">
                </div>
                <br/>
                <div class="lab">
                    <span class="text">Password</span>
                    <input type="password" name="password" class="kuang" placeholder="eg. 123456">
                </div>
                <br/>
                <input type="submit" name="submit" value="Login" class="btn">
            </form>
        </div>
    </center>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $user=$_POST['username'];
        $psd=$_POST['password'];
        if($user=='jack' && $psd=='123456') {
            echo '<script> alert("登录成功！")</script>';
            header("Refresh:0;url=index.php");
        } else {
            echo '<script> alert("用户名或密码不正确，请重新输入！")</script>';
        }
    }
?>