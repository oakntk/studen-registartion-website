<?php

    session_start();
    
    require 'connect.php';
    require 'functions.php';

    if(isset($_POST['login'])){
        $uname = clean($_POST['username']);
        $pword = clean($_POST['password']);

        $query = "SELECT * FROM students WHERE username = '$uname' AND pword = '$pword'";
        $result = mysqli_query($con, $query);

        if($result){
            $row_num = mysqli_num_rows($result);
            if($row_num == 1) {
                $row = mysqli_fetch_assoc($result);
    
                $_SESSION['stdno'] = $row['stdno'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['pword'] = $row['pword'];
    
                header("location: profile.php");
                exit;
            }  
            else {
                $_SESSION['errprompt'] = 'Wrong username or password';
            }
        }
    }
?>
<!doctype html>
<html lan="en">
<head>
    <meta charset = "UTF8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title>Login - Student Information System</title>


    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>
<body>


    <section class = "center-text">
        <strong>Login</strong>

    <div class = "login-form box-center">

            <?php
                if(isset($_SESSION['prompt'])){
                    showPrompt();
                }

                if(isset($_SESSION['errprompt'])){
                    showError();
                }
            ?>
       
        <form action = "./" method = "post">
       
            <div class = "form-group">
                <lable for = "username" class = "sr-only">Username</lable>
                <input type = "text" class = "form-control" name = "username" placeholder = "Username" required autofocus>
            </div>
            <div class = "form-group">
                <lable for = "password" class = "sr-only">Password</lable>
                <input type = "password" class = "form-control" name = "password" placeholder = "Password" required autofocus>
            </div>

            <a href="register.php">Need an account?</a>
            <input class = "btn btn-primary" type = "submit" name = "login" value = "Log in">
        </form>
    </div>
     <section>


    <script src = "assets/js/jquery-3.1.1.min.js"></script>
    <script src = "assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    unset($_SESSION['prompt']);
    unset($_SESSION['errprompt']);
    
    mysqli_close($con);
    ?>