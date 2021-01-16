<?php
    session_start();

    require 'connect.php';
    require 'functions.php';

    if(isset($_POST['add'])){
        $stdno = $_SESSION['stdno'];
        $parentFname = clean($_POST['parentFname']);
        $parentLname = clean($_POST['parentLname']);
        $parentTel = clean($_POST['parentTel']);
        $parentEmail = clean($_POST['parentEmail']);
        $career = clean($_POST['career']);
        $relation = clean($_POST['relation']);

        $query = "INSERT INTO parent VALUES('$stdno',NULL,'$parentFname','$parentLname','$parentTel','$parentEmail','$career','$relation')";
        
    
    if($result = mysqli_query($con, $query)){
    $_SESSION['prompt'] = "parent added";
    header("location: profile.php");
    exit;
    } else{
        // die("Error with query");
        die($query);
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
    <title>Register- Student Information System</title>

    
    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>
<body>

    <?php
     include 'header.php';
    ?>
     <fieldset>
            <div class = "container">
            <strong class = "title">Add parent information</strong>
    
             <div class="edit-form box-left clearfix"></div>
             <form action="" method = "post">
                    
                     <div class = "form-group">
                    <label for = "parentFname">Parent first name</label>
                        <input type = "text" class = "form-control" name = "parentFname" placeholder = "Parent first name" required>
                    </div>   

                        <div class = "form-group">
                       <label for = "parentLname">Parent last name</label>
                          <input type = "text" class = "form-control" name = "parentLname" placeholder = "Parent last name" required>
                      </div>   

                     <div class = "form-group">
                      <label for = "parentTel">Parent Tel</label>
                    <input type = "text" class = "form-control" name = "parentTel" placeholder = "Parent Tel" required>
                        </div>   

                       <div class = "form-group">
                     <label for = "parentEmail">Parent Email</label>
                      <input type = "text" class = "form-control" name = "parentEmail" placeholder = "Parent Email" required>
                        </div>   

                      <div class = "form-group">
                         <label for = "career">Career</label>
                       <input type = "text" class = "form-control" name = "career" placeholder = "Career" required>
                        </div>   
                        
                        <div class = "form-group">
                         <label for = "relation">Relation</label>
                       <input type = "text" class = "form-control" name = "relation" placeholder = "Relation" required>
                        </div>   

                        <a href = "profile.php">Go back</a>
                     <input class = "btn btn-primary" type = "submit" name = "add" value ="Add ">
                </div> 
                </form>
         </div>
                                    
     </fieldset>

    <script src = "assets/js/jquery-3.1.1.min.js"></script>
    <script src = "assets/js/bootstrap.min.js"></script>
    <script scr = "assets/js/main.js"></script>
</body>
</html>
<?php
}
    else{
        header("location: profile.php");
        exit;
    }
    unset($_SESSION['prompt']);
    mysqli_close($con);
?>