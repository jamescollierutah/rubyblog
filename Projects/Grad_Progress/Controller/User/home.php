<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/24/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");

htmlHelper::$title = "Home Page";
htmlHelper::$description = "Home page for graduate student progress tracker.";

session_start();

if(empty($_SESSION)) {
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::baseNav();
    htmlHelper::openContainer();
    if(isset($_GET['loggedOut'])) {
        echo '<div class="alert alert-info">You have been logged out.</div>';
    }
    include("../../View/User/home.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
else {
    $db = new dbHelper();
    $authenticated = true;
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::roleNav();
    htmlHelper::openContainer();
    if(in_array("student", $_SESSION['roles'])) {
        $student = $db->getStudent($_SESSION['userId']);
        $form = $db->getLatestFormForStudent($student->userId);
        $approved = !empty($form->advisorSignature);

        if($approved) {
            $dateApproved = $form->advisorSignedDate;
        }
        include("../../View/User/home.php");
        htmlHelper::openRow();
        htmlHelper::openColumnHalf();
        include("../../View/Student/student_profile.php");
        htmlHelper::closeColumnHalf();
        htmlHelper::openColumnHalf();
        include("../../View/Student/student_status.php");
        htmlHelper::closeColumnHalf();
        htmlHelper::closeRow();
    }
    if(in_array("faculty", $_SESSION['roles'])) {
        $facultyUser = $db->getFacultyUser($_SESSION['userId']);
        include("../../View/User/home.php");
    }
    htmlHelper::closeContainer();

    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}