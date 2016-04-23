<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/14/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

// if they're coming from a fresh page load and not a submit, just display the default form
if(empty($_POST)) {
    include("../../View/Admin/create_user.php");
}
else if(!validationHelper::validatePost(Array("firstName", "lastName", "role"))) {
    $error = "Please fill out the form completely.";
    $values = $_POST;
    include("../../View/Admin/create_user.php");
}
else {
    $db = new dbHelper();
    // later on I'll change my user schema to have some sort of unique
    // log in name, for now I'll just let users be created as long
    // as the input was valid
    $userCreated = $db->insertUser($_POST['firstName'], $_POST['lastName']);
    $userId = $db->pdo->lastInsertId();

    // if this was a faculty user, then no further action is required
    if($_POST['role'] == "faculty") {
        include("../../View/Admin/create_user.php");
    }
    // if it's a student, we need some more information
    else {
        $values = $_POST;
        $values['userId'] = $userId;
        include("../../View/Admin/create_student.php");
    }

}