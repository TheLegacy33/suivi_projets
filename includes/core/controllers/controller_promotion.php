<?php
	/**
	 * @var Promotion $unePromotion
	 * @var string $action;
	 */

	require_once "includes/core/models/DAO/DAOTitre.php";
	require_once "includes/core/models/DAO/DAOPromotion.php";
	switch ($action){
		case 'list':{

			$lesPromotions = DAOPromotion::getAll();

			require_once "includes/core/views/lists/liste_promotions.phtml";
			break;
		}
		case 'view':{

			break;
		}
		case 'edit':{
			if (!$enableActions){
				header('Location: index.php');
			}
			$id = $_GET['id'] ?? 0;
			$unePromotion = DAOPromotion::getById($id);
			if (!empty($_POST)){
				$unePromotion->setNom($_POST['chNom']);
				$unePromotion->setDateDebut(date_create($_POST['chDateDebut']));
				$unePromotion->setDateFin(date_create($_POST['chDateFin']));
				$unePromotion->setTitre(DAOTitre::getById($_POST['cbTitre']));
				if (DAOPromotion::update($unePromotion)){
					header('Location: index.php?page=promotion&action=list');
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}
			$lesTitres = DAOTitre::getAll();
			require_once "includes/core/views/forms/form_promotion.phtml";
			break;
		}
		case 'delete':{
			if (!$enableActions){
				header('Location: index.php');
			}
			if (isset($_GET['id'])){
				if (DAOPromotion::delete(DAOPromotion::getById(intval($_GET['id'])))){
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
			if (!$enableActions){
				header('Location: index.php');
			}
			if (empty($_POST)){
				// J'arrive sur le formulaire
				$unePromotion = new Promotion();
			}else{
				// Je viens de valider le formulaire : j'ai cliqué sur Submit
				$unePromotion = new Promotion(
					$_POST['chNom'],
					date_create($_POST['chDateDebut']),
					date_create($_POST['chDateFin']),
					DAOTitre::getById($_POST['cbTitre'])
				);

				if (DAOPromotion::findByName($unePromotion->getNom())){
					$message = "Cette promotion existe déjà !";
				}else{
					if (DAOPromotion::insert($unePromotion)){
						header('Location: index.php?page=promotion&action=list');
					}else{
						$message = "Erreur d'enregistrement !";
					}
				}
			}
			$lesTitres = DAOTitre::getAll();

			require_once "includes/core/views/forms/form_promotion.phtml";
			break;
		}
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}