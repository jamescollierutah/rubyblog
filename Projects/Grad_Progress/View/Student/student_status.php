<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/25/16
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Student Status</h3>
    </div>
    <div class="panel-body">
        <div class="alert <?php echo $approved ? "alert-success" : "alert-warning"; ?>" role="alert">
            <?php echo $approved ? '<h4><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<span>Approved</span></h4>' : '<h4><span class="glyphicon glyphicon-alert"></span>&nbsp;<span>Not yet approved</span></h4>'; ?>
            <?php echo isset($dateApproved) ? '<h5>Approved by advisor on: '.$dateApproved.'</h5>' : "" ?>
        </div>
    </div>
</div>