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
    <meta name="description" content="A page for choosing a student to view all of their forms.">
    <title>Choose a Student</title>
    <?php include("../../View/Components/linkCSS.php"); ?>
</head>
<body class="center-inline">
<header><!-- currently just serves as a background image via base.css --> </header>
<?php include("../../View/Components/vm_nav.php"); ?>

<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Previous Page...</a>

<?php include("../../View/Components/hover_nav.php"); ?>

<h1>Select a Student</h1>

<p>
    A list of all of the student's forms will be displayed.
    (you can create some additional forms in the Create a Form for A Student page,
    linked in the hover nav) I had to wipe my data, I'll fill in new data as I can.
</p>

<form class="centered-form" method="get" action="../Student/student_forms.php">
    <div class="form-field">
        <select id="userId" name="userId">
            <?php
            foreach($studentUsers as $student)
            { ?>
                <option value="<?php echo $student->userId; ?>"><?php echo $student; ?></option> <?php
            }
            ?>
        </select>
    </div>
    <div class="form-field">
        <input type="submit" value="View Forms">
    </div>
</form>

</body>
</html>