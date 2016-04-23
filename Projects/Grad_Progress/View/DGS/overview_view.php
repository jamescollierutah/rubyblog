

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Student List</h2>
            </div>
            <div class="panel-body">
                <?php
                foreach($studentUsers as $studentUser) {

                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php echo $studentUser; ?></h4>
                        </div>
                        <div class="panel-body">
                            <a href="edit_progress_form.php?userId=<?php echo $studentUser->userId; ?>"><?php echo $studentUser ?>'s Latest Form</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Advisor List</h2>
            </div>
            <div class="panel-body">
                <?php
                foreach($advisorUsers as $advisorUser) {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php echo $advisorUser; ?></h4>
                        </div>
                        <div class="panel-body">
                            <a href="students.php?advisorId=<?php echo $advisorUser->userId; ?>"><?php echo $advisorUser ?>'s Students</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
