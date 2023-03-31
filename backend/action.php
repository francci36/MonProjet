<?php
$action = $_GET['action'];

switch ($action) {
  case 'index':
    require_once('index.php');
    break;
  case 'blog':
    require_once('blog.php');
    break;
  case 'newsletter':
    require_once('newsletter.php');
    break;
  case 'agendamento':
    require_once('agendamento.php');
    break;
  default:
    echo 'Action non reconnue';
    break;
}
