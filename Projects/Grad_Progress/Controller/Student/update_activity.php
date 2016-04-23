<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/25/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");

session_start();



if(!empty($_POST)) {
    $db = new dbHelper();
    $form = $db->getLatestFormForStudent($_SESSION['userId']);
    $result = false;
    error_log(print_r($_POST, true));
    /* i'll improve this later, one for each possible activity, storing activityIds as the key name currently */
    if(isset($_POST['1'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 1, $_POST['1']);
    }
    else if(isset($_POST['2'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 2, $_POST['2']);
    }
    else if(isset($_POST['3'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 3, $_POST['3']);
    }
    else if(isset($_POST['4'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 4, $_POST['4']);
    }
    else if(isset($_POST['5'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 5, $_POST['5']);
    }
    else if(isset($_POST['6'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 6, $_POST['6']);
    }
    else if(isset($_POST['7'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 7, $_POST['7']);
    }
    else if(isset($_POST['8'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 8, $_POST['8']);
    }
    else if(isset($_POST['9'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 9, $_POST['9']);
    }
    else if(isset($_POST['10'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 10, $_POST['10']);
    }
    else if(isset($_POST['11'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 11, $_POST['11']);
    }
    else if(isset($_POST['12'])) {
        $result = $activityUpdated = $db->updateActivity($form->formId, 12, $_POST['12']);
    }
    if($result) {
        header("Location: edit_progress_form.php?activityUpdated");
    }

}

?>