<?php
    session_start();

    require 'connect.php';
    require 'functions.php';

    if(isset($_POST['register'])){
        
        $uname = clean($_POST['username']);
        $pword = clean($_POST['pword']);
        $stdno = clean($_POST['stdno']);
        $fname = clean($_POST['firstname']);
        $lname = clean($_POST['lastname']);
        $DOB = clean($_POST['DOB']);
        $gender = clean($_POST['gender']);
        $addres = clean($_POST['addres']);
        $city = clean($_POST['city']);
        $country = clean($_POST['country']);
        $postalcode = clean($_POST['postalcode']);
        $mobile= clean($_POST['mobile']);
        $email = clean($_POST['email']);

        $query = "SELECT username FROM students WHERE username = '$uname'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 0){
                $query = "SELECT stdno FROM students WHERE username = '$uname'";
                $result = mysqli_query($con , $query);
            
        if(mysqli_num_rows($result) == 0){
            $query = "INSERT INTO students (username, pword, stdno, firstname, lastname, DOB, gender, program, course, yrlevel, addres, city, country, postalcode, mobile, email) VALUES ('$uname', '$pword', '$stdno', '$fname', '$lname', '$DOB', '$gender', '', '', '', '$addres', '$city', '$country' ,'$postalcode', '$mobile', '$email')";

            if(mysqli_query($con, $query)){
                $_SESSION['prompt'] = "Account registered.";
                header("location: index.php");
                exit;

            } else {
                die("error with query");
            }

        } else {
            $_SESSION['errprompt'] = "student number already exist.";
        }

            
     }  else {
        $_SESSION['errprompt'] = "Username already exists.";
    }
}
?>

<!doctype html>
<html lan="en">
<head>
    <meta charset = "UTF8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title>Register- Student Information System</title>

    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>

<body>

        <section class =  "center-text">
        <strong>Register</strong>

        <div class = "registration-form box-center clearfix">

        <?php
            if(isset($_SESSION['errprompt'])){
                showError();
            }
        ?>

            <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> " method = "post">
                <div class = "row">
                    <div class="account-info col-sm-6">
                        <fieldset>
                            <legend>Account Info</legend>

                                <div class = "form-group">
                                    <label for = "username">Username</label>
                                    <input type = "text" class = "form-control" name = "username" placeholder = "Username (must be unique)">
                                </div>

                                <div class = "form-group">
                                    <label for = "pword">Password</label>
                                    <input type = "password" class = "form-control" name = "pword" placeholder = "Passwprd" required>
                                </div>
                         </fieldset>
                    </div><!-- account info-->

                            <div class="personal-info col-s,-6">
                                <fieldset>
                                    <legend>Personal Info</legend>

                                        <div class = "form-group">
                                        <label for = "stdno">Student no</label>
                                         <input type = "text" class = "form-control" name = "stdno" placeholder = "Student Number (must be unique)" require>
                                        </div>   

                                         <div class = "form-group">
                                        <label for = "firstname">Firstname</label>
                                         <input type = "text" class = "form-control" name = "firstname" placeholder = "First name" required>
                                        </div>         

                                         <div class = "form-group">
                                        <label for = "lastname">Lastname</label>
                                         <input type = "text" class = "form-control" name = "lastname" placeholder = "Last name" required>
                                        </div>   

                                        <div class = "form-group">
                                        <label for = "DOB">Date of birth</label>
                                         <input type = "date" class = "form-control" name = "DOB" placeholder = "Date of birth(mm/dd/yyyy)" require>
                                        </div>   

                                        <div class = "form-group">
                                        <label for = "gender">Gender</label>
                                        <select name = "gender" class = "form-control">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                        </div>   

                                        <div class = "form-group">
                                        <label for = "addres">Address</label>
                                         <input type = "text" class = "form-control" name = "addres" placeholder = "Address">
                                        </div>   
                                        
                                        <div class = "form-group">
                                        <label for = "city">City</label>
                                         <input type = "text" class = "form-control" name = "city" placeholder = "City">
                                        </div>   

                                        <div class = "form-group">
                                        <label for = "country">Country</label>
                                         <input type = "text" class = "form-control" name = "country" placeholder = "Country">
                                        </div>   

                                        <div class = "form-group">
                                        <label for = "postalcode">Postal Code</label>
                                         <input type = "text" class = "form-control" name = "postalcode" placeholder = "Postal code">
                                        </div>   


                                        <div class = "form-group">
                                        <label for = "mobile">Mobile</label>
                                         <input type = "text" class = "form-control" name = "mobile" placeholder = "Mobile">
                                        </div>   

                                        <div class = "form-group">
                                        <label for = "email">Email</label>
                                         <input type = "text" class = "form-control" name = "email" placeholder = "Email" require>
                                        </div>   

                                </fieldset>
                            </div>
                    </div>
                <a href = "index.php">Back</a>
                <input class = "btn btn-primary" type = "submit" name = "register" value = "Register">
           </form>
         </div>
        </section>
  

    <script src = "assets/js/jquery-3.1.1.min.js"></script>
    <script src = "assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    unset($_SESSION['errprompt']);
    mysqli_close($con);
?>