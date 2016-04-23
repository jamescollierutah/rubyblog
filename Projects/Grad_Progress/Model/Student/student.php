<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 1/23/16
 */

require_once("../../Model/User/user.php");
require_once("../../Model/DB/dbHelper.php");

class Student extends User{

    public $firstName;
    public $lastName;
    public $userId;
    public $uid;
    public $degree;
    public $track;
    public $semAdmit;
    public $dateLastUpdated;

    function __construct() {

    }

    function constructFromId($userId) {

        $this->userId = $userId;

        $db = new dbHelper();
        $student = $db->getStudentEntry($userId);
        $this->userId = $student['userId'];
        $this->uid = $student['uid'];
        $this->degree = $student['degree'];
        $this->track = $student['track'];
        $this->semAdmit = $student['semAdmit'];
        $this->dateLastUpdated = $student['dateLastUpdated'];
    }

    function __toString() {
        return Parent::__toString();
    }
} 