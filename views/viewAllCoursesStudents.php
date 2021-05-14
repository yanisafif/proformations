<?php
require ('header.php');
if(isset($message)) echo $message; ?>

    <h2 class="text-center"> Liste de tous les cours où je peux m'inscrire </h2>
    <h4 class="text-center">Je peux m'inscrire à <?=$nbCourses?> cours </h4>
    <center>
    <table border="1" class="text-center">
    <tr>
    <th>Code du cours</th>
    <th>Intitulé du cours</th>
    <th>Langue d'enseignement</th>
    <th>Inscription</th>
<?php
        $ligne = $resultGetCourses->fetchAll(PDO::FETCH_NUM);
        echo '<tr>';
        foreach ($ligne as $valeur){
            echo '<td>'.$valeur[1].'</td>';
            echo '<td>'.$valeur[2].'</td>';
            echo '<td>'.$valeur[3].'</td>';

            $id = $valeur[0];
            ?>
            <td><a href="controllerInscription/addCourseToStudent/<?= $_SESSION['studentid']?>/<?=$id?>">S'inscrire</a></td>
            <?php
            echo '</tr>';
        }
        echo '</table></center>';
        require ('footer.html');

