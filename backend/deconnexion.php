<?php
session_start(); // démarrage de la session
require('db-inc.php');
session_destroy(); // destruction de la session
header('location:index.php'); // redirection vers la page d'accueil
?>

// require('db-inc.php');
// session_destroy();
// header('location:index.php');