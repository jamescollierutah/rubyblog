<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/25/16
 */
session_start();
session_destroy();
header("Location: home.php?loggedOut");
?>