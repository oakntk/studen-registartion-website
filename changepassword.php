<?php
    session_start();

    require 'connect.php';
    require 'functions.php';

    if(isset($_POST['update'])){
        $oldpass = clean($_POST['oldpass']);
        $newpass = clean($_POST['newpass']);
        $confirmpass =  clean($_POST['confirmpass']);

        $query = "SELECT pword FROM students WHERE pword = '$oldpass";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 0){

            if($newpass == $confirmpass){
                $query = "UPDATE students SET pword = '$newpass' WHERE stdno = '".$_SESSION['stdno']."'";

                if($result = mysqli_query($con, $query)){
                    $_SESSION['prompt'] = "Password update";
                    $_SESSION['pword'] = $newpass;
                    header("location: profile.php");
                    exit;

                } else{
                    die("Error with query");
                } 
                } else {
                    $_SESSION['errprompt'] = "The new password doesn't match";
                }
            }

         else {
            $_SESSION['errprompt'] = "You've entered wrong password";
        }
    }
    if(isset($_SESSION['username'], $_SESSION['pword'])){

?>
<!doctype html>
<html lan="en">
<head>
    <meta charset = "UTF8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title>Change Password- Student Information System</title>


    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>
<body>

    <?php
        include 'header.php'
    ?>
        <section>
        <div class = "container">
            <strong class = "title">Change password</strong>
        </div>

            <div class="edit-form box-left clearfix">

            <?php
                if(isset($_SESSION['errprompt'])){
                    showError();
                }
            ?>

                    <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">

                        <div class = "form-group">
                            <lable for = "oldpass">Old Password</lable>
                            <input type = "password" class = "form-contrl" name = "oldpass" placeholder = "Old Password" required>
                        </div>

                        <div class = "form-group">
                            <lable for = "newpass">New Password</lable>
                            <input type = "password" class = "form-contrl" name = "newpass" placeholder = "New Password" required>
                        </div>

                        <div class = "form-group">
                            <lable for = "confirmpass">Confirm Password</lable>
                            <input type = "password" class = "form-contrl" name = "confirmpass" placeholder = "Confirm Password" required>
                        </div>

                        <div class = "form-footer">
                            <a href = "profile.php">Go back</a>
                            <input class = "btn btn-primary" type = "submit" name = "update" value = "Update Password">
                        </div>

                    </form>
            </div>
        
        </section>

    <script src = "assets/js/jquery-3.1.1.min.js"></script>
    <script src = "assets/js/bootstrap.min.js"></script>
    <script scr = "assets/js/main.js"></script>
</body>
</html>

<?php
    } else{
        header("location: profile.php");
    }
    unset($_SESSION['errprompt']);
    mysqli_close($con);
    
?>