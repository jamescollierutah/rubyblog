<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/18/16
 *
 * Associates a committee member to the student.
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

$db = new dbHelper();

session_start();

if(validationHelper::validatePost(Array("facultyId"))) {
    $committeeUpdated = $db->addToCommittee($_POST['facultyId'], $_SESSION['userId']);
    header("Location: edit_progress_form.php?userId=".$_SESSION['userId']."&committeeUpdated=".$committeeUpdated);
}
?>