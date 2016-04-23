<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/3/16
 *
 * The most basic class, just stores
 * the userId, firstName, and lastName. (for now)
 */

require_once("../../Model/DB/dbHelper.php");

class User {
    public $userId;
    public $firstName;
    public $lastName;
    public $role;

    /* construct is left empty for PDO fetch class mode. PDO will call the constructor after
     * it fills in variables from the DB, so this would override anything PDO did. */
    function __construct() {

    }

    function constructFromId($userId) {
        $this->userId = $userId;

        $db = new dbHelper();
        $user = $db->getUserEntry($userId);
        $this->firstName = $user['firstName'];
        $this->lastName = $user['lastName'];
    }

    function __toString() {
        return $this->firstName." ".$this->lastName;
    }
} 