<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/24/16
 */
?>
<div class="page-header">
    <h1>Graduate Student Registration</h1>
    <h1><small>Welcome, please start by creating a user name and password.</small></h1>
</div>

<?php
if(isset($error)) {
    echo '<div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            '.$error.'
          </div>';
}
?>

<form class="form-horizontal" action="register.php" method="post">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="firstName">First Name:</label>
        <div class="col-sm-4 col-md-3">
            <input class="form-control" id="firstName" name="firstName" type="text" title="Please enter a first name." required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="lastName">Last Name:</label>
        <div class="col-sm-4 col-md-3">
            <input class="form-control" id="lastName" name="lastName" type="text" title="Please enter a last name." required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="userName">User Name:</label>
        <div class="col-sm-4 col-md-3">
            <input class="form-control" id="userName" name="userName" type="text" title="Please enter a user name." required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="password">Password:</label>
        <div class="col-sm-4 col-md-3">
            <input class="form-control" id="password" name="password" type="password" pattern=".{8,}" title="8 characters minimum." required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="confirmPassword">Confirm Password:</label>
        <div class="col-sm-4 col-md-3">
            <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" pattern=".{8,}" required title="8 characters minimum." required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8 col-md-6">
            <div class="form-group row">
                <div class="col-sm-3 col-md-3">
                    <button class="btn btn-default form-control" type="submit">Submit</button>
                </div>
                <div class="col-sm-3 col-md-3">
                    <a class="btn btn-default form-control" href="home.php" role="button">Cancel</a>
                </div>
            </div>
        </div>
    </div>

</form>