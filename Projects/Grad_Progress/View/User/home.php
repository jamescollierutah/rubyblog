<div class="page-header">
    <h1>Graduate Student Progress</h1>

<?php
    if($authenticated) {
        if(isset($facultyUser)) {
            echo "<h2><small>Welcome, ".$facultyUser->firstName.". Use the navigation bar
        above to perform various tasks.</small></h2>";
        }
        else if(isset($student)) {
            echo "<h2><small>Welcome, ".$student->firstName.". <small>Use the navigation bar
        above to perform various tasks.</small></h2>";
        }
    }
    else {
        echo '<h2>
                <small>Welcome, graduate student. <a href="login.php">Log in</a> or <a href="register.php">register</a>, to start your graduate progress.</small>
              </h2>';
    }
?>
</div>