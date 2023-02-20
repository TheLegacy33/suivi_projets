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

			require_once "includes/core/views/view_technologie.phtml";
			break;
		}

		case 'list':{

			break;
		}

		case 'addtoproject':{
			$idProjet = $_GET['idprojet'] ?? 0;
			$unProjet = DAOProjet::getById($idProjet);
			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());

			$lesTechnologies = DAOTechnologie::getAllNonAffectedToProject($idProjet);
			if (empty($_POST)){
				// J'arrive sur le formulaire
				$uneTechnologie = new Technologie();
			}else{
				// Je viens de valider le formulaire : j'ai cliqué sur Submit
				$uneTechnologie = DAOTechnologie::getById(intval($_POST['chCbTechnologie']));

				if (DAOTechnologie::appendtoproject($uneTechnologie, $unProjet)){
					header('Location: index.php?page=projet&action=list&idapprenant='.$unApprenant->getId());
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}



			require_once "includes/core/views/forms/form_technologie.phtml";
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