<?php

ini_set('display_errors', false);
// doit-être appelé au début de chaque page qui utilise les sessions
session_start();
// on définit les premiers paramètres de connexion à la base de donnéeq
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'rdv';
// cree la fonction pour se connecter a la base de données
function pdo_connect()
{
    // on récupère les variables de connexion globales
    global $DB_HOST;
    global $DB_USER;
    global $DB_PASSWORD;
    global $DB_NAME;
    try {
        // on crée une nouvelle instance de PDO en passant les paramètres de connexion en argument
        return new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4");
    }  catch (PDOException $exception) {
       // En cas d'erreur, on affiche un message d'erreur et on quitte le script
        exit('impossible de se connecter a la BDD');
    }
}

// on se connecte a la BDD
$db = pdo_connect();


