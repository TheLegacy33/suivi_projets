<?php
	/**
	 * @var User $unUser
	 * @var string $action
	 * @var bool $enableActions
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
						Session::getActiveSession()->setUserId(DAOUser::getIdByLogin($loginSaisi));
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
			if (Session::getActiveSession()->isUserLogged()){
				Session::destroy();
			}
			header('Location: index.php');
			break;
		}

		case 'setallpasswords':{
			if (!$enableActions){
				header('Location: index.php');
			}
			$lesUsers = DAOUSer::getAll();
			foreach ($lesUsers as $unUser){
				if (trim($unUser->getPassword()) == ''){
					$unUser->setPassword(password_hash($unUser->getLogin(), PASSWORD_BCRYPT));
				}
				DAOUser::update($unUser);
			}
			header('Location: index.php');
			break;
		}
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}