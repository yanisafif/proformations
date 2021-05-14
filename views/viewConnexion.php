<?php
require_once ('header.php');
?>
<form method="post" action="controllerStudents/connexion">
    <h2 class="text-center">Connexion</h2>
    <center>
        <table>
            <tr>
                <td>Adresse email:</td>
                <td><input type="email" name="mail" size="50" maxlength="100"></td>
            </tr>
            <tr>
                <td>Mot de passe:</td>
                <td><input type="password" name="password" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="connexion" value="Se connecter"</td>
            </tr>
        </table>
    </center>
</form>
<?php
require_once ('footer.html');
