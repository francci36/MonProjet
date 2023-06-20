<?php
session_start();

require_once('config.php');


require_once('./app/classe.apprdvtherapeute.php');

global $oAppRDV;
$oAppRDV->load_from_session();