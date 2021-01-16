<?php
    session_start();

    require 'connect.php';
    require 'functions.php';

    if(isset($_POST['update'])){
        $fname = clean($_POST['firstname']);
        $lname = clean($_POST['lastname']);
        $DOB = clean($_POST['DOB']);
        $gender = clean($_POST['gender']);
        $program = clean($_POST['program']);
        $course = clean($_POST['course']);
        $yrlevel = clean($_POST['yrlevel']);
        $addres = clean($_POST['addres']);
        $city = clean($_POST['city']);
        $country = clean($_POST['country']);
        $postalcode = clean($_POST['postalcode']);
        $mobile= clean($_POST['mobile']);
        $email = clean($_POST['email']);

        $query = "UPDATE students SET firstname = '$fname', lastname = '$lname', dob = '$DOB', gender = '$gender',
                                        program = '$program', course = '$course', yrlevel = '$yrlevel', addres = '$addres',
                                        city = '$city', country = '$country', postalcode = '$postalcode', mobile = '$mobile', email = '$email'
                                        WHERE stdno =  '".$_SESSION['stdno']."' ";

            if($result = mysqli_query($con, $query)){
                $_SESSION['prompt'] = "Profile update";
                header("location: profile.php");
                exit;
            } else{
                die("Error with query");
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
    <title>Edit Profile- Student Information System</title>


    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>
<body>

        <?php
            include 'header.php'
        ?>

        <section>
        <div class = "container">
            <strong class = "title">Edit Profile</strong>

            <div class="edit-form box-left clearfix">
                    <form action = "" method = "post">
                        <div class = "form-group">
                            <label>Student No:</label>
                            
                            <?php
                                $query = "SELECT stdno FROM students WHERE stdno = '".$_SESSION['stdno']."'";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_row($result);

                                echo "<p>$row[0]</p>";
                            ?>

                        </div>

                            <div class = "form-group">
                                <label for = "firstname">First Name</label>
                                <input type = "text" class = "form-control" name = "firstname" placeholder = "First Name" required>
                            </div>

                            <div class = "form-group">
                                <label for = "lastname">Last Name</label>
                                <input type = "text" class = "form-control" name = "lastname" placeholder = "Last Name" required>
                            </div>

                            <div class = "form-group">
                                <label for = "DOB">Date Of Birth</label>
                                <input type = "date" class = "form-control" name = "DOB" placeholder = "Date Of Birth" required>
                            </div>

                            <div class = "form-group">
                                <label for = "gender">Gender</label>
                                <select name = "gender" class = "form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                 </select>
                            </div>
                            
                            <div class = "form-group">
                                <label for = "program">Program</label>
                                <select name = "program" class = "form-control">
                                    <option>Regular Program</option>
                                    <option>International Program</option>
                                 </select>
                            </div>

                            <div class = "form-group">
                                <label for = "course">Course</label>
                                <select name = "course" class = "form-control">
                                    <option value = "Faculty of Science">Faculty of Science</option>
                                    <option value = "Faculty of Engineering">Faculty of Engineering</option>
                                    <option value = "Faculty of Medicine">Faculty of Medicine</option>
                                    <option value = "Faculty of Architecture">Faculty of Architecture</option>
                                 </select>
                            </div>
                      
                            <div class = "form-group">
                                <label for = "yrlevel">Year Level</label>
                                <select name = "yrlevel" class = "form-control">
                                    <option>1st year</option>
                                    <option>2nd year</option>
                                    <option>3rd year</option>
                                    <option>4th year</option>
                                 </select>
                            </div>

                            <div class = "form-group">
                                <label for = "addres">Address</label>
                                <input type = "text" class = "form-control" name = "addres" placeholder = "Address" required>
                            </div>

                            <div class = "form-group">
                                <label for = "city">City</label>
                                <input type = "text" class = "form-control" name = "city" placeholder = "City" required>
                            </div>

                            <div class = "form-group">
                                <label for = "country">Country</label>
                                <input type = "text" class = "form-control" name = "country" placeholder = "Country" required>
                            </div>
                      
                            <div class = "form-group">
                                <label for = "postalcode">Postal Code</label>
                                <input type = "text" class = "form-control" name = "postalcode" placeholder = "Postal Code" required>
                            </div>
                      
                            <div class = "form-group">
                                <label for = "mobile">Mobile</label>
                                <input type = "text" class = "form-control" name = "mobile" placeholder = "Mobile" required>
                            </div>
                      
                            <div class = "form-group">
                                <label for = "email">Email</label>
                                <input type = "text" class = "form-control" name = "email" placeholder = "Email" required><br>
                            </div>

                                        <a href = "addparent.php">add parent </a>

                                        <div class="form-footer">
                            <a href = "profile.php">Go back</a>
                                <input class = "btn btn-primary" type = "submit" name = "update" value ="Update Profile">
                        </div> 
                                </fieldset>
                        </div>
                    </form>
            </div>
         </div>

    <script src = "assets/js/jquery-3.1.1.min.js"></script>
    <script src = "assets/js/bootstrap.min.js"></script>
    <script scr = "assets/js/main.js"></script>
</body>
</html>

<?php
    }else{
        header("location: profile.php") ;

    }
    mysqli_close($con);
?>