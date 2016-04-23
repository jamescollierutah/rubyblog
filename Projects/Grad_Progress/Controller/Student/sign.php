<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/18/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

if(validationHelper::validateGet(Array("studentSigned", "formId"))) {
    $db = new dbHelper();
    $studentSigned = $db->studentSignForm($_GET['formId']);
    header("Location: edit_progress_form.php?formId=".$_GET['formId']."&studentSigned=$studentSigned");
}
?>