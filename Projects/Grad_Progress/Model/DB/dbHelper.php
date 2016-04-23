<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/3/16
 *
 * Class dbHelper
 *
 * This class will help me perform database
 * functions in a more abstract way. PDO
 * statements can get messy, don't want them
 * hanging out everywhere.
 *
 * Plus I can change my db name easily as
 * we create different versions.
 */

require_once("../../Model/DB/dbHelper.php");
require_once("../../Model/User/user.php");
require_once("../../Model/Student/student.php");
require_once("../../Model/Student/progress_form.php");
require_once("../../Model/Student/form_activity.php");
require_once("../../Model/Student/activity.php");
require_once("../../Model/Faculty/advisor.php");
require_once("../../Model/Faculty/committee.php");

class dbHelper {
    // db info
    private $dbName = "mysql:host=localhost;dbname=Grad_Prog_V6";
    private $user = "root";
    private $password = "595414083";

    public $pdo;

    function __construct() {
        $this->pdo = new PDO($this->dbName, $this->user, $this->password);
    }

    function getUserEntry($userId) {
        $sql = "Select * from user where userId = $userId";
        return $this->pdo->query($sql)->fetch();
    }

    function getUser($userName) {
        $sql = "Select firstName, lastName, role, userId from user natural join userRoles where userName = '$userName'";
        return $this->pdo->query($sql)->fetchAll();
    }

    function getUserWithUserName($userName) {
        $sql = "Select * from user where userName = $userName";
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        $statement->execute();
        return $statement->fetch();
    }

    function getEncryptedUserPassword($userName) {
        $sql = "Select password, userId from user where userName = '".$userName."'";
        return $this->pdo->query($sql)->fetch();
    }

    function getStudentFromForm($formId) {
        $sql = "Select * from progressForm where formId = $formId";
        $form = $this->pdo->query($sql)->fetch();
        return $this->getStudent($form['userId']);
    }

    function getCommitteeForStudent($userId) {
        $sql = "Select comId, student.userId, firstName, lastName, startDate  from student
        natural join comHistory join user on(comHistory.comId=user.userId) where student.userId = $userId";

        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Committee');
        $statement->execute();
        return $statement->fetchAll();
    }

    function getFacultyUser($userId) {
        $sql = "select * from user where userId= $userId";
        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        $statement->execute();
        return $statement->fetch();
    }

    function getAdvisorForStudent($userId) {
        $sql = "Select advisorId, student.userId, firstName, lastName, startDate  from student
        natural join advisorHistory join user on(advisorId=user.userId) where student.userId = $userId order by startDate DESC";
        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Advisor');
        $statement->execute();
        return $statement->fetch();
    }

    /**
     * @param $userId
     * @return PDOStatement
     */
    function getStudentEntry($userId) {
        $sql = "Select * from student NATURAL JOIN user where userId = $userId";
        //$params = [":userId" => $userId];
        return $this->pdo->query($sql)->fetch();
    }

    function getStudent($userId) {
        $sql = "Select * from student natural join user where userId = $userId";
        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Student');
        $statement->execute();
        return $statement->fetch();
    }

    function getFormEntry($formId) {
        $sql = "Select * from progressForm where formId = $formId";
        //$params = [":formId" => $formId];
        return $this->pdo->query($sql)->fetch();
    }

    function getForm($formId) {
        $sql = "Select * from progressForm where formId = $formId";
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'ProgressForm');
        $statement->execute();
        return $statement->fetch();
    }

    function getLatestFormForStudent($userId) {
        $sql = "Select * from progressForm where userId = $userId ORDER BY dateCreated DESC limit 1";
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'ProgressForm');
        $statement->execute();
        return $statement->fetch();
    }

    function getActivities() {
        $sql = "Select * from activity";
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Activity');
        $statement->execute();
        return $statement->fetchAll();
    }

    function getActivitiesForForm($formId) {
        $sql = "Select * from formActivities natural join activity where formId = $formId";
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'FormActivity');
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * @param $userId
     * @return array of ProgressForm objects belonging to student
     */
    function getFormsForStudent($userId) {
        $sql = "Select * from progressForm where userId = $userId";
        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'ProgressForm');
        $statement->execute();
        return $statement->fetchAll();
    }

    function getStudentsForAdvisor($advisorId) {
        $sql = "Select * from student natural join advisorHistory natural join user where advisorId = $advisorId";
        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Student');
        $statement->execute();
        return $statement->fetchAll();
    }

    function getAllFacultyUsers() {
        $sql = "Select * from user natural join userRoles where role = 'faculty'";
        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        $statement->execute();
        return $statement->fetchAll();
    }

    function getAllStudentUsers() {
        $sql = "Select * from user NATURAL JOIN userRoles NATURAL JOIN student where role = 'student'";
        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        $statement->execute();
        return $statement->fetchAll();
    }

    function getFeedback($userId) {
        $sql = "Select * from feedback where userId = $userId";
        //$params = [":formId" => $formId];
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'feedback');
        $statement->execute();
        return $statement->fetch();
    }

    /** INSERT Functions **/

    /* Create a user */
    function insertUser($firstName, $lastName, $userName, $password) {
        $statement = $this->pdo->prepare("INSERT INTO user (firstName, lastName, userName, password) VALUES (:firstName, :lastName, :userName, :password)");
        $statement->bindParam(':firstName', $firstName);
        $statement->bindParam(':lastName', $lastName);
        $statement->bindParam(':userName', $userName);
        $statement->bindParam(':password', $password);
        return $statement->execute();
    }

    /* Creates a user-role relationship */
    function insertUserRole($userId, $role) {
        $statement = $this->pdo->prepare("INSERT INTO userRoles (userId, role) VALUES (:userId, :role)");
        $statement->bindParam(':userId', $userId);
        $statement->bindParam(':role', $role);
        return $statement->execute();
    }

    /**
     * @param $userId (student's id)
     * @param $uid
     * @param $degree
     * @param $track
     * @param $semAdmit
     * @param $semInProgram
     * @param $dateCreated
     * @param $dateLastUpdated
     */
    function insertStudent($userId, $uid, $degree, $track, $semAdmit) {
        $statement = $this->pdo->prepare("INSERT INTO student (userId, uid, degree, track, semAdmit)
                                         VALUES (:userId, :uid, :degree, :track, :semAdmit)");
        $uid = "u".$uid;
        $statement->bindParam(':userId', $userId);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':degree', $degree);
        $statement->bindParam(':track', $track);
        $statement->bindParam(':semAdmit', $semAdmit);
        return $statement->execute();
    }

    /**
     * @param $userId (student's id)
     * @param $facultyId
     * @param $feedBackDate
     * @param $feedbackText
     */
    function insertFeedback($userId, $facultyId, $feedBackDate, $feedbackText) {
        $statement = $this->pdo->prepare("INSERT INTO feedback (userId, facultyId, feedbackDate, feedbackText) VALUES (:userId, :facultyId, :feedbackDate, :feedbackText)");
        $statement->bindParam(':userId', $userId);
        $statement->bindParam(':facultyId', $facultyId);
        $statement->bindParam(':feedbackDate', $feedBackDate);
        $statement->bindParam(':feedbackText', $feedbackText);
        return $statement->execute();
    }

    /**
     * Creates a student-advisor relationship
     *
     * @param $advisorId
     * @param $userId (student user)
     */
    function insertAdvisor($advisorId, $userId) {
        //CURDATE() will insert the current date in 2016-02-14 format which matches my DATE type, endDate will be left null until populated
        $statement = $this->pdo->prepare("INSERT INTO advisorHistory (advisorId, userId, startDate) VALUES (:advisorId, :userId, CURDATE())");
        $statement->bindParam(':advisorId', $advisorId);
        $statement->bindParam(':userId', $userId);
        return $statement->execute();
    }

    /**
     * Creates a student-committee relationship
     *
     * @param $comId
     * @param $userId
     */
    function insertCom($comId, $userId) {
        $statement = $this->pdo->prepare("INSERT INTO comHistory (comId, userId, startDate) VALUES (:comId, :userId, CURDATE())");
        $statement->bindParam(':comId', $comId);
        $statement->bindParam(':userId', $userId);
        return $statement->execute();
    }

    function insertActivity($activityName, $acceptableProgress) {
        $statement = $this->pdo->prepare("INSERT INTO activity (activityName, acceptableProgress) VALUES (:activityName, :acceptableProgress)");
        $statement->bindParam(':activityName', $activityName);
        $statement->bindParam(':acceptableProgress', $acceptableProgress);
        return $statement->execute();
    }

    function insertFormActivity($formId, $activityId) {
        $statement = $this->pdo->prepare("INSERT INTO formActivities (formId, activityId) VALUES (:formId, :activityId)");
        $statement->bindParam(':formId', $formId);
        $statement->bindParam(':activityId', $activityId);
        return $statement->execute();
    }

    /**
     * Inserts a progress form for the student user.
     *
     * @param $userId (student's user id)
     * @return bool
     */
    function insertProgressForm($userId) {
        $statement = $this->pdo->prepare("INSERT INTO progressForm (userId, dateCreated, dateLastUpdated) VALUES (:userId, CURDATE(), CURDATE())");
        $statement->bindParam(':userId', $userId);
        return $statement->execute();
    }

    function studentSignForm($formId) {
        $statement = $this->pdo->prepare("UPDATE progressForm set studentSignature='signed', studentSignedDate=CURDATE() where formId = :formId");
        $statement->bindParam(':formId', $formId);
        return $statement->execute();
    }

    function advisorSignForm($formId) {
        $statement = $this->pdo->prepare("UPDATE progressForm set advisorSignature='signed', advisorSignedDate=CURDATE() where formId = :formId");
        $statement->bindParam(':formId', $formId);
        return $statement->execute();
    }

    function newAdvisorForStudent($advisorId, $userId) {
        $statement = $this->pdo->prepare("INSERT INTO advisorHistory (advisorId, userId, startDate)
                                         VALUES (:advisorId, :userId, CURDATE())");
        $statement->bindParam(':advisorId', $advisorId);
        $statement->bindParam(':userId', $userId);
        return $statement->execute();
    }

    function addToCommittee($facultyId, $userId) {
        $statement = $this->pdo->prepare("INSERT INTO comHistory (comId, userId, startDate)
                                         VALUES (:comId, :userId, CURDATE())");
        $statement->bindParam(':comId', $facultyId);
        $statement->bindParam(':userId', $userId);
        return $statement->execute();
    }

    function updateStudent($userId, $firstName, $lastName, $uid, $degree, $track, $semAdmit) {
        $statement = $this->pdo->prepare("UPDATE student NATURAL JOIN user set firstName=:firstName, lastName=:lastName, uid=:uid, degree=:degree, track=:track, semAdmit=:semAdmit, dateLastUpdated=CURDATE() where userId = $userId");

        $statement->bindParam(':firstName', $firstName);
        $statement->bindParam(':lastName', $lastName);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':degree', $degree);
        $statement->bindParam(':track', $track);
        $statement->bindParam(':semAdmit', $semAdmit);

        return $statement->execute();
    }

    function updateActivity($formId, $activityId, $semsTaken) {
        $statement = $this->pdo->prepare("UPDATE formActivities natural join progressForm set semsTaken=:semsTaken, dateLastUpdated=CURDATE(), advisorSignature='', advisorSignedDate='0000-00-00' where formId = $formId and activityId = $activityId");

        $statement->bindParam(':semsTaken', $semsTaken);
        error_log($statement->queryString);
        return $statement->execute();
    }

}