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
    <meta name="description" content="A page for choosing an advisor to list their students.">
    <title>Choose a Student</title>
    <?php include("../../View/Components/linkCSS.php"); ?>
</head>
<body class="center-inline">
<header><!-- currently just serves as a background image via base.css --> </header>
<?php include("../../View/Components/vm_nav.php"); ?>

<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Previous Page...</a>

<?php include("../../View/Components/hover_nav.php"); ?>

<h1>Select an Advisor</h1>

<p>
    This will pull up a list of the advisor's students. Not all faculty members in the drop downs advise students. At
    the time or writing, only Nishant Agarwal advises a student. I had to wipe my data because I changed my DB schema
    significantly.
</p>

<form class="centered-form" method="get" action="../Advisor/students.php">
    <div class="form-field">
        <select id="advisorId" name="advisorId">
            <?php
            foreach($facultyUsers as $facultyUser)
            { ?>
                <option value="<?php echo $facultyUser->userId; ?>"><?php echo $facultyUser; ?></option> <?php
            }
            ?>
        </select>
    </div>
    <div class="form-field">
        <input type="submit" value="View Students Advised">
    </div>
</form>

</body>
</html>