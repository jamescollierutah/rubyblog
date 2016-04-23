<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Tigran Mnatsakanyan">
        <meta name="description" content="Displays graduate due progress form and will ultimately be editable by certain users.">
        <title>Graduate Student Due Progress Advisory Document for Ph.D. Degree</title>
        <?php include("../../View/Components/linkCSS.php"); ?>
    </head>
    <body>
        <!-- html5 header element -->
        <header><!-- currently just serves as a background image via base.css --> </header>
        <?php include("../../View/Components/vm_nav.php"); ?>

        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Previous Page...</a>

        <?php include("../../View/Components/hover_nav.php"); ?>

        <h1>Due Progress Advisory Document for Ph.D. Degree</h1>
        <!-- setting up a read only form skeleton, form elements will be read-only for assignment one. -->
        <form>
            <!-- I'll just use a table to lay out the fields for now, later I'll probably move it in to some custom styled divs -->
            <table class="paper-like-table">
                <!-- html5 label tag, is binded by assigning for to the id of an element -->
                <tbody>
                    <tr>
                        <td>
                            <label for="date">Date:</label>
                        </td>
                        <td>
                            <input type="date" id="date" value="<?php echo $form->dateCreated; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="student_name">Student Name:</label>
                        </td>
                        <td>
                            <input type="text" id="student_name" value="<?php echo $studentUser ?>" readonly>
                        </td>
                        <td>
                            <label for="student_uid">Student ID#:</label>
                        </td>
                        <td>
                            <input type="text" id="student_uid" value="<?php echo $student->uid; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Degree:</label>
                        </td>
                    </tr>
                    <tr class="indented-row">
                        <td>
                            <label for="computing">Computing:</label>
                        </td>
                        <td>
                            <input type="checkbox" id="computing" <?php echo $student->degree == "Computing" ? 'checked="checked"' : "" ?> readonly>
                        </td>
                        <td>
                            <label for="computer_science">Computer Science:</label>
                        </td>
                        <td>
                            <input type="checkbox" id="computer_science" <?php echo $student->degree == "Computer Science" ? 'checked="checked"' : "" ?> readonly>
                        </td>
                        <td>
                            <label for="track">Track:</label>
                        </td>
                        <td>
                            <input class="long-input" type="text" id="track" value="<?php echo $student->track; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="semester_admitted">Semester Admitted:</label>
                        </td>
                        <td>
                            <input type="text" id="semester_admitted" value="<?php echo $student->semAdmit; ?>" readonly>
                        </td>
                        <td>
                            <label for="number_of_semesters"># of semesters in the program:</label>
                        </td>
                        <td>
                            <input type="number" id="number_of_semesters" value="<?php echo $student->semInProgram; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="advisor">Advisor:</label>
                        </td>
                        <td>
                            <input type="text" id="advisor" value="<?php echo $advisor; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Committee:</label>
                        </td>
                        <td>
                            <input type="text" id="member1" value="<?php echo $form->com1;   ?>" readonly>
                            <input type="text" id="member2" value="<?php echo $form->com2;   ?>" readonly>
                            <input type="text" id="member3" value="<?php echo $form->com3; ?>" readonly>
                            <input type="text" id="member4" value="<?php echo $form->com4;  ?>" readonly>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- I used this table generator to make the second table more quickly: http://www.rapidtables.com/web/tools/html-table-generator.htm -->
            <table class="old-school-table" border="1">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Good Progress</th>
                        <th>Acceptable Progress</th>
                        <th>Number of Semesters Taken</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Identify Adisor</td>
                    <td>1 semester</td>
                    <td>2 semesters</td>
                    <td><?php echo $form->advisorIdentified; ?></td>
                </tr>
                <tr>
                    <td>Program of study approved by advisor and initial committee</td>
                    <td>4 semesters</td>
                    <td>5 semesters</td>
                    <td><?php echo $form->progApprByAdvisor; ?> Semesters</td>
                </tr>
                <tr>
                    <td>Complete teaching mentorship</td>
                    <td>4 semesters</td>
                    <td>6 semesters</td>
                    <td><?php echo $form->mentorship; ?> Semesters</td>
                </tr>
                <tr>
                    <td>Complete required courses</td>
                    <td>5 semesters</td>
                    <td>6 semesters</td>
                    <td><?php echo $form->requiredCourses; ?> Semesters</td>
                </tr>
                <tr>
                    <td>Full committee formed</td>
                    <td>6 semesters</td>
                    <td>7 semesters</td>
                    <td><?php echo $form->comFormed; ?> Semesters</td>
                </tr>
                <tr>
                    <td>Program of Study approved by committee</td>
                    <td>6 semesters</td>
                    <td>7 semesters</td>
                    <td><?php echo $form->progApprByCom; ?> Semesters</td>
                </tr>
                <tr>
                    <td>Written qualifier</td>
                    <td>5 semesters</td>
                    <td>6 semesters</td>
                    <td><?php echo $form->writtenQualifier; ?> Semesters</td>
                </tr>
                <tr>
                    <td>Oral qualifier/Proposal</td>
                    <td>7 semesters</td>
                    <td>8 semesters</td>
                    <td><?php echo $form->oralQualifier; ?> Semesters</td>
                </tr>
                <tr>
                    <td>Dissertation Defense</td>
                    <td>10 semesters</td>
                    <td>12 semesters</td>
                    <td><?php echo $form->dissertDef; ?> Semesters</td>
                </tr>
                <tr>
                    <td>Final Document</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><?php echo $form->isFinalDoc ? "Yes" : "No"; ?></td>
                </tr>
                <tbody>
            </table>
            <!-- an ordered list for the questions at the bottom -->
            <ol>
                <li>
                    <!-- I'll be using radio buttons for this since it's a one-choice-only sort of deal -->
                    <!-- using a span because it's naturally inline, and I want these all on the same line -->
                    <span>Has the student met due progress requirements?</span>
                    <label for="has_met">Yes</label>
                    <input type="radio" name="has_met_requirements" id="has_met" value="Yes" <?php echo $form->inCompliance ? 'checked="checked"' : "" ?> readonly>
                    <label for="has_not_met">No</label>
                    <input type="radio" name="has_met_requirements" id="has_not_met" value="No" <?php echo !$form->inCompliance ? 'checked="checked"' : "" ?> readonly>
                </li>
                <li>
                    <!-- making it a p so the next thing will show on the line below -->
                    <p>Describe the progress the student has made during the past year.</p>
                    <!-- http://www.w3schools.com/tags/tag_textarea.asp -->
                    <textarea rows="5" cols="75" readonly><?php echo $feedback->feedbackText; ?></textarea>
                </li>
            </ol>
            <table class="signature-table">
                <tbody>
                    <tr>
                        <td>
                            <input type="text" id="student_signature" value="<?php echo $form->studentSignature; ?>" readonly>
                            <label for="student_signature">Student Signature</label>
                        </td>
                        <td>
                            <input type="date" id="student_date" value="<?php echo $form->studentSignedDate == "0000-00-00" ? "" : $form->studentSignedDate; ?>" readonly>
                            <label for="student_date">Date</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="advisor_signature" value="<?php echo $form->advisorSignature; ?>" readonly>
                            <label for="advisor_signature">Advisor Signature</label>
                        </td>
                        <td>
                            <input type="date" id="advisor_date" value="<?php echo $form->advisorSignedDate == "0000-00-00" ? "" : $form->advisorSignedDate; ?>" readonly>
                            <label for="advisor_date">Date</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
