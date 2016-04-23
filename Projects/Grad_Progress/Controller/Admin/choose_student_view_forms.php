<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/18/16
 *
 * Since at this point in the project, there is no
 * authentication, this serves as a way to cchoose a student
 * to display a list of forms for.
 *
 * I'm moving towards not having to have multiple forms but
 * rather keeping track of modular changes to the forms, but
 * I figure I have to keep this around for now and it might come
 * in handy.
 *
 * Perhaps this can be kept around as an administrative function.
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

$db = new dbHelper();

$studentUsers = $db->getAllStudentUsers();

include("../../View/Admin/choose_student_view_forms.php");

?>