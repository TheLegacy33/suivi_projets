<?php
	/**
	 * @var Apprenant $unApprenant
	 * @var string $action;
	 */

	require_once "includes/core/models/DAO/DAOPromotion.php";
	require_once "includes/core/models/DAO/DAOApprenant.php";
	switch ($action){
		case 'list':{
			$idPromo = $_GET['idpromo'] ?? 0;
			$unePromo = DAOPromotion::getById($idPromo);
			if ($idPromo > 0){
				$lesApprenants = DAOApprenant::getAllByIdPromo($idPromo);

				foreach ($lesApprenants as $unApprenant){
					$unApprenant->setPromotion(DAOPromotion::getById($idPromo));
				}
				require_once "includes/core/views/lists/liste_apprenants_by_promo.phtml";
			}else{
				$lesApprenants = DAOApprenant::getAll();
				foreach ($lesApprenants as $unApprenant){
					$unApprenant->setPromotion(DAOPromotion::getById($idPromo));
				}
				require_once "includes/core/views/lists/liste_apprenants.phtml";
			}

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
			if (empty($_POST)){
				// J'arrive sur le formulaire
				$unePersonne = new Apprenant();
				
			}else{
				// Je viens de valider le formulaire : j'ai cliqué sur Submit
				$unePersonne = new Apprenant(
					$_POST['chNom'],
					$_POST['chPrenom'],
					date_create($_POST['chDateNaissance']),
					$_POST['chNumRue'],
					$_POST['chNomRue'],
					getCiviliteById($_POST['cbCivilite']),
					getCpVilleById($_POST['chCpVille']),
					intval($_POST['chTaille']),
					intval($_POST['chPoids']),
					$_POST['chComplementAdresse']
				);

				if (insertContact($unePersonne)){
					header('Location: ?page=contact&action=list');
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}
			$lesCivilites = getAllCivilites();

			$lesCpVilles = getAllCpVilles();

			require_once "includes/core/views/form_promotion.phtml";
			break;
		}
		default:{
			$action = 'view';
			require_once "includes/core/controllers/controller_error.php";
		}
	}