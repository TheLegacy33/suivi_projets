<?php
	ini_set('display_errors', 'on');

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
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}