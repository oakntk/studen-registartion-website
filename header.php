<nav class = "navbar navbar-default">
    <div class = "container">
    <!-- Brand and toggle get grouped for better mobile display -->

        <div class = "navbar-header">
        <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#bs-example-navbar-collapse-1">
            <span class = "sr-only">Toggle navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
        </button>

        <a class = "navbar-brand" href = "profile.php">Student Information System</a>
        </div>

        <!-- Collect the nav link, forms, and other content for toggling-->
        <div class="collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
       
            <?php

                if(isset($_SESSION['username'], $_SESSION['pword'])){
            ?>
    
            <form class = "navbar-form navbar-right" action = "searchresults.php" method = "get">
                <div class="search-area">
                    <div class="form-group">
                    </div>

                <div class = "Welcome"><br><?php echo "Welcome, <a href = 'profile.php'>".$_SESSION['username']."</a>!"; ?></div>
                <a href = "logout.php">Logout<span class = "glyphicon glyphicon-off" aria-hidden = "true"></span></a>
            </form>

        <?php
                }  else{
                    echo "<span class = 'not-logged'>Not login</span>";
                }
        ?>
       </div>
    </div>
</nav>