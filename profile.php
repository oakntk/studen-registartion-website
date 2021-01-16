<?php

    session_start();

    require 'connect.php';
    require 'functions.php';

    if(isset($_SESSION['username'], $_SESSION['pword'])){

?>
<!doctype html>
<html lan="en">
<head>
    <meta charset = "UTF8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title>Profile- Student Information System</title>

    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>
<body>
    <?php
     include 'header.php';
    ?>

    <section>
        <div class = "container">
            <strong class = "title">My profile</strong>
        </div>

        <div class = "profile-box box-left">

         <?php

            if(isset($_SESSION['prompt'])){
                showPrompt();
            }

            $query = "SELECT * FROM students WHERE username = '".$_SESSION['username']."'AND pword = '".$_SESSION['pword']."' ";

            if($result = mysqli_query($con, $query)){
                $row = mysqli_fetch_assoc($result);

                echo"<div class = 'info'><strong>Student No:</strong> <span>".$row['stdno']."</span></div>";
                echo"<div class = 'info'><strong>Student Name:</strong> <span>".$row['firstname']." ".$row['lastname']." </span></div>";
                echo"<div class = 'info'><strong>Date of birth:</strong> <span>".$row['DOB']."</span></div>";
                echo"<div class = 'info'><strong>Gender:</strong> <span>".$row['gender']."</span></div>";
                echo"<div class = 'info'><strong>Program:</strong> <span>".$row['program']."</span></div>";
                echo"<div class = 'info'><strong>Course No:</strong> <span>".$row['course']."</span></div>";
                echo"<div class = 'info'><strong>Year level:</strong> <span>".$row['yrlevel']."</span></div>";
                echo"<div class = 'info'><strong>Address:</strong> <span>".$row['addres']."</span></div>";
                echo"<div class = 'info'><strong>City:</strong> <span>".$row['city']."</span></div>";
                echo"<div class = 'info'><strong>Country:</strong> <span>".$row['country']."</span></div>";
                echo"<div class = 'info'><strong>Postal code:</strong> <span>".$row['postalcode']."</span></div>";
                echo"<div class = 'info'><strong>Mobile:</strong> <span>".$row['mobile']."</span></div>";
                echo"<div class = 'info'><strong>Email:</strong> <span>".$row['email']."</span></div>";
              
            }   
            else{
                die("Error with the query in data base");
            }
          ?>
            
            <div style="display:flex">
                <div style="flex-basis:0;flex-grow:1;flex-shrink:1">
                    <h2>Parents</h2>
                </div>
                <div>
                    <a class="btn btn-success" href = addparent.php>+ Add Parent</a><br><br>
                </div>
            </div>
            
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Career</th>
                        <th>Relation</th>
                    </tr>           
                </thead>
                <tbody>
                    <?php
                        $stdno = $_SESSION['stdno'];
                        $query1 = "SELECT * FROM parent WHERE stdno='$stdno'";

                        if($result = mysqli_query($con, $query1)){
                            $row_num = mysqli_num_rows($result);
                            if($row_num == 0){
                                echo "<tr><td colspan='7' style='text-align:center'>No data</td></tr>";
                            }else{
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>".$row['parentFname']."</td>";
                                    echo "<td>".$row['parentLname']."</td>";
                                    echo "<td>".$row['parentTel']."</td>";
                                    echo "<td>".$row['parentEmail']."</td>";
                                    echo "<td>".$row['career']."</td>";
                                    echo "<td>".$row['relation']."</td>";
                                    echo "</tr>";
                                }
                            }
                        }else{
                            die("Error with the query in data base");
                        }
                    ?>
                </tbody>
            </table>

            <div class = "options">
                <a href = "editprofile.php" class = "btn btn-primary">Edit Profile</a>
                <a href = "changepassword.php" class = "btn btn-success">Change Password</a>
            </div>
        </div>
    </section>

    <script src = "assets/js/jquery-3.1.1.min.js"></script>
    <script src = "assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    }
    else{
        header("location: index.php");
        exit;
    }
    unset($_SESSION['prompt']);
    mysqli_close($con);
?>