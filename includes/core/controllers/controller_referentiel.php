<?php
	/**
	 * @var Referentiel $unReferentiel
	 * @var string $action;
	 */


	require_once "includes/core/models/DAO/DAOCompetences.php";
	require_once "includes/core/models/DAO/DAOBlocCompetences.php";
	require_once "includes/core/models/DAO/DAOReferentiel.php";

	switch ($action){
		case 'list':{
			$lesReferentiels = DAOReferentiel::getAll();

			require_once "includes/core/views/lists/liste_referentiels.phtml";
			break;
		}
		case 'view':{
			$idReferentiel = $_GET['id'] ?? 0;
			$unReferentiel = DAOReferentiel::getById();
			$unReferentiel->setBlocscompetences(DAOBlocCompetences::getByIdReferentiel($idReferentiel));

			foreach ($unReferentiel->getBlocscompetences() as $unBloc){
				$unBloc->setCompetences(DAOCompetences::getByIdBloc($unBloc->getId()));
			}
			require_once "includes/core/views/view_referentiel.phtml";
			break;
		}
		case 'edit':{

			break;
		}
		case 'delete':{
		
			break;
		}
		case 'add':{
			require_once "includes/core/models/DAO/DAOPromotion.php";
			require_once "includes/core/models/DAO/DAOCivilite.php";
			require_once "includes/core/models/DAO/DAOCpVille.php";
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

		}
	}