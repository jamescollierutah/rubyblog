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
    include("../../View/Student/complete_student_profile.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
// they've completed their profile during registration
else if(validationHelper::validatePost(Array("userId", "uid", "degree", "track", "semAdmit"))) {
    $db = new dbHelper();
    $studentResult = $db->insertStudent($_POST['userId'], $_POST['uid'], $_POST['degree'], $_POST['track'], $_POST['semAdmit']);
    $formResult = $db->insertProgressForm($_POST['userId']);
    if($studentResult) {
        header("Location: login.php?accountCreated=true");
    }
    else {
        $error = "Failed to insert student data. Please try again.";
        htmlHelper::openHtml();
        htmlHelper::head();
        htmlHelper::openBody();
        htmlHelper::header();
        htmlHelper::baseNav();
        htmlHelper::openContainer();
        include("../../View/Student/complete_student_profile.php");
        htmlHelper::closeContainer();
        htmlHelper::closeBody();
        htmlHelper::closeHtml();
    }
}