<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 1/23/16
 *
 * Student Forms Controller
 *
 * Will pull all forms for a student and call
 * appropriate views after generating objects
 * out of DB info.
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

if(validationHelper::validateGet(Array("userId"))) {
    $db = new dbHelper();
    $studentUser = $db->getStudent($_GET['userId']);
    $forms = $db->getFormsForStudent($studentUser->userId);
}
else {
    // if coming from the nav then grab the sample form, right now
    // there's only one form, I'm just trying to show some structure.
    // $form = new ProgressForm(1);
}

include("../../View/Student/student_forms_view.php");
?>