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
			if (!$enableActions){
				header('Location: index.php');
			}
			$idProjet = $_GET['idprojet'] ?? 0;
			$unProjet = DAOProjet::getById($idProjet);
			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());

			$lesTechnologies = DAOTechnologie::getAllNonAffectedToProject($idProjet);

			if (empty($_POST)){
				// J'arrive sur le formulaire
				$uneTechnologie = new Technologie();
			}else{
				// Je viens de valider le formulaire : j'ai cliqué sur Submit
				$message = '';
				foreach ($_POST['chkTech'] as $checkbox){
					//$uneTechnologie = DAOTechnologie::getById(intval($_POST['chCbTechnologie']));
					$uneTechnologie = DAOTechnologie::getById(intval($checkbox));
					if (!DAOTechnologie::appendtoproject($uneTechnologie, $unProjet)){
						$message .= "Erreur d'enregistrement pour la technologie : $checkbox";
					}
				}
				header('Location: index.php?page=projet&action=view&id='.$idProjet.'#technologies');
			}

			require_once "includes/core/views/forms/form_technologie.phtml";
			break;
		}

		case 'edit':{
			if (!$enableActions){
				header('Location: index.php');
			}
			break;
		}

		case 'removefromproject':{
			if (!$enableActions){
				header('Location: index.php');
			}
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
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}