<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/14/16
 *
 * Made to abstract some of the annoying code segments one has
 * to repeat when validating submission data.
 */

class validationHelper {

    /**
     * Returns false if any of the values associated with
     * any of the $keyNames are empty or not set.
     *
     * Returns true if expected values are set and not empty.
     *
     * @param $keyNames
     * @return bool
     */
    public static function validatePost($keyNames) {
        foreach($keyNames as $keyName) {
            if(!isset($_POST["$keyName"]) || empty($_POST["$keyName"])) {
                return false;
            }
        }
        return true;
    }

    public static function validateGet($keyNames) {
        foreach($keyNames as $keyName) {
            if(!isset($_GET["$keyName"]) || empty($_GET["$keyName"])) {
                return false;
            }
        }
        return true;
    }
} 