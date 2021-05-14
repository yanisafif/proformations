<?php
require_once ('models/modelCourses.php');
if(!isset($_SESSION)){
    session_start();
}


function addOneCourse(){
    if (isset($_POST['enregistrer'])){
        if(!empty($_POST['courseCode']) && !empty($_POST['courseTitle']) && !empty($_POST['courseLanguage'])){
            addCourse($_POST['courseCode'], $_POST['courseTitle'], $_POST['courseLanguage']);
        }else{
            echo 'Tous les champs sont requis !';
        }
    }
    require_once ('views/viewCourse.php');
}
function getAllCourses(){
    // On appel la fonction qui est dans notre model
    $resultGetCourses = getCourses();
    // On vérifie si tout se passe bien
    if(!$resultGetCourses){
        $message = 'La récupération des cours n\'a pas aboutit !';
    }else{
        // Methode qui permet de compter combien entrer il y a dans cours
        $nbCourses = $resultGetCourses->rowCount();
        if($nbCourses == 0){
            $message = "Il n'y a aucun cours pour le moment!";
            addOneCourse();
        }else{
            require_once ('views/viewAllCourses.php');
        }
    }
    // Methode qui libère la connexion au serveur permet donc à d'autres requete sql d'être executé
    $resultGetCourses->closeCursor();
}

function getUpdateCourse($courseid){
    $data = getCourse($courseid);
    if(!$data){
        $message = "Aucun cours !";
    }else{
        require_once ('views/viewUpdateCourse.php');
    }
    if(isset($_POST['update'])){
        if(!empty($_POST['courseCode']) && !empty ($_POST['courseTitle']) && !empty($_POST['courseLanguage'])){
            $resultUpdate = updateCourse($courseid);
            if(!$resultUpdate){
                $message = "Un problème est survenu, les mises à jours n'ont pas été pris en compte";
                header('Location:controllerCourses/getAllCourses');
            }else{
                $message = "Les mises à jour ont été bien pris en compte";
            }
        }else{
            $message = "Tous les champs sont requis !";
        }
        require_once ('views/error.php');
    }
}
function getDeleteCourse($courseid){
    $data = getCourse($courseid);
    if (!$data){
        $message = "Aucun cours à supprimer";
    }else{
        require_once ('views/viewDeleteCourse.php');
    }
    if (isset($_POST['delete'])){
        $resultDelete = deleteCourse($courseid);
        if(!$resultDelete){
            $message = "Un problème est survenu, le cours n'a pas été suprimé";
        }else{
            $message = "Le cours a été bien supprimé";
        }
    }
    require_once ('views/error.php');
}

function getAllCoursesStudents(){
    if(!isset($_SESSION)){
        $message = "Vous devez être connecté";
        require_once ('views/viewConnexion.php');
    }else{
        $resultGetCourses = getCourses();
        if(!$resultGetCourses){
            $message = 'La récupération des cours n\'a pas aboutit !';
        }else{
            // Methode qui permet de compter combien entrer il y a dans cours
            $nbCourses = $resultGetCourses->rowCount();
            if($nbCourses == 0){
                $message = "Il n'y a aucun cours pour le moment!";
            }else{
                require_once ('views/viewAllCoursesStudents.php');
            }
        }
        $resultGetCourses->closeCursor();
    }

}