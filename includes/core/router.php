<?php
	session_name(APP_NAME);
	session_start();
	Session::initialise(APP_NAME);

	ini_set('display_errors', 'on');

	if (Session::getActiveSession())
	$page = $_GET['page'] ?? 'index';
	$action = $_GET['action'] ?? 'view';
	switch ($page){
		case 'index':{
			require_once "includes/core/controllers/controller_index.php";
			break;
		}
		case 'promotion':{
			require_once "includes/core/controllers/controller_promotion.php";
			break;
		}
		case 'user':{
			require_once "includes/core/controllers/controller_user.php";
			break;
		}
		case 'apprenant':{
			require_once "includes/core/controllers/controller_apprenant.php";
			break;
		}
		case 'titre':{
			require_once "includes/core/controllers/controller_titre.php";
			break;
		}
		case 'referentiel':{
			require_once "includes/core/controllers/controller_referentiel.php";
			break;
		}
		case 'projet':{
			require_once "includes/core/controllers/controller_projet.php";
			break;
		}
		case 'suivi':{
			require_once "includes/core/controllers/controller_suivi.php";
			break;
		}
		case 'fonctionnalite':{
			require_once "includes/core/controllers/controller_fonctionnalite.php";
			break;
		}
		case 'technologie':{
			require_once "includes/core/controllers/controller_technologie.php";
			break;
		}
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}