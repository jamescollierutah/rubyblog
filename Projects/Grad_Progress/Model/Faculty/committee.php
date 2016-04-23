<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/18/16
 */

class Committee {
    public $comId;
    public $userId;
    public $startDate;
    public $endDate;
    public $firstName;
    public $lastName;

    function __construct() {

    }

    function __toString() {
        return $this->firstName." ".$this->lastName;
    }
} 