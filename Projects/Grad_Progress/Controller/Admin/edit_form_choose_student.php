<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/17/16
 *
 * Since at this point in the project, there is no
 * authentication, this serves as a way to create a form
 * for an existing student.
 *
 * Perhaps this can be kept around as an administrative function.
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

$db = new dbHelper();

$studentUsers = $db->getAllStudentUsers();

include("../../View/Admin/edit_form_choose_student.php");

?>