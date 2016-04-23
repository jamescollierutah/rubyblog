<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/18/16
 *
 * Associates an activity with a form using the activity's and form's ids.
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

$db = new dbHelper();

session_start();

if(validationHelper::validatePost(Array("advisorId"))) {
    $advisorUpdated = $db->newAdvisorForStudent($_POST['advisorId'], $_SESSION['userId']);
    header("Location: edit_progress_form.php?userId=".$_GET['userId']."&advisorUpdated=".$advisorUpdated);
}
?>