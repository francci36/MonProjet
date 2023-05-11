<?php
session_start();
session_destroy();

header("Location: /"); // Rediriger vers la page d'accueil ou une autre page de votre choix
exit();
