<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/25/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");

session_start();

htmlHelper::$title = "Student Status Page";
htmlHelper::$description = "A page showing the student's status.";

$db = new dbHelper();

htmlHelper::openHtml();
htmlHelper::head();
htmlHelper::openBody();
htmlHelper::header();
htmlHelper::roleNav();
htmlHelper::openContainer();
$form = $db->getLatestFormForStudent($_SESSION['userId']);

$approved = !empty($form->advisorSignature);

if($approved) {
    $dateApproved = $form->advisorSignedDate;
}

include("../../View/Student/student_status.php");
htmlHelper::closeContainer();
htmlHelper::closeBody();
htmlHelper::closeHtml();

?>