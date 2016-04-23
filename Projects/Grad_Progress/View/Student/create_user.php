<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/24/16
 */

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

<form class="centered-form" action="create_user.php" method="post">
    <div class="form-field">
        <label for="firstName">First Name:</label>
        <input id="firstName" name="firstName" type="text">
    </div>
    <div class="form-field">
        <label for="lastName">Last Name:</label>
        <input id="lastName" name="lastName" type="text">
    </div>
    <div class="form-field">
        <label for="userName">User Name:</label>
        <input id="userName" name="userName" type="text">
    </div>
    <div class="form-field">
        <label for="password">Password:</label>
        <input id="password" name="password" type="password" pattern=".{8,}"   required title="8 characters minimum.">
    </div>
    <div class="form-field">
        <label for="confirmPassword">Confirm Password:</label>
        <input id="confirmPassword" name="confirmPassword" type="password" pattern=".{8,}"   required title="8 characters minimum.">
    </div>
    <div class="form-field">
        <input type="submit" value="Create User">
    </div>
</form>