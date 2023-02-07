<?php

	require_once "includes/core/models/DAO/DAOPromotion.php";
	//require_once "includes/core/models/DAO/DAOCivilite.php";
	//require_once "includes/core/models/DAO/DAOCpVille.php";
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
			$id = $_GET['id'] ?? 0;
			$unePromotion = DAOPromotion::getById($id);
			if (!empty($_POST)){
				$unePromotion->setNom($_POST['chNom']);
				if (DAOPromotion::update($unePromotion)){
					header('Location: index.php?page=promotion&action=list');
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}
			require_once "includes/core/views/forms/form_promotion.phtml";
			break;
		}
		case 'delete':{
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
			if (empty($_POST)){
				// J'arrive sur le formulaire
				$unePromotion = new Promotion();
			}else{
				// Je viens de valider le formulaire : j'ai cliqué sur Submit
				$unePromotion = new Promotion(
					$_POST['chNom']
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
			require_once "includes/core/views/forms/form_promotion.phtml";
			break;
		}
		default:{

		}
	}