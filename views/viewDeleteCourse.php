<?php
require ('header.php'); ?>
    <form action="controllerCourses/getDeleteCourse/<?=$data['courseid']?>" method="post">
        <h2 class="text-center"> Supression d'un cours </h2>

        <center>
            <table>
                <tr>
                    <td>Code :</td>
                    <td><?=$data['courseCode']?></td>
                </tr>
                <tr>
                    <td>Titre :</td>
                    <td><?=$data['courseTitle']?></td>
                </tr>
                <tr>
                    <td>Langue :</td>
                    <td><?=$data['courseLanguage']?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="delete" value="Supprimer le cours"></td>
                </tr>
            </table>
        </center>
        <input type="hidden" name="id" value="<?=$data['courseid']?>">
    </form>
<?php
require ('footer.html');