<?php
	require_once "includes/core/models/DAO/DAOSuivi.php";
	require_once "includes/core/models/DAO/DAOFonctionnalite.php";
	require_once "includes/core/models/DAO/DAOTechnologie.php";
	require_once "includes/core/models/DAO/DAOProjet.php";

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

			break;
		}
		case 'edit':{

			break;
		}
		case 'delete':{
		
			break;
		}
		case 'add':{
			require_once "includes/core/models/DAO/DAOTitre.php";
			require_once "includes/core/models/DAO/DAOReferentiel.php";

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