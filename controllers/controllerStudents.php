<?php
require_once ('models/modelStudents.php');
require_once ('models/modelCourses.php');

function addNewStudent($studentINE, $firstName, $lastName, $adress, $city, $mail, $password){
    $resultAddStudent = addStudent($studentINE, $firstName, $lastName, $adress, $city, $mail, $password);
    if(!$resultAddStudent){
        $message = "Un problème est survenu, l'enregistrement n'a pas été effectué !";
    }else{
        echo "<script type='text/javascript'> alert('Compte bien crée');</script>";
    }
}
function addOneStudent()
{
    if (isset($_POST['enregistrer'])) {
        if (!empty($_POST['studentINE']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['adress']) && !empty($_POST['city']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

            if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $message = "Mail non valide";

            } elseif ($_POST['password'] != $_POST['password2']) {

                $message = "Les deux mots de passe ne correspondent pas";

            } else {

                $data = getStudentWithMail($_POST['mail']);

                if ($data) {

                    $message = "Un compte existe déjà avec cette adresse email";

                } else {

                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    addNewStudent($_POST['studentINE'], $_POST['firstName'], $_POST['lastName'], $_POST['adress'],
                        $_POST['city'], $_POST['mail'], $password);

                }
            }
        } else {
            $message = "Tous les champs sont requis !";
        }


    }
    require_once('views/viewAddStudent.php');
    require_once('views/error.php');
}
function connexion(){
    if(isset($_POST['connexion'])){
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $data = getStudentWithMail($mail);
        if(!$data){
            $message = "Veuillez rentrer une adresse email valide";
            require_once ('views/error.php');
        }else{
            $passwordIsOk = password_verify($password, $data['password']);
            if($passwordIsOk){
                session_start();
                $_SESSION['studentid'] = $data['studentid'];
                $_SESSION['studentINE'] = $data['studentINE'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['adress'] = $data['adress'];
                $_SESSION['city'] = $data['city'];
                $_SESSION['mail'] = $mail;
                $_SESSION['password'] = $password;


                $resultGetCourses = getCourses();
                $nbCourses = $resultGetCourses->rowCount();
                require_once ('views/viewAllCoursesStudents.php');
            }else {
                $message = "Veuillez rentrer un mot de passe valide";
                require_once ('views/error.php');
            }
        }
    }
    if(!isset($_SESSION['studentid'])){
        require_once ('views/viewConnexion.php');

    }
}
function disconnect(){
    session_start();
    if(isset($_SESSION['studentid'])){
        session_unset();
        session_destroy();
        $message = "Vous êtes bien déconnecté";
        connexion();
    }else{
    $message = "Vous n'etes pas connectés";
    connexion();
    }
    require_once ('views/error.php');
}
