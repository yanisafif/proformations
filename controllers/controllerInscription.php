<?php
require_once ('models/modelInscription.php');
require_once ('controllers/controllerCourses.php');
if(!$_SESSION){
    session_start();
}

function addCourseToStudent($studentid, $courseid){
    if(isset($_SESSION['studentid'])){
        $result = getCoursesStudent($studentid, $courseid);
        $nbCourses = $result->rowCount();
        if($nbCourses != 0){
            $message = "Vous êtes déjà inscris à ce cours";
            getAllCoursesStudents();
        }else{
            $result = addCourseForStudent($studentid, $courseid);
            if(!$result){
                $message = "Le cours choisi n'a pas été attribué !";
                getAllCoursesStudents();
            }else{
                $message = "Vous êtes bien inscris à ce cours";
                getAllMyCourses();
            }
        }
        require('views/error.php');
    }else{
        $message = "Vous n'êtes pas connecté pour vous inscrire à ce cours";
    }
}

function getAllMyCourses(){
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['studentid'])){
        $resultGetCourses = getMyCourse($_SESSION['studentid']);
        if(!$resultGetCourses){
            $message = "La récupération des cours a rencontré un problème";
        }else{
            $nbCourses =  $resultGetCourses->rowCount();
            if($nbCourses == 0){
                $message = "Vous êtes inscris à aucun cours!";
                getAllCoursesStudents();
            }else{
                require_once ('views/viewCoursesForStudent.php');
            }
        }
        $resultGetCourses->closeCursor();
    }
    require_once ('views/error.php');
}
function toUnsubscribeStudent($studentid, $courseid){
    if(isset($_SESSION['studentid'])) {
        $result = removeCoursesStudent($studentid, $courseid);
        if(!$result){
            $message = "La tentative de supression a echoué";

        }else{
            $message = "Vous n'etes plus inscris à ce cours";
            getAllMyCourses();
        }
    }
    require_once ('views/error.php');
}

