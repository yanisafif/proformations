<?php
require_once ('header.php');
?>
        <br>
        <div  style="text-align: center; padding: 50px">
            <form action="index.php?action=controllerCourses/addOneCourse" method="post" >
                <H2>Ajout d'un nouveau cours</H2>
                    <table style="margin-left: auto; margin-right: auto">
                        <tr>
                            <td>Code du cours:</td>
                            <td><input type="text" name="courseCode" size="50" maxlength="50"></td>
                        </tr>
                        <tr>
                            <td>Titre du cours:</td>
                            <td><input type="text" name="courseTitle" size="50" maxlength="150"></td>
                        </tr>
                        <tr>
                            <td>Langue du cours: </td>
                            <td><input type="text" name="courseLanguage" size="50" maxlength="50"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="reset" name="effacer" value="Effacer">
                                <input type="submit" name="enregistrer" value="Enregistrer">
                            </td>
                        </tr>
                    </table>
            </form>
        </div>
<?php
require_once ('footer.html');
?>