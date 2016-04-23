<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/25/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");

session_start();

htmlHelper::$title = "Update Profile Page";
htmlHelper::$description = "A page where a student user can update their info.";

$db = new dbHelper();

if(empty($_POST)) {
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::roleNav();
    htmlHelper::openContainer();
    $student = $db->getStudent($_SESSION['userId']);
    include("../../View/Student/update_profile.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
else {
    $studentUpdated = $db->updateStudent($_SESSION['userId'], $_POST['firstName'], $_POST['lastName'],
                                        $_POST['uid'], $_POST['degree'], $_POST['track'], $_POST['semAdmit']);
    if($studentUpdated) {
        $message = "Your profile has been updated.";
        htmlHelper::openHtml();
        htmlHelper::head();
        htmlHelper::openBody();
        htmlHelper::header();
        htmlHelper::roleNav();
        htmlHelper::openContainer();
        $student = $db->getStudent($_SESSION['userId']);
        include("../../View/Student/update_profile.php");
        htmlHelper::closeContainer();
        htmlHelper::closeBody();
        htmlHelper::closeHtml();
    }
    else {
        $message = "Failed to update your profile.";
        htmlHelper::openHtml();
        htmlHelper::head();
        htmlHelper::openBody();
        htmlHelper::header();
        htmlHelper::roleNav();
        htmlHelper::openContainer();
        $student = $db->getStudent($_SESSION['userId']);
        include("../../View/Student/update_profile.php");
        htmlHelper::closeContainer();
        htmlHelper::closeBody();
        htmlHelper::closeHtml();
    }

}

?>
