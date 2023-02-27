<?php
	/**
	 * @var Titre $unTitre
	 * @var string $action;
	 */

	switch ($action){
		case 'list':{
			require_once "includes/core/models/DAO/DAOTitre.php";

			$lesTitres = DAOTitre::getAll();

			require_once "includes/core/views/lists/liste_titres.phtml";
			break;
		}
		case 'view':{

			break;
		}
		case 'edit':{
			if (!$enableActions){
				header('Location: index.php');
			}
			break;
		}
		case 'delete':{
			if (!$enableActions){
				header('Location: index.php');
			}
			break;
		}
		case 'add':{
			if (!$enableActions){
				header('Location: index.php');
			}
			require_once "includes/core/models/DAO/DAOTitre.php";
			require_once "includes/core/models/DAO/DAOReferentiel.php";

			if (empty($_POST)){
				// J'arrive sur le formulaire
				$unTitre = new Titre();
				
			}else{
				// Je viens de valider le formulaire : j'ai cliqué sur Submit
				$unTitre = new Titre(
					$_POST['chNom'],
					DAOReferentiel::getById($_POST['cbTitre'])
				);

				if (DAOTitre::insert($unTitre)){
					header('Location: ?page=contact&action=list');
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}

			require_once "includes/core/views/forms/form_titre.phtml";
			break;
		}
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}