<?php
	/**
	 * @var Projet $unProjet
	 * @var string $action;
	 */

	require_once "includes/core/models/DAO/DAOSuivi.php";
	require_once "includes/core/models/DAO/DAOFonctionnalite.php";
	require_once "includes/core/models/DAO/DAOTechnologie.php";
	require_once "includes/core/models/DAO/DAOProjet.php";
	require_once "includes/core/models/DAO/DAOPromotion.php";
	require_once "includes/core/models/DAO/DAOApprenant.php";
	switch ($action){
		case 'list':{

			$idApprenant = $_GET['idapprenant'] ?? 0;
			$lesProjets = DAOProjet::getAllByIdApprenant($idApprenant);
			foreach ($lesProjets as $unProjet){
				$unProjet->setSuivis(DAOSuivi::getAllByIdProjet($unProjet->getId()));
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
			$unProjet->setFonctionnalites(DAOFonctionnalite::getAllByIdProjet($idProjet));
			$unProjet->setTechnologies(DAOTechnologie::getAllByIdProjet($idProjet));
			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());
			$unApprenant->setPromotion(DAOPromotion::getById($unApprenant->getIdPromo()));
			require_once "includes/core/views/view_projet.phtml";
			break;
		}
		case 'edit':{
			$idProjet = $_GET['id'] ?? 0;

			$unProjet = DAOProjet::getById($idProjet);
			$unProjet->setSuivis(DAOSuivi::getAllByIdProjet($idProjet));
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
		
			break;
		}
		case 'add':{
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

		}
	}