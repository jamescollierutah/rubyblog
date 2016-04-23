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

if(validationHelper::validateGet(Array("formId", "activityId"))) {
    $activityInserted = $db->insertFormActivity($_GET['formId'], $_GET['activityId']);
    header("Location: edit_progress_form.php?formId=".$_GET['formId']."&activityInserted=".$activityInserted);
}
?>