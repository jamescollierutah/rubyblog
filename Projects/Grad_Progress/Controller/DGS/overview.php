<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 1/23/16
 *
 * DGS Overview Controller
 *
 * Selects all students for the advisor queried via a GET
 * parameter that should contain the advisor's user id.
 */

//require necessary models
require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");
$db = new dbHelper();
session_start();

if(isset($_SESSION['userId'])) {
    $db = new dbHelper();
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::roleNav();
    htmlHelper::openContainer();
    $advisorUsers = $db->getAllFacultyUsers();
    $studentUsers = $db->getAllStudentUsers();
    include("../../View/DGS/overview_view.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
?>