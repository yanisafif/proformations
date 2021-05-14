<?php
require ('header.php');
/*getAllCourses();*/
if(isset($message)) echo $message; ?>

<h2 class="text-center"> Liste de tous les cours </h2>
<h4 class="text-center">il y'a <?=$nbCourses?> cours dans notre base de donnée</h4>
<center>
<table border="1" class="text-center">
    <tr>
        <th>Code du cours</th>
        <th>Intitulé du cours</th>
        <th>Langue d'enseignement</th>
        <th>Modification</th>
        <th>Supression</th>
        <?php
        $ligne = $resultGetCourses->fetchAll(PDO::FETCH_NUM);
        echo '<tr>';
        foreach ($ligne as $valeur){
            echo '<td>'.$valeur[1].'</td>';
            echo '<td>'.$valeur[2].'</td>';
            echo '<td>'.$valeur[3].'</td>';

            $id = $valeur[0];
        ?>
        <td><a href="controllerCourses/getUpdateCourse/<?=$id?>">Modifier</a></td>
            <td><a href="controllerCourses/getDeleteCourse/<?=$id?>">Supprimer</a></td>
        <?php
            echo '</tr>';
        }
        echo '</table></center>';
        require ('footer.html');

