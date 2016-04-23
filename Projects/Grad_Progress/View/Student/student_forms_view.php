<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Tigran Mnatsakanyan">
        <meta name="description" content="A page which lists forms for a given student and information about them.">
        <title>Graduate Student Due Progress</title>
        <?php include("../../View/Components/linkCSS.php"); ?>
    </head>
    <body class="center-inline">
        <!-- html5 header element -->
        <header><!-- currently just serves as a background image via base.css --> </header>
        <?php include("../../View/Components/vm_nav.php"); ?>

        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Previous Page...</a>

        <?php include("../../View/Components/hover_nav.php"); ?>

        <h1>Forms for <?php echo $studentUser; ?></h1>
        <?php

        foreach($forms as $form) {

        ?>
            <div class="info-container">
                <ul>
                    <li>
                        <span>Date Created:</span>
                        <span><?php echo $form->dateCreated; ?></span>
                    </li>
                    <li>
                        <span>Last Modified:</span>
                        <!-- later this will be a different date than the creation date -->
                        <span><?php echo $form->dateLastUpdated; ?></span>
                    </li>
                    <li>
                        <a href="../Student/edit_progress_form.php?formId=<?php echo $form->formId; ?>">Form</a>
                    </li>
                </ul>
            </div>
        <?php
        }
        ?>
    </body>

</html>