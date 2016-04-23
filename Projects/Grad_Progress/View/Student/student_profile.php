<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/25/16
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Student Profile</h3>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <h4>
                <span class="label label-info">Name:</span>
                <span><?php echo $student; ?></span>
            </h4>
        </li>
        <li class="list-group-item">
            <h4>
                <span class="label label-info">University Network ID:</span>
                <span><?php echo $student->uid; ?></span>
            </h4>
        </li>
        <li class="list-group-item">
            <h4>
                <span class="label label-info">Degree:</span>
                <span><?php echo $student->degree; ?></span>
            </h4>
        </li>
        <li class="list-group-item">
            <h4>
                <span class="label label-info">Track:</span>
                <span><?php echo $student->track; ?></span>
            </h4>
        </li>
        <li class="list-group-item">
            <h4>
                <span class="label label-info">Semester Registered:</span>
                <span><?php echo $student->semAdmit; ?></span>
            </h4>
        </li>
        <li class="list-group-item">
            <h4>
                <span class="label label-info">Date Last Updated:</span>
                <span><?php echo $student->dateLastUpdated; ?></span>
            </h4>
        </li>
        <li class="list-group-item"><a href="update_profile.php">Update Profile</a></li>
    </ul>
</div>