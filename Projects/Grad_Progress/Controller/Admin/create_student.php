<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/15/16
 *
 * For now this is called after user creation if the role was student,
 * later on I'll probably add dom content via JS so I might not need two
 * separate controllers for creating a user and a student.
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

/* if trying to access directly, redirect to create user. For now,
 * this should only be called from create_user when appropriate. */
if(empty($_POST) || $studentCreated) {
    header("Location: ../Admin/create_user.php");
}
else if(!validationHelper::validatePost(Array("uid"))) {
    $error = "Please fill out the form completely.";
    $values = $_POST;
    include("../../View/Admin/create_student.php");
}
else {
    $db = new dbHelper();
    $studentCreated = $db->insertStudent($_POST['userId'], $_POST['uid'], $_POST['degree'], $_POST['track'], $_POST['semAdmit']);

    // if the student was created take them back to create user
    if($studentCreated) {
        include("../../View/Admin/create_user.php");
    }
    else {
        // if student creation failed, let's give them another chance
        include("../../View/Admin/create_student.php");
    }
}
?>
