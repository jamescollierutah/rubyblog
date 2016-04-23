<?php
/**
 * Author: Tigran Mnatsakanyan
 * Date Created: 2/17/16
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Tigran Mnatsakanyan">
        <meta name="description" content="A page for creating a form for a student.">
        <title>Create a Form for a Student</title>
        <?php include("../../View/Components/linkCSS.php"); ?>
    </head>
    <body class="center-inline">
        <header><!-- currently just serves as a background image via base.css --></header>
        <?php include("../../View/Components/vm_nav.php"); ?>

        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Previous Page...</a>

        <?php include("../../View/Components/hover_nav.php"); ?>

        <?php
        if($formCreated) {
            echo "<p>Successfully created a form for " . $studentUser . ". <a href='../Student/edit_progress_form.php?userId=".$studentUser->userId."'>Click here to edit the form!</a></p>";
        }
        else {
            echo "<p>Failed to create a form for " . $studentUser . ".</p>";
        }
        ?>
    </body>
</html>