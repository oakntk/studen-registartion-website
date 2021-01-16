<?php

    session_start();

    require 'connect.php';
    require 'functions.php';
?>

<!doctype html>
<html lan="en">
<head>
    <meta charset = "UTF8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title>Analysis- Student Information System</title>

    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>
<body>

    <section>
        <div class = "container">
            <strong class = "title">Analysis Report</strong>
        </div>

        <div class = "analyse-box box-left">

        <div style="display:flex">
                <div style="flex-basis:0;flex-grow:1;flex-shrink:1">
                    <h2>International program</h2>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>gender</th>
                        <th>course</th>
                    </tr>           
                </thead>
                <tbody>
                <?php
                
                        $query = "SELECT firstname, lastname, mobile, email, gender, course  FROM students WHERE program ='International Program'";

                        if($result = mysqli_query($con, $query)){
                            $row_num = mysqli_num_rows($result);
                            if($row_num == 0){
                                echo "<tr><td colspan='7' style='text-align:center'>No data</td></tr>";
                            }else{
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>".$row['firstname']."</td>";
                                    echo "<td>".$row['lastname']."</td>";
                                    echo "<td>".$row['mobile']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['gender']."</td>";
                                    echo "<td>".$row['course']."</td>";
                                    echo "</tr>";
                                }
                            }
                        }else{
                            die("Error with the query in data base");
                        }
                    ?>
                </tbody>
            </table>

            <div style="display:flex">
                <div style="flex-basis:0;flex-grow:1;flex-shrink:1">
                    <h2>Regular program</h2>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>gender</th>
                        <th>course</th>
                    </tr>           
                </thead>
                <tbody>
                <?php
                        $query1 = "SELECT firstname, lastname, mobile, email, gender, course  FROM students WHERE program ='Regular Program'";

                        if($result1 = mysqli_query($con, $query1)){
                            $row_num = mysqli_num_rows($result1);
                            if($row_num == 0){
                                echo "<tr><td colspan='7' style='text-align:center'>No data</td></tr>";
                            }else{
                                while($row = mysqli_fetch_assoc($result1)){
                                    echo "<tr>";
                                    echo "<td>".$row['firstname']."</td>";
                                    echo "<td>".$row['lastname']."</td>";
                                    echo "<td>".$row['mobile']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['gender']."</td>";
                                    echo "<td>".$row['course']."</td>";
                                    echo "</tr>";
                                }
                            }
                        }else{
                            die("Error with the query in data base");
                        }
                    ?>
                </tbody>
            </table>

            <div style="display:flex">
                <div style="flex-basis:0;flex-grow:1;flex-shrink:1">
                    <h2>Count</h2>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Total student International Program</th>
                        <th> Total student Regular Program</th>
                    </tr>           
                </thead>
                <tbody>
                <?php
                        $query2 = "SELECT COUNT(program) FROM students WHERE program = 'International Program'";
                        $query3 = "SELECT COUNT(program) FROM students WHERE program = 'Regular Program'";

                        if($result2 = mysqli_query($con, $query2)){
                            $row_num = mysqli_num_rows($result2);
                            if($row_num == 0){
                                echo "<tr><td colspan='7' style='text-align:center'>No data</td></tr>";
                            }else{
                                while($row = mysqli_fetch_assoc($result2)){
                                    echo "<tr>";
                                    echo "<td>".$row['COUNT(program)']."</td>";
                                }
                            }
                        }else{
                            die("Error with the query in data base");
                        }

                        if($result3 = mysqli_query($con, $query3)){
                            $row_num = mysqli_num_rows($result3);
                            if($row_num == 0){
                                echo "<tr><td colspan='7' style='text-align:center'>No data</td></tr>";
                            }else{
                                while($row = mysqli_fetch_assoc($result3)){
                                    echo "<td>".$row['COUNT(program)']."</td>";
                                    echo "</tr>";
                                }
                            }
                        }else{
                            die("Error with the query in data base");
                        }
                    ?>
                </tbody>
            </table>
    </section>

    <script src = "assets/js/jquery-3.1.1.min.js"></script>
    <script src = "assets/js/bootstrap.min.js"></script>
</body>
</html>



