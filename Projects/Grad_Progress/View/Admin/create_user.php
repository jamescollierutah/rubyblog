<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/14/16
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Tigran Mnatsakanyan">
        <meta name="description" content="A page for creating a user.">
        <title>Create a User</title>
        <?php include("../../View/Components/linkCSS.php"); ?>
    </head>
    <body class="center-inline">
        <header><!-- currently just serves as a background image via base.css --> </header>
        <?php include("../../View/Components/vm_nav.php"); ?>

        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Previous Page...</a>

        <?php include("../../View/Components/hover_nav.php"); ?>

        <?php
        if(isset($error)) {
            echo "<p>$error</p>";
        }
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
        else if(isset($studentCreated)) {
            if($studentCreated) {
                ?>
                <p>New Student Created Successfully!</p>
            <?php
            }
            else { ?>
                <p>Error: Failed To Create New Student.</p>
            <?php
            }
        } ?>

        <h1>Create a User</h1>

        <form class="centered-form" action="create_user.php" method="post">
            <div class="form-field">
                <label for="firstName">First Name:</label>
                <input id="firstName" name="firstName" type="text" value="<?php echo !empty($values) ? $values['firstName'] : ""; ?>">
            </div>
            <div class="form-field">
                <label for="lastName">Last Name:</label>
                <input id="lastName" name="lastName" type="text" value="<?php echo !empty($values) ? $values['lastName'] : ""; ?>">
            </div>
            <div class="form-field">
                <label for="role">Role:</label>
                <select id="role" name="role">
                    <option <?php echo $values['role'] == "faculty" ? "selected=selected" : ""; ?> value="faculty">
                        Faculty
                    </option>
                    <option <?php echo $values['role'] == "student" ? "selected=selected" : ""; ?> value="student">
                        Student
                    </option>
                </select>
            </div>
            <div class="form-field">
                <input type="submit" value="Create User">
            </div>
        </form>
    </body>
</html>