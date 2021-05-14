<?php

require_once ('models/model.php');
function addCourse($courseCode, $courseTitle, $courseLanguage){
    $bddPDO = connexionBDD();
    $requete = $bddPDO->prepare('INSERT INTO courses(courseCode, courseTitle, courseLanguage) 
    VALUES (:courseCode, :courseTitle , :courseLanguage)');
    $requete->bindValue(':courseCode', $courseCode);
    $requete->bindValue(':courseTitle', $courseTitle);
    $requete->bindValue(':courseLanguage', $courseLanguage);

    $result = $requete->execute();
    return $result;
}

function getCourses(){
    $bddPDO = connexionBDD();
    $requete = 'SELECT * FROM courses ORDER BY courseid ASC';
    $resultGetCourses = $bddPDO->query($requete);
    return $resultGetCourses;
}

function getCourse($courseid){
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM courses WHERE courseid = '$courseid'";
    $result = $bddPDO->query($requete);
    $data = $result->fetch(PDO::FETCH_ASSOC);
    return $data;
}
function updateCourse($courseid){
    $bddPDO = connexionBDD();
    $requete = $bddPDO->prepare('UPDATE courses 
    SET courseCode = :courseCode, courseTitle = :courseTitle, courseLanguage = :courseLanguage 
    WHERE courseid = :courseid');
    $requete->bindvalue(':courseCode', $_POST['courseCode']);
    $requete->bindvalue(':courseTitle', $_POST['courseTitle']);
    $requete->bindvalue(':courseLanguage', $_POST['courseLanguage']);
    $requete->bindvalue(':courseid', $courseid);

    $resultUpdate = $requete->execute();
    return $resultUpdate;
}
function deleteCourse($courseid){
    $bddPDO = connexionBDD();
    $requete = "DELETE FROM courses WHERE courseid = '$courseid'";
    $result = $bddPDO->exec($requete);
    return $result;
}
