<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/17/16
 *
 * Relies on a userId of a student relayed by choose_student admin form
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

// fresh page load
if(empty($_GET)) {
    include("../../View/Admin/create_form_choose_student.php");
}
// just in case get userid gets messed up somehow
else if(!validationHelper::validateGet("userId")) {
    //comic relief
    $error = "How did you even mess this up? It's a dropdown menu!";
    include("../../View/Admin/create_form_choose_student.php");
}
else {
    $db = new dbHelper();
    $formCreated = $db->insertProgressForm($_GET['userId']);
    $studentUser = $db->getStudent($_GET['userId']);
    include("../../View/Admin/create_form_result.php");
}

?>
