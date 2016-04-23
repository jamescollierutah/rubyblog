<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/24/16
 */

class htmlHelper {

    public static $author = "Tigran Mnatsakanyan";
    public static $description;
    public static $title;

    static function openHtml() {
        echo "<!DOCTYPE html><html>";
    }

    static function head() {
        echo '<head>
                <meta name="author" content="'.htmlHelper::$author.'">
                <meta name="description" content="'.htmlHelper::$description.'">
                <title>'.htmlHelper::$title.'</title>
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

                <!-- Optional theme -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
                <link rel="stylesheet" href="css/bootstrap-adjustments.css">
                <!-- bootstrap requires jquery -->
                <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
                <!--<link rel="stylesheet" type="text/css" href="/css/base.css">
                <link rel="stylesheet" type="text/css" href="/css/nav.css">
                <link rel="stylesheet" type="text/css" href="/css/form.css">
                <link rel="stylesheet" type="text/css" href="/css/table.css">-->
            </head>';
    }

    static function baseNav() {
        // if the request URI doesn't have User in it
        // then they are hitting via the directory index,
        // link appropriately.
        echo '<nav class="nav navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="home.php">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                <span class="hidden-xs">Home</span>
                            </a>
                        </li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="README.html">README</a></li>
                    </ul>
                </div>
            </nav>';
    }

    static function roleNav() {
        echo '<nav class="nav navbar navbar-default navbar-fixed-top">';
        echo '<div class="container">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="home.php">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            <span class="hidden-xs">Home</span>
                        </a>
                    </li>
                ';
        if(in_array("student", $_SESSION['roles'])) {
            echo '
                  <li>
                    <a href="update_profile.php">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <span class="hidden-xs">Edit Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="student_status.php">Status</a>
                  </li>
                  <li>
                    <a href="edit_progress_form.php">Update Status</a>
                  </li>';
        }
        if(in_array("faculty", $_SESSION['roles'])) {
            echo '
                  <li>
                    <a href="students.php">Advised Students</a>
                  </li>
                  <li>
                    <a href="overview.php">Overview</a>
                  </li>';
        }
        echo '
                <li>
                    <a href="README.html">README</a>
                </li>
                <li>
                <a href="logout.php">Log Out</a>
                </li>
                </ul></div></nav>';
    }

    static function studentInfo() {

        echo "";
    }

    static function studentStatus() {

    }

    static function openBody() {
        echo "<body>";
    }

    static function openContainer() {
        echo '<div class="container">';
    }

    static function openRow() {
        echo '<div class="row">';
    }

    static function openColumnHalf() {
        echo '<div class="col-sm-6">';
    }

    static function closeColumnHalf() {
        echo '</div>';
    }

    static function closeRow() {
        echo '</div>';
    }

    static function closeContainer() {
        echo '</div>';
    }

    static function header() {
        echo "<header></header>";
    }

    static function base_nav() {

    }

    static function closeBody() {
        echo "</body>";
    }
    static function closeHtml() {
        echo "</html>";
    }
} 