
<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/18/16
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/Validation/validationHelper.php");

if(validationHelper::validateGet(Array("advisorSigned", "formId"))) {
    $db = new dbHelper();
    $advisorSigned = $db->advisorSignForm($_GET['formId']);
    header("Location: edit_progress_form.php?formId=".$_GET['formId']."&advisorSigned=$advisorSigned");
}
?>