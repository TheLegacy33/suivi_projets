<?php
	/**
	 * @var Suivi $unSuivi
	 * @var string $action;
	 */

	require_once "includes/core/models/DAO/DAOSuivi.php";
	require_once "includes/core/models/DAO/DAOProjet.php";
	require_once "includes/core/models/DAO/DAOApprenant.php";
	require_once "includes/core/models/DAO/DAOIntervenant.php";

	switch ($action){
		case 'list':{

			$lesPromotions = DAOSuivi::getAll();

			require_once "includes/core/views/lists/liste_promotions.phtml";
			break;
		}
		case 'view':{

			break;
		}
		case 'edit':{
			$id = $_GET['id'] ?? 0;
			$unSuivi = DAOSuivi::getById($id);
			$unProjet = DAOProjet::getById($unSuivi->getIdprojet());
			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());

			if (!empty($_POST)){
				$unSuivi->setCommentaire($_POST['chCommentaires']);
				$unSuivi->setDateSuivi(date_create($_POST['chDateSuivi']));
				$unSuivi->setIntervenant(DAOIntervenant::getById(intval($_POST['chCbIntervenant'])));

				if (DAOSuivi::update($unSuivi)){
					header('Location: index.php?page=projet&action=view&id='.$unSuivi->getIdProjet());
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}
			$lesIntervenants = DAOIntervenant::getAll();
			require_once "includes/core/views/forms/form_suivi.phtml";
			break;
		}
		case 'delete':{
			if (isset($_GET['id'])){
				if (DAOSuivi::delete(DAOSuivi::getById(intval($_GET['id'])))){
					header("Location: index.php?page=promotion&action=list");
				}else{
					$lesPromotions = DAOPromotion::getAll();

					require_once "includes/core/views/lists/liste_promotions.phtml";
				}
			}else{
				header("Location: index.php?page=promotion&action=list");
			}

			break;
		}
		case 'add':{
			$idProjet = $_GET['idprojet'] ?? 0;
			$unProjet = DAOProjet::getById($idProjet);
			$unApprenant = DAOApprenant::getById($unProjet->getIdApprenant());
			if (empty($_POST)){
				$unSuivi = new Suivi();
			}else{

				$unSuivi = new Suivi(date_create($_POST['chDateSuivi']), $_POST['chCommentaires']);
				$unSuivi->setIntervenant(DAOIntervenant::getById(intval($_POST['chCbIntervenant'])));
				$unSuivi->setIdprojet($idProjet);

				if (DAOSuivi::update($unSuivi)){
					header('Location: index.php?page=projet&action=view&id='.$unSuivi->getIdProjet());
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}
			$lesIntervenants = DAOIntervenant::getAll();
			require_once "includes/core/views/forms/form_suivi.phtml";
			break;
		}
		default:{

		}
	}