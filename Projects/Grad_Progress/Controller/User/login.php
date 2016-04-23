<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/24/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");

htmlHelper::$title = "Login Page";
htmlHelper::$description = "Login page for graduate student progress tracker.";

if(empty($_POST)) {
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::baseNav();
    htmlHelper::openContainer();
    if($_GET['accountCreated'] == "true") {
        $message = "Account has been created, please log in to continue.";
    }
    include("../../View/User/login.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
else if(validationHelper::validatePost(Array("userName", "password"))) {
    $db = new dbHelper();
    $result = $db->getEncryptedUserPassword($_POST['userName']);
    if(password_verify($_POST['password'], $result['password'])) {
        $user = $db->getUser($_POST['userName']);
        $roles = Array();
        // a user might have multiple roles
        foreach($user as $roleUser) {
            array_push($roles, $roleUser['role']);
        }
        session_start();
        $_SESSION['roles'] = $roles;
        $_SESSION['firstName'] = $user[0]['firstName'];
        $_SESSION['lastName'] = $user[0]['lastName'];
        $_SESSION['userName'] = $_POST['userName'];
        $_SESSION['userId'] = $user[0]['userId'];
        Header("Location: home.php?loggedIn");
    }
    else {
        $error = "User name or password incorrect.";
        htmlHelper::openHtml();
        htmlHelper::head();
        htmlHelper::openBody();
        htmlHelper::header();
        htmlHelper::baseNav();
        htmlHelper::openContainer();
        include("../../View/User/login.php");
        htmlHelper::closeContainer();
        htmlHelper::closeBody();
        htmlHelper::closeHtml();
    }
}