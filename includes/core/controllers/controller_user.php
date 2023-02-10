<?php

	switch ($action){
		case 'login':{
			require_once "includes/core/models/Classes/User.php";



			require_once "includes/core/views/view_form_login.phtml";
			break;
		}
		case 'logout':{

			break;
		}
		default:{

		}
	}