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
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}