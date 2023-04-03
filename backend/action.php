<?php
// inclusion du fichier db-inc.php
require('db-inc.php');
// vérifie que le formulaire a été soumis
if(isset($_POST['submit']))
{
  // on vérifie que tous les champs du formulaire ne sont pas vides
  if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']))
  {
    // on vérifie que password et password2 ont la même valeur
    if($_POST['password'] == $_POST['password2'])
    {
      // on vérifie si l'utilisateur existe déjà
      $query = $db->query('SELECT * FROM utilisateur WHERE `email`="'.$_POST['email'].'"');
      // on vérifie si la requête SQL en utilisant la fonction rowCount
      if ($query->rowCount() == 0) {
        // on chiffre le mot de passe soumis avec la fonction de hachage
        $password = sha1($_POST['password']);
        // on insère une nouvelle ligne dans la table utilisateur avec email et le mot de passe chifré soumis dans le formulaire
        $db->query('INSERT INTO `utilisateur` SET `email` = "'.$_POST['email'].'", `password` = "'.$password.'"');
        // on récupère l'identifiant auto-incrément de la dernière ligne insérée dans la table utilisateurs
        $id = $db->lastInsertId();
        // on stocke l'identifiant de l'utilisateur dans la variable de session utilisateur
        $_SESSION['utilisateur'] = $id;
        // on redirige l'utilisateur vers la page d'accueil du site
        header('location:index.php');
      } else {
        // si l'adresse email est déjà enregistrée dans la table utilisateur cette ligne affiche le message "déjà enregistré"
        echo 'déjà enregistré';
      }
    }
  }
}
