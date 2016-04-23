<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/24/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");

htmlHelper::$title = "Registration";
htmlHelper::$description = "Student registration page.";

// fresh load
if(empty($_POST)) {
    htmlHelper::openHtml();
        htmlHelper::head();
        htmlHelper::openBody();
            htmlHelper::header();
            htmlHelper::baseNav();
            htmlHelper::openContainer();
            if(isset($_GET['noMatch'])) {
                $error = "Your passwords didn't match.";
            }
            include("../../View/Student/register.php");
            htmlHelper::closeContainer();
         htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
// empty input
else if(!validationHelper::validatePost(Array("firstName", "lastName", "userName", "password", "confirmPassword"))) {
    $error = "Please fill out the form completely";
    htmlHelper::openHtml();
        htmlHelper::head();
        htmlHelper::openBody();
            htmlHelper::header();
            htmlHelper::baseNav();
            htmlHelper::openContainer();
            if(isset($_GET['noMatch'])) {
                $error = "Your passwords didn't match.";
            }
            include("../../View/Student/register.php");
            htmlHelper::closeContainer();
        htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
// non empty input
else if (validationHelper::validatePost(Array("firstName", "lastName", "userName", "password", "confirmPassword"))) {
    // make sure passwords match
    if(strcmp($_POST['password'], $_POST['confirmPassword']) != 0) {
        header("Location: register.php?noMatch");
    }
    else {
        $db = new dbHelper();

        // encrypt password
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $userResult = $db->insertUser($_POST['firstName'], $_POST['lastName'], $_POST['userName'], $password);

        $insertUserRole = false;
        if($userResult) {
            $userId = $db->pdo->lastInsertId();
            $userRoleResult = $db->insertUserRole($userId, "student");
            header("Location: complete_student_profile.php?userId=$userId");
        }
        else {
            $error = "Failed to create user.";
            htmlHelper::openHtml();
            htmlHelper::head();
            htmlHelper::openBody();
            htmlHelper::header();
            htmlHelper::baseNav();
            htmlHelper::openContainer();
            include("../../View/Student/register.php");
            htmlHelper::closeContainer();
            htmlHelper::closeBody();
            htmlHelper::closeHtml();
        }
    }

}
