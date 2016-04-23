<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 1/23/16
 *
 * Advisor Student's List Controller
 */
//include necessary model definitions
require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");

/* I'll eventually pull all of the students from the DB,
 * iterate through them, and call a more modular view to render
 * the html for each student and his forms, for now I just
 * have a default student and the default form.
 */

session_start();

if(isset($_GET['advisorId'])) {
    $db = new dbHelper();
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::roleNav();
    htmlHelper::openContainer();
    $advisor = $db->getFacultyUser($_GET['advisorId']);
    $students = $db->getStudentsForAdvisor($_GET['advisorId']);
    include("../../View/Advisor/students_view.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
else if(isset($_SESSION['userId'])) {
    $db = new dbHelper();
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::roleNav();
    htmlHelper::openContainer();
    $advisor = $db->getFacultyUser($_SESSION['userId']);
    $students = $db->getStudentsForAdvisor($_SESSION['userId']);
    include("../../View/Advisor/students_view.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}


?>