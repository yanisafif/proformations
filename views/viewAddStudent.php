<?php
require_once ('header.php'); ?>

<form action="controllerStudents/addOneStudent" method="post">
    <h2 class="text-center">Création d'un nouvau compte étudiant</h2>
    <center>
        <table>
            <tr>
                <td>INE:</td>
                <td><input type="text" name="studentINE" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Prénom:</td>
                <td><input type="text" name="firstName" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Nom:</td>
                <td><input type="text" name="lastName" size="50" maxlength="100"></td>
            </tr>
            <tr>
                <td>Adresse:</td>
                <td><input type="text" name="adress" size="50" maxlength="100"></td>
            </tr>
            <tr>
                <td>Ville:</td>
                <td><input type="text" name="city" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="mail" size="50" maxlength="80"></td>
            </tr>
            <tr>
                <td>Mot de passe:</td>
                <td><input type="password" name="password" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>Verification du mot de passe:</td>
                <td><input type="password" name="password2" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="reset" name="effacer" value="Effacer">
                <input type="submit" name="enregistrer" value="Enregistrer"></td>
            </tr>
        </table>
    </center>
</form>
<?php
require_once ('footer.html');
