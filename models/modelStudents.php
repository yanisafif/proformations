<?php
require_once ('models/model.php');
function addStudent($studentINE, $firstName, $lastName, $adress, $city, $mail, $password){
    $bddPDO = connexionBDD();
    $requete = $bddPDO->prepare('INSERT INTO students(studentINE, firstName, lastName, adress, city, mail, password) 
    VALUES(:studentINE, :firstName, :lastName, :adress, :city, :mail, :password)');

    $requete->bindvalue(':studentINE', $studentINE);
    $requete->bindvalue(':firstName', $firstName);
    $requete->bindvalue(':lastName', $lastName);
    $requete->bindvalue(':adress', $adress);
    $requete->bindvalue(':city', $city);
    $requete->bindvalue(':mail', $mail);
    $requete->bindvalue(':password', $password);

    $resultAddStudent = $requete->execute();
    return $resultAddStudent;
}
function getStudentWithMail($mail) {
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM students WHERE mail = '$mail'";
    $result = $bddPDO->query($requete);
    $data = $result->fetch(PDO::FETCH_ASSOC);
    return $data;
}