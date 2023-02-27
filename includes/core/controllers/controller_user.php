<?php
	/**
	 * @var User $unUser
	 * @var string $action;
	 */

	switch ($action){
		case 'login':{
			require_once "includes/core/models/Classes/User.php";
			require_once "includes/core/models/DAO/DAOUser.php";

			if (!empty($_POST)){
				$loginSaisi = $_POST['ttIdentifiant'] ?? '';
				$mdpSaisi = $_POST['ttPassword'] ?? '';

				if (DAOUSer::userExists($loginSaisi)){
					print('Mon login existe :-)');
					if (DAOUSer::checkAuth($loginSaisi, $mdpSaisi)){
						Session::getActiveSession()->setUser(DAOUser::getFullUserInfosByLogin($loginSaisi));
						header('Location: index.php');
					}else{
						$message = "Mauvaises informations d'identification !";
					}
				}else{
					$message = "Cet utilisateur n'existe pas !";
				}
			}

			require_once "includes/core/views/view_form_login.phtml";
			break;
		}
		case 'logout':{
			if (isset($_SESSION['user'])){
				unset($_SESSION['user']);
			}
			header('Location: index.php');
			break;
		}
		default:{

		}
	}