<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/18/16
 *
 * Controller for editing progress forms.
 */
require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");
require_once("../../Model/HtmlHelper/htmlHelper.php");

$db = new dbHelper();

session_start();

if(isset($_SESSION['userId']) && in_array("student", $_SESSION['roles'])) {
    $student = $db->getStudent($_SESSION['userId']);
    $form = $db->getLatestFormForStudent($_SESSION['userId']);
    $activities = $db->getActivities();
    $formActivities = $db->getActivitiesForForm($form->formId);
    $committee = $db->getCommitteeForStudent($student->userId);
    $advisor = $db->getAdvisorForStudent($student->userId);
    $facultyUsers = $db->getAllFacultyUsers();

    $studentSigned = !empty($form->studentSignature);
    if($studentSigned) {
        $studentSignedDate = $form->studentSignedDate;
    }

    $advisorSigned = !empty($form->advisorSignature);
    if($advisorSigned) {
        $advisorSignedDate = $form->advisorSignedDate;
    }

    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::roleNav();
    htmlHelper::openContainer();
    $message = isset($_GET['activityUpdated']) ? "Activity Updated" : "";
    include("../../View/Student/edit_progress_form.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
else if(isset($_GET['userId'])) {
    $student = $db->getStudent($_GET['userId']);
    $form = $db->getLatestFormForStudent($_GET['userId']);
    $activities = $db->getActivities();
    $formActivities = $db->getActivitiesForForm($form->formId);
    $committee = $db->getCommitteeForStudent($student->userId);
    $advisor = $db->getAdvisorForStudent($student->userId);
    $facultyUsers = $db->getAllFacultyUsers();

    $studentSigned = !empty($form->studentSignature);
    if($studentSigned) {
        $studentSignedDate = $form->studentSignedDate;
    }

    $advisorSigned = !empty($form->advisorSignature);
    if($advisorSigned) {
        $advisorSignedDate = $form->advisorSignedDate;
    }
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::roleNav();
    htmlHelper::openContainer();
    include("../../View/Student/edit_progress_form.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}
else if(isset($_GET['formId'])) {
    $form = $db->getForm($_GET['formId']);
    $student = $db->getStudentFromForm($form->formId);
    $activities = $db->getActivities();
    $formActivities = $db->getActivitiesForForm($form->formId);
    $committee = $db->getCommitteeForStudent($student->userId);
    $advisor = $db->getAdvisorForStudent($student->userId);
    $facultyUsers = $db->getAllFacultyUsers();

    $studentSigned = !empty($form->studentSignature);
    if($studentSigned) {
        $studentSignedDate = $form->studentSignedDate;
    }

    $advisorSigned = !empty($form->advisorSignature);
    if($advisorSigned) {
        $advisorSignedDate = $form->advisorSignedDate;
    }
    htmlHelper::openHtml();
    htmlHelper::head();
    htmlHelper::openBody();
    htmlHelper::header();
    htmlHelper::roleNav();
    htmlHelper::openContainer();
    include("../../View/Student/edit_progress_form.php");
    htmlHelper::closeContainer();
    htmlHelper::closeBody();
    htmlHelper::closeHtml();
}

?>