<?php
	/**
	 * @var Projet $unProjet
	 * @var Suivi $unSuivi
	 * @var string $action;
	 */

	require_once "includes/core/models/DAO/DAOSuivi.php";
	require_once "includes/core/models/DAO/DAOFonctionnalite.php";
	require_once "includes/core/models/DAO/DAOTechnologie.php";
	require_once "includes/core/models/DAO/DAOProjet.php";
	require_once "includes/core/models/DAO/DAOPromotion.php";
	require_once "includes/core/models/DAO/DAOApprenant.php";
	require_once "includes/core/models/DAO/DAOIntervenant.php";
	switch ($action){
		case 'list':{

			$idApprenant = $_GET['idapprenant'] ?? 0;
			$unApprenant = DAOApprenant::getById($idApprenant);
			$unApprenant->setPromotion(DAOPromotion::getById($unApprenant->getIdPromo()));
			$lesProjets = DAOProjet::getAllByIdApprenant($idApprenant);
			foreach ($lesProjets as $unProjet){
				$unProjet->setSuivis(DAOSuivi::getAllByIdProjet($unProjet->getId()));

				foreach ($unProjet->getSuivis() as $unSuivi){
					$unSuivi->setIntervenant(DAOIntervenant::getByIdSuivi($unSuivi->getId()));
				}

				$unProjet->setFonctionnalites(DAOFonctionnalite::getAllByIdProjet($unProjet->getId()));
				$unProjet->setTechnologies(DAOTechnologie::getAllByIdProjet($unProjet->getId()));
			}
			require_once "includes/core/views/lists/liste_projets.phtml";
			break;
		}
		case 'view':{
			$idProjet = $_GET['id'] ?? 0;

			$unProjet = DAOProjet::getById($idProjet);
			$unProjet->setSuivis(DAOSuivi::getAllByIdProjet($idProjet));
			foreach ($unProjet->getSuivis() as $unSuivi){
				$unSuivi->setIntervenant(DAOIntervenant::getByIdSuivi($unSuivi->getId()));
			}

			$unProjet->setFonctionnalites(DAOFonctionnalite::getAllByIdProjet($idProjet));
			$unProjet->setTechnologies(DAOTechnologie::getAllByIdProjet($idProjet));

			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());
			$unApprenant->setPromotion(DAOPromotion::getById($unApprenant->getIdPromo()));
			require_once "includes/core/views/view_projet.phtml";
			break;
		}
		case 'edit':{
			if (!$enableActions){
				header('Location: index.php');
			}
			$idProjet = $_GET['id'] ?? 0;

			$unProjet = DAOProjet::getById($idProjet);
			$unProjet->setSuivis(DAOSuivi::getAllByIdProjet($idProjet));
			foreach ($unProjet->getSuivis() as $unSuivi){
				$unSuivi->setIntervenant(DAOIntervenant::getByIdSuivi($unSuivi->getId()));
			}

			$unProjet->setFonctionnalites(DAOFonctionnalite::getAllByIdProjet($idProjet));
			$unProjet->setTechnologies(DAOTechnologie::getAllByIdProjet($idProjet));
			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());
			$unApprenant->setPromotion(DAOPromotion::getById($unApprenant->getIdPromo()));

			if (!empty($_POST)){

				$unProjet->setNom($_POST['chNom']);
				$unProjet->setDateDebut(date_create($_POST['chDateDebut']));
				$unProjet->setPresentation($_POST['chPresentation']);
				$unProjet->setSpecificites($_POST['chSpecificites']);
				$unProjet->setEvolutions($_POST['chEvolutions']);

				if (DAOProjet::update($unProjet)){
					header('Location: index.php?page=projet&action=list&idapprenant='.$unApprenant->getId());
				}else{
					$message = DAOProjet::getLastErrorMessage();
				}
			}
			require_once "includes/core/views/forms/form_projet.phtml";
			break;
		}
		case 'delete':{
			if (!$enableActions){
				header('Location: index.php');
			}
			$idProjet = $_GET['id'] ?? 0;

			$unProjet = DAOProjet::getById($idProjet);
			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());

			if (DAOProjet::delete($unProjet)){
				header('Location: index.php?page=projet&action=list&idapprenant='.$unApprenant->getId());
			}else{
				$message = DAOProjet::getLastErrorMessage();
			}
			break;
		}
		case 'add':{
			if (!$enableActions){
				header('Location: index.php');
			}
			$idApprenant = $_GET['idapprenant'] ?? 0;
			$unApprenant = DAOApprenant::getById($idApprenant);
			$unApprenant->setPromotion(DAOPromotion::getById($unApprenant->getIdPromo()));

			$unProjet = new Projet();

			if (!empty($_POST)){
				$unProjet->setSuivis(array());
				$unProjet->setFonctionnalites(array());
				$unProjet->setTechnologies(array());

				$unProjet->setNom($_POST['chNom']);
				$unProjet->setDateDebut(date_create($_POST['chDateDebut']));
				$unProjet->setPresentation($_POST['chPresentation']);
				$unProjet->setSpecificites($_POST['chSpecificites']);
				$unProjet->setEvolutions($_POST['chEvolutions']);
				$unProjet->setIdApprenant($idApprenant);
				if (DAOProjet::insert($unProjet)){
					header('Location: index.php?page=projet&action=list&idapprenant='.$unApprenant->getId());
				}else{
					$message = DAOProjet::getLastErrorMessage();
				}
			}
			require_once "includes/core/views/forms/form_projet.phtml";
			break;
		}
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}