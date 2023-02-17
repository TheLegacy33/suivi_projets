<?php
	/**
	 * @var array $lesTechnologies
	 * @var Technologie $uneTechnologie
	 * @var string $action
	 */

	require_once "includes/core/models/DAO/DAOProjet.php";
	require_once "includes/core/models/DAO/DAOApprenant.php";
	require_once "includes/core/models/DAO/DAOTechnologie.php";

	switch ($action){
		case 'view':{

			require_once "includes/core/views/view_fonctionnalites.phtml";
			break;
		}

		case 'list':{

			break;
		}

		case 'add':{
			$idProjet = $_GET['idprojet'] ?? 0;
			$unProjet = DAOProjet::getById($idProjet);
			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());
			if (empty($_POST)){
				// J'arrive sur le formulaire
				$uneFonctionnalite = new Fonctionnalite();
			}else{
				// Je viens de valider le formulaire : j'ai cliqué sur Submit
				$uneFonctionnalite = new Fonctionnalite(
					$_POST['chLibelle'],
					$_POST['chDetails'],
					$idProjet
				);

				if (DAOFonctionnalite::insert($uneFonctionnalite)){
					header('Location: index.php?page=projet&action=list&idapprenant='.$unApprenant->getId());
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}

			require_once "includes/core/views/forms/form_fonctionnalite.phtml";
			break;
			break;
		}

		case 'edit':{

			break;
		}

		case 'removefromproject':{
			$idTechnologie = $_GET['idtechnologie'] ?? 0;
			$idProjet = $_GET['idprojet'] ?? 0;
			$uneTechnologie = DAOTechnologie::getById(intval($idTechnologie));
			$unProjet = DAOProjet::getById($idProjet);
			if (!DAOTechnologie::removefromproject($uneTechnologie, $unProjet)){
				$message = 'Erreur de suppression !';
			}
			header("Location: index.php?page=projet&action=view&id=".$unProjet->getId()."#technologies");
			break;
		}

		default: {

		}
	}