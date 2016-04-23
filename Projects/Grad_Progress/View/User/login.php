<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/24/16
 */
?>
<div class="page-header">
    <h1>Graduate Student Login</h1>
    <h1><small>Please enter your user name and password to log in.</small></h1>
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

<form class="form-horizontal" action="login.php" method="post">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="userName">User Name:</label>
        <div class="col-sm-3">
            <input class="form-control" name="userName" type="text" title="Please enter your user name." required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="password">Password:</label>
        <div class="col-sm-3">
            <input class="form-control" id="password" name="password" type="password" title="Please enter your password" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <button class="btn btn-default" type="submit">Log In</button>
        </div>
    </div>


</form>