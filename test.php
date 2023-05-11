<?php



$index=true;

// initialise moin programme

//require_once('app/config.php');
require_once('app/classe.apprdvtherapeute.php');



global $oAppRDV;



echo "nouvelle instance user <br>";
$oUser = new RT_User();


// $r = false;
// echo "test crea user<br>";
// $r = $oUser->createUser( 'levesqye', 'david', 'contahhhhct@toto.fr', '123', '0664555', 'client' );

// echo" result r=$r";


$r = false;

echo "test login <br>";
  // Tentative de connexion avec des identifiants corrects
  $r = $oUser->login('contahhhhct@toto.fr', '123');
    echo "result r=$r";

    



    $a = "bonjour";
    $b = "hello (english";

    $c = &$a;

    $c = "Gutten tag (deutsch)";

    echo "a==$a   b==$b   c==$c";
    // a = bonjour  b= hello  c=bonjour





    return;

// Tentative de connexion avec un email incorrect

//   $result = $oUser->login('jean.dupont@exemple.com', '123');
//   $this->assertFalse($result);
//   $this->assertFalse($oUser->b_is_connected);

//   // Tentative de connexion avec un mot de passe incorrect
//   $result = $oUser->login('contahhhhct@toto.fr', '523');
//   $this->assertFalse($result);
//   $this->assertFalse($oUser->b_is_connected);

// test de la fonction de creation de rdv
echo "test de la fonction de creation de rdv <br>";
// $oRdv = new RT_Rdv();
// $r = $oRdv->createRdv( '2020-12-12', '13:00:00', '14:30:00', $oUser);
// echo "result r=$r";

//test de la fonction de modification de rdv
//test de la fonction de modification de rdv
echo "test de la fonction de modification de rdv <br>";
$oUser = new RT_User();
$r = $oUser->login('contahhhhct@toto.fr', '123');
if ($r) {
    $oRdv = new RT_Rdv();
    $oRdv->loadRDV( 4 );
    $r = $oRdv->updateRdv( '2022-12-12', '14:00:00', '14:30:00', $oUser);
    echo "result r=$r";
} else {
    echo "Impossible de se connecter avec l'utilisateur";
}

echo "test de la fonction de suppression de rdv <br>";
 $oUser = new RT_User();
$oUser->setId(1);
$r = $oUser->login('contahhhhct@toto.fr', '123');
if ($r) {
    $oRdv = new RT_Rdv();
    $oRdv->loadRDV( 3 );
    $r = $oRdv->deleteRdv();
    echo "result r=$r";
} else {
    echo "Impossible de se connecter avec l'utilisateur";
}

// // test de la fonction de suppression de rdv
// echo "test de la fonction de suppression de rdv <br>";
// //$oRdv = new RT_Rdv();
// $r = $oRdv->deleteRdv( '2023-12-12', '13:00:00', $oUser);




$oAgenda = new RT_Agenda();
$aRDV = $oAgenda->getRDV( '2020-12-12');
var_dump($aRDV);

echo "test de liting rendez-vous de la journée <br>";
var_export($aRDV);

