<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 1/23/16
 *
 * Class ProgressForm
 *
 * Contains all information relative to a student's grad progress form.
 * Tied to a student by holding the id of the student to which it belongs.
 * Each progress form will have a unique combination of their $id and their $studentId,
 * the same form will not be able to have multiple students, but one student
 * will be able to have multiple forms.
 */

require_once("../../Model/DB/dbHelper.php");

class ProgressForm {
    /* I store the number of semesters they accomplished the activity in
     * using integers, this will allow use of number fields easier in the view
     * and in passing the data cleanly to the DB later on.
     */
    public $formId;
    public $userId;
    public $dateCreated;
    public $dateLastUpdated;
    public $studentSignature;
    public $studentSignedDate;
    public $advisorSignature;
    public $advisorSignedDate;

    /**
     * ProgressForm Constructor
     *
     * I leave the default constructor empty for when
     * I create objects from PDO fetchAll in Class mode.
     *
     * This constructor overrides whatever PDO fills in
     * when it makes the object from the table. I have
     * other psudeo-constructors below to make from id
     * and such.
     *
     * @param $id int (form's id)
     */
    function __construct() {

    }

    /**
     * @param $formId
     *
     * Since php doesn't allow for native multiple constructors,
     * this function must be called if trying to create a form
     * object without PDO class mode.
     */
    function constructFromId($formId) {
        $db = new dbHelper();
        $form = $db->getFormEntry($formId);

        $this->formId = $formId;
        $this->userId = $form['userId'];
        $this->dateCreated = $form['dateCreated'];
        $this->dateLastUpdated = $form['dateLastUpdated'];

        $this->studentSignature = $form['studentSignature'];
        $this->studentSignedDate = $form['studentSignedDate'];
        $this->advisorSignature = $form['advisorSignature'];
        $this->advisorSignedDate = $form['advisorSignedDate'];
    }
} 