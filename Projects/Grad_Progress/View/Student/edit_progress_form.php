<?php
/**
* Author: Tigran Mnatsakanyan
* Date Created: 2/18/16
*
* A view for editing a progress form.
*/
?>


<h2>Update Status</h2>

<p>Any update will require your advisor to re-approve your status.</p>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Advisor</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <?php echo $advisor; ?></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Choose a New Advisor</h3>
            </div>
            <div class="panel-body">
                <p>Note: If you change your advisor more than once a day, it will still show your old advisor
                    because I'm currently sorting by DATE and not DATETIME, so mysql has no bias when sorting by two advisors
                    inserted in the same day. I'll fix this in the future.</p>
                <?php if(isset($_GET['advisorUpdated'])) {
                    echo $_GET['advisorUpdated'] == 1 ? "<div class='alert alert-success'>Advisor updated!</div>" : "<div class='alert alert-danger'>Failed to update advisor</div>";
                }
                ?>
                <form class="form-horizontal" action="advisor_chosen.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="advisorId">
                                <?php
                                foreach($facultyUsers as $facultyUser) {
                                    ?>
                                    <option value="<?php echo $facultyUser->userId; ?>"><?php echo $facultyUser; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <button class="btn btn-default" type="submit">Update Advisor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Committee</h3>
            </div>
            <ul class="list-group">
                <?php
                foreach($committee as $committeeMember) {
                    ?>
                    <li class="list-group-item">
                        <?php echo $committeeMember; ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add a New Committee Member</h3>
            </div>
            <div class="panel-body">
                <?php if(isset($_GET['committeeUpdated'])) {
                    echo "<p>";
                    echo $_GET['committeeUpdated'] == 1 ? "<div class='alert alert-success'>Committee updated!</div>" : "<div class='alert alert-danger'>Failed to update Committee.</div>";
                    echo "</p>";
                }
                ?>
                <form class="form-horizontal" action="add_to_committee.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <select class="form-control" name="facultyId">
                                <?php
                                foreach($facultyUsers as $facultyUser) {
                                    ?>
                                    <option value="<?php echo $facultyUser->userId; ?>"><?php echo $facultyUser; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <button class="btn btn-default" type="submit">Add to Committee</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Activities in Progress</h3>
            </div>
            <div class="panel-body">
                <?php if(isset($_GET['activityInserted'])) {
                    echo "<p>";
                    echo $_GET['activityInserted'] == 1 ? "<div class='alert alert-success'>New activity added!</div>" : "<div class='alert alert-danger'>Failed to add new Activity.</div>";
                    echo "</p>";
                }
                ?>
                <span>Please enter how many semesters it took you to complete the activity.</span>
                <?php
                echo isset($message) ? "<p>$message</p>" : "";
                ?>
                <?php
                foreach($formActivities as $formActivity) {
                    ?>
                    <form class="form-horizontal" action="update_activity.php" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 col-md-2 control-label" for="<?php echo $formActivity->activityId; ?>">
                                <?php echo $formActivity->activityName; ?>:
                            </label>
                            <div class="col-sm-2 col-md-1">
                                <input class="form-control" id="<?php echo $formActivity->activityId; ?>" name="<?php echo $formActivity->activityId; ?>"
                                       type="number" value="<?php echo $formActivity->semsTaken; ?>">
                            </div>

                            <div class="col-sm-2">
                                <button class="btn btn-default form-control" type="submit">Update</button>
                            </div>
                            <?php
                            if(!empty($formActivity->semsTaken)) {
                                if($formActivity->semsTaken <= $formActivity->goodProgress) {
                                    echo '
                                   <div class="col-sm-3">
                                      <div class="alert alert-success">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        Good Progress!
                                      </div>
                                    </div>';
                                }
                                else if($formActivity->semsTaken <= $formActivity->acceptableProgress) {
                                    echo '
                                   <div class="col-sm-3 col-md-3">
                                      <div class="alert alert-success">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        Acceptable Progress.
                                      </div>
                                    </div>';
                                }
                                else {
                                    echo '
                                    <div class="col-sm-3 col-md-4">
                                     <div class="alert alert-warning">
                                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                                        Acceptable progress is '.$formActivity->acceptableProgress.'
                                        or less semesters.
                                      </div>
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Activity to Form</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="add_activity_to_form.php" method="get">
                    <input type="hidden" name="formId" value="<?php echo $form->formId; ?>">
                    <div class="form-group">
                        <div class="col-sm-7">
                            <select class="form-control" name="activityId">
                                <?php
                                foreach($activities as $activity) {
                                    ?>
                                    <option value="<?php echo $activity->activityId; ?>"><?php echo $activity->activityName; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-5 col-md-4">
                            <button class="btn btn-default form-control" type="submit">Add Activity</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <?php
            ?>
            <?php if(in_array("student", $_SESSION['roles'])) { ?>
                <div class="panel-heading">
                    <h3 class="panel-title">Student Signature</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="get" action="sign.php">
                        <input type="hidden" name="formId" value="<?php echo $form->formId; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="studentSigned">Student Signature <?php echo $studentSigned ? "" : ""; ?></label>
                            <div class="col-sm-3">
                                <button class="btn btn-default form-control" type="submit" id="studentSigned" name="studentSigned" <?php echo $studentSigned ? "disabled" : ""; ?>>Sign</button>
                            </div>
                            <div class="col-sm-6">
                                <?php if($studentSigned) { ?>
                                    <h4>
                                        <span class="label label-info">Date Signed:</span>
                                        <span><?php echo $studentSignedDate; ?></span>
                                    </h4>
                                <?php } else { ?>
                                    <div class="alert alert-warning">Not yet signed by <?php echo $student; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
            }
            if(in_array("faculty", $_SESSION['roles'])) { ?>
                <div class="panel-body">
                    <form class="form-horizontal" method="get" action="advisor_approve.php">
                        <input type="hidden" name="formId" value="<?php echo $form->formId; ?>">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="advisorSigned">Advisor Approval <?php echo $advisorSigned ? "" : ""; ?></label>
                            <div class="col-sm-4 col-md-3">
                                <button class="btn btn-default form-control" type="submit" id="advisorSigned" name="advisorSigned" <?php echo $advisorSigned ? "disabled" : ""; ?>>Approve</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <?php if($advisorSigned) { ?>
                                    <h4>
                                        <span class="label label-info">Date Approved:</span>
                                        <span><?php echo $advisorSignedDate; ?></span>
                                    </h4>
                                <?php } else { ?>
                                    <div class="alert alert-warning">Not yet signed by <?php echo $advisor; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


