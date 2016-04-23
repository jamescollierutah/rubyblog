

<h1>Advised Students List</h1>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Advisor: <?php echo $advisor; ?></h2>
    </div>
    <div class="panel-body">

        <?php
        foreach($students as $index=>$student) {


            if($index % 3 == 0 && $index != 0) {
                echo '</div>';
            }

            if($index % 3 == 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?php echo $student ?></h4>
                    </div>
                    <div class="panel-body">
                        <a href="edit_progress_form.php?userId=<?php echo $student->userId; ?>">View <?php echo $student ?>'s Latest Form</a>
                    </div>
                </div>
            </div>
        <?php
        }

        ?>
    </div>
</div>

