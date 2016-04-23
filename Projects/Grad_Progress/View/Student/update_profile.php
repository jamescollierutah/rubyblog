<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/25/16
 */

?>

<div class="row">
    <div class="col-sm-3">
        <h2>Student Profile</h2>
    </div>
    <div class="col-sm-6">
        <h4>
            <span class="label label-info">Date Last Updated:</span>
            <span><?php echo $student->dateLastUpdated; ?></span>
        </h4>
    </div>
</div>

<?php
if(isset($error)) {
    echo '<div class="row">
            <div class="col-sm-5">
                <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        '.$error.'
                      </div>
                </div>
            </div>
        </div>';
}
if(isset($message)) {
    echo '<div class="row">
            <div class="col-sm-5">
                <div class="alert alert-success" role="alert">
                    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                    <span class="sr-only">Message:</span>
                    '.$message.'
                </div>
            </div>
      </div>';
}
?>
<form class="form-horizontal" method="post" action="update_profile.php">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="firstName" class="label">First Name:</label>
        <div class="col-sm-3">
            <input class="form-control" id="firstName" name="firstName" type="text" value="<?php echo $student->firstName; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="lastName" class="label">Last Name:</label>
        <div class="col-sm-3">
            <input class="form-control" id="lastName" name="lastName" type="text" value="<?php echo $student->lastName; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="uid" class="label">University Network ID:</label>
        <div class="col-sm-3">
            <input class="form-control" id="uid" name="uid" type="text" value="<?php echo $student->uid; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="degree" class="label">Degree:</label>
        <div class="col-sm-3">
            <select class="form-control" id="degree" name="degree">
                <option <?php echo $student->degree == "Computer Science" ? "selected='selected'" : ""; ?> value="Computer Science">Computer Science</option>
                <option <?php echo $student->degree == "Computing" ? "selected='selected'" : ""; ?> value="Computing">Computing</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="track" class="label">Track:</label>
        <div class="col-sm-4">
            <select class="form-control" id="track" name="track">
                <option <?php echo $student->track == "Computer Engineering" ? "selected='selected'" : ""; ?> value="Computer Engineering">Computer Engineering</option>
                <option <?php echo $student->track == "Data Management and Analysis" ? "selected='selected'" : ""; ?> value="Data Management and Analysis">Data Management and Analysis</option>
                <option <?php echo $student->track == "Graphics and Visualization" ? "selected='selected'" : ""; ?> value="Graphics and Visualization">Graphics and Visualization</option>
                <option <?php echo $student->track == "Image Analysis" ? "selected='selected'" : ""; ?> value="Image Analysis">Image Analysis</option>
                <option <?php echo $student->track == "Networked Systems" ? "selected='selected'" : ""; ?> value="Networked Systems">Networked Systems</option>
                <option <?php echo $student->track == "Robotics" ? "selected='selected'" : ""; ?> value="Robotics">Robotics</option>
                <option <?php echo $student->track == "Scientific Computing" ? "selected='selected'" : ""; ?> value="Scientific Computing">Scientific Computing</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="semAdmit" class="label">Semester Registered:</label>
        <div class="col-sm-3">
            <select class="form-control" id="semAdmit" name="semAdmit">
                <option <?php echo $student->semAdmit == "Fall 2015" ? "selected='selected'" : ""; ?> value="Fall 2015">Fall 2015</option>
                <option <?php echo $student->semAdmit == "Spring 2016" ? "selected='selected'" : ""; ?> value="Spring 2016">Spring 2016</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <button class="btn btn-default" type="submit">Save</button>
        </div>
    </div>
</form>
