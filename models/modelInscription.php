<?php
require_once ('models/model.php');

function addCourseForStudent($studentid, $courseid) {
    $bddPDO = connexionBDD();
    $requete = $bddPDO->prepare('INSERT INTO inscriptions(studentid, courseid, inscriptionDate) 
    VALUES (:studentid, :courseid, :inscriptionDate)');
    $requete->bindValue(':studentid', $studentid);
    $requete->bindValue(':courseid', $courseid);
    $requete->bindValue(':inscriptionDate', date('Y-m-d'));

    $result = $requete->execute();
    return $result;
}
function getMyCourse($studentid){
    $bddPDO = connexionBDD();
    $requete = "SELECT courses.courseid, courses.courseCode, courses.courseTitle, courses.courseLanguage, inscriptions.studentid, inscriptions.courseid
    FROM courses, inscriptions
    WHERE inscriptions.studentid = '$studentid' AND inscriptions.courseid = courses.courseid";

    $result = $bddPDO->query($requete);
    return $result;

}
function getCoursesStudent($studentid, $courseid){
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM inscriptions WHERE studentid = '$studentid' AND courseid = '$courseid'";
    $result = $bddPDO->query($requete);
    return $result;
}
function removeCoursesStudent($studentid, $courseid){
    $bddPDO = connexionBDD();
    $requete = "DELETE FROM inscriptions WHERE studentid = '$studentid' AND courseid = '$courseid'";
    $resultat = $bddPDO->exec($requete);
    return $resultat;
}