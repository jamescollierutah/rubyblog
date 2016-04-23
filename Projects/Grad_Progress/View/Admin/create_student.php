<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/15/16
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Tigran Mnatsakanyan">
        <meta name="description" content="A page for creating a student.">
        <title>Create a Student</title>
        <?php include("../../View/Components/linkCSS.php"); ?>
    </head>
    <body class="center-inline">
        <header><!-- currently just serves as a background image via base.css --> </header>
        <?php include("../../View/Components/vm_nav.php"); ?>

        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Previous Page...</a>

        <?php include("../../View/Components/hover_nav.php"); ?>
        <?php
        if(isset($userCreated)) {
            if($userCreated) {
            ?>
                <p>New User Created Successfully!</p>
        <?php
            }
            else { ?>
                <p>Error: Failed To Create New User.</p>
            <?php
            }
        }
        ?>
        <h1>Student Information</h1>
        <?php
        if(!isset($studentCreated)) {
            echo "<p>Since you're creating a student, please fill out some additional information for ".$values['firstName']." ".$values['lastName']."</p>";
        }
        ?>
        <form class="centered-form" method="post" action="create_student.php">
            <!-- Hidden input field to pass on first name and last name if the form is filled out completely -->
            <input type="hidden" name="firstName" value="<?php echo $values['firstName']; ?>">
            <input type="hidden" name="lastName" value="<?php echo $values['lastName']; ?>">
            <input type="hidden" name="userId" value="<?php echo $values['userId']; ?>">

            <div class="form-field">
                <label for="uid">UNID:</label>
                <input id="uid" name="uid" type="text" placeholder="u0655487" value="<?php echo $values['uid']; ?>">
            </div>
            <div class="form-field">
                <label for="degree">Degree:</label>
                <select id="degree" name="degree">
                    <option <?php echo $values['degree'] == "Computer Science" ? "selected='selected'" : ""; ?> value="Computer Science">Computer Science</option>
                    <option <?php echo $values['degree'] == "Computing" ? "selected='selected'" : ""; ?> value="Computing">Computing</option>
                </select>
            </div>
            <div class="form-field">
                <label for="track">Track:</label>
                <select id="track" name="track">
                    <option <?php echo $values['track'] == "Computer Engineering" ? "selected='selected'" : ""; ?> value="Computer Engineering">Computer Engineering</option>
                    <option <?php echo $values['track'] == "Data Management and Analysis" ? "selected='selected'" : ""; ?> value="Data Management and Analysis">Data Management and Analysis</option>
                    <option <?php echo $values['track'] == "Graphics and Visualization" ? "selected='selected'" : ""; ?> value="Graphics and Visualization">Graphics and Visualization</option>
                    <option <?php echo $values['track'] == "Image Analysis" ? "selected='selected'" : ""; ?> value="Image Analysis">Image Analysis</option>
                    <option <?php echo $values['track'] == "Networked Systems" ? "selected='selected'" : ""; ?> value="Networked Systems">Networked Systems</option>
                    <option <?php echo $values['track'] == "Robotics" ? "selected='selected'" : ""; ?> value="Robotics">Robotics</option>
                    <option <?php echo $values['track'] == "Scientific Computing" ? "selected='selected'" : ""; ?> value="Scientific Computing">Scientific Computing</option>
                </select>
            </div>
            <div class="form-field">
                <!-- might change up how I'm registering their semester admitted later on -->
                <select id="semAdmit" name="semAdmit">
                    <option <?php echo $values['semAdmit'] == "Fall 2015" ? "selected='selected'" : ""; ?> value="Fall 2015">Fall 2015</option>
                    <option <?php echo $values['semAdmit'] == "Spring 2016" ? "selected='selected'" : ""; ?> value="Spring 2016">Spring 2016</option>
                </select>
            </div>
            <div class="form-field">
                <input type="submit" value="Create Student">
            </div>
        </form>
    </body>
</html>