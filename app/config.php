<?php
ini_set('display_errors', true);
error_reporting(E_ALL);


echo "config.php START <br>";

// doit-être appelé au début de chaque page qui utilise les sessions
// session_start();


// on définit les premiers paramètres de connexion à la base de donnéeq
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'appointment';


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
        $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASSWORD);
        // on configure PDO pour qu'il renvoie des exceptions en cas d'erreur SQL
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $exception) {
       // En cas d'erreur, on affiche un message d'erreur et on quitte le script
        exit('impossible de se connecter a la BDD');
    }
}


// Connexion à la base de données

$pdo = pdo_connect();

// on se connecte a la BDD
$db = pdo_connect();



// Création des tables
$result = $pdo->exec("CREATE TABLE if not exists utilisateurs (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nom VARCHAR(50) NOT NULL,
        prenom VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        telephone VARCHAR(20) NOT NULL,
        type_compte VARCHAR(20) NOT NULL,
        password VARCHAR(50) NOT NULL
    )"
);

if($result === false){
    $error = $pdo->errorInfo();
    echo "Erreur MySQL : " . $error[2];
}

$pdo->exec("CREATE TABLE if not exists rendez_vous (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date_heure DATETIME NOT NULL,
    etat VARCHAR(50) NOT NULL,
    utilisateur_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id)
)");
$pdo->exec("CREATE TABLE if not exists admin (
    admin_ID INT PRIMARY KEY AUTO_INCREMENT,
    admin_email VARCHAR(50) NOT NULL,
    admin_password VARCHAR(50) NOT NULL,
    utilisateur_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
)");



