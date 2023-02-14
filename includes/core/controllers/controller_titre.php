<?php
	
	switch ($action){
		case 'list':{
			require_once "includes/core/models/DAO/DAOTitre.php";

			$lesTitres = DAOTitre::getAll();

			require_once "includes/core/views/lists/liste_titres.phtml";
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