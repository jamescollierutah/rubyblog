<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 1/23/16
 *
 * Progress Form Controller
 *
 * Makes objects necessary to display the form view.
 * The form's id should be passed in via GET
 */

require_once("../../Model/DB/dbHelper.php");

// the id of the ProgressForm(first parameter) will be pulled from $_GET
// when being listed on student's forms page.
if(isset($_GET['userid'])) {
    $db = new dbHelper();
    //make objects from form id that the progress_form_view depends on
    $form = new ProgressForm();
    $form = $db->getLatestFormForStudent($_GET['userId']);
    $form->constructFromId($_GET['userId']);
    $studentUser = new User();
    $studentUser->constructFromId($form->studentId);
    $student = new Student();
    $student->constructFromId($form->studentId);
    $advisor = new User();
    $advisor->constructFromId($form->advisorId);
    $feedback = $db->getFeedback($form->studentId);
}


// the view uses variables from the $student and $form objects
include("../../View/Student/progress_form_view.php");
?>
