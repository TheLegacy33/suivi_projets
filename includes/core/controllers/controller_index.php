<?php

	switch ($action){
		case 'view':{
			require_once "includes/core/views/view_index.phtml";
			break;
		}
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}