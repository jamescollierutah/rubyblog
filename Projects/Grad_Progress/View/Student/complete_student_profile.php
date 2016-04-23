<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/24/16
 */
?>
<p>Please fill in some additional details about yourself.</p>

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
?>
<form class="form-horizontal" method="post" action="complete_student_profile.php">
    <input type="hidden" name="userId" value="<?php echo $_GET['userId']; ?>">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="uid">UNID:</label>
        <div class="col-sm-3 ">
            <div class="input-group">
                <span class="input-group-addon" id="unid-addon">u</span>
                <input type="text" class="form-control" id="uid" name="uid" type="text" placeholder="0123456" title="Please enter the 7 numeric digits after the 'u' in your University Network ID (UNID)
            example: 0123456" required pattern="[0-9]{7}" aria-describedby="unid-addon">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="degree">Degree:</label>
        <div class="col-sm-3">
            <select class="form-control" id="degree" name="degree">
                <option value="Computer Science">Computer Science</option>
                <option value="Computing">Computing</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="track">Track:</label>
        <div class="col-sm-3">
            <select class="form-control" id="track" name="track">
                <option value="Computer Engineering">Computer Engineering</option>
                <option value="Data Management and Analysis">Data Management and Analysis</option>
                <option value="Graphics and Visualization">Graphics and Visualization</option>
                <option value="Image Analysis">Image Analysis</option>
                <option value="Networked Systems">Networked Systems</option>
                <option value="Robotics">Robotics</option>
                <option value="Scientific Computing">Scientific Computing</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="semAdmit">Semester Admitted:</label>
        <!-- might change up how I'm registering their semester admitted later on -->
        <div class="col-sm-3">
            <select class="form-control" id="semAdmit" name="semAdmit">
                <option value="Fall 2015">Fall 2015</option>
                <option value="Spring 2016">Spring 2016</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <button class="btn btn-default" type="submit">Complete Registration</button>
        </div>
    </div>
</form>