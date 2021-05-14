<?php
if(!empty($_SESSION)){
    $connected = True;
}else{
    $connected = False;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <base href="/proformations/">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Proformations</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/linericon/style.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="assets/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="assets/vendors/popup/magnific-popup.css">
    <!-- main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

<!--================Header Menu Area =================-->
<header class="header_area">

    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="">Accueil</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion des cours</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="controllerCourses/addOneCourse">Nouveau cours</a></li>
                                <li class="nav-item"><a class="nav-link" href="controllerCourses/getAllCourses">Tous les cours</a></li>

                            </ul>
                        </li>
                        <?php
                            if($connected){?>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bonjour <?=$_SESSION['firstName']?></a>
                                    <ul class="dropdown-menu">

                                        <li class="nav-item"><a class="nav-link" href="controllerCourses/getAllCoursesStudents">Tous les cours</a></li>
                                        <li class="nav-item"><a class="nav-link" href="controllerInscription/getAllMyCourses">Mes cours</a></li>
                                        <li class="nav-item"><a class="nav-link" href="controllerStudents/disconnect">Deconnexion</a></li>

                                    </ul>
                                </li>
                        <?php    }
                        ?>


                            <?php if(!$connected){?>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Etudiants</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="controllerStudents/addOneStudent">Crée un compte</a></li>
                                        <li class="nav-item"><a class="nav-link" href="controllerStudents/connexion">Connexion</a></li>
                                    </ul>
                                </li>
                            <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Proformations</h2>
                </div>
            </div>
        </div>
    </div>
    </section>