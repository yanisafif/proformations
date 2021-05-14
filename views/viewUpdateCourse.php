<?php
require ('header.php');
if(isset($message)) echo $message; ?>
<form action="controllerCourses/getUpdateCourse/<?=$data['courseid']?>" method="post">
    <h2 class="text-center"> Modification d'un cours </h2>

    <center>
        <table>
            <tr>
                <td>Code :</td>
                <td><input type="text" name="courseCode" size="50" maxlength="50" value="<?=$data['courseCode']?>"></td>
            </tr>
            <tr>
                <td>Titre :</td>
                <td><input type="text" name="courseTitle" size="50" maxlength="150" value="<?=$data['courseTitle']?>"></td>
            </tr>
            <tr>
                <td>Langue :</td>
                <td><input type="text" name="courseLanguage" size="50" maxlength="50" value="<?=$data['courseLanguage']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="reset" name="effacer" value="Effacer">
                <input type="submit" name="update" value="Enregistrer"></td>
            </tr>
        </table>
    </center>
    <input type="hidden" name="id" value="<?=$data['courseid']?>">
</form>
<?php
require ('footer.html');