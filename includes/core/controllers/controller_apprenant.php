<?php
	require_once "includes/core/models/DAO/DAOApprenant.php";

	switch ($action){
		case 'list':{

			$lesApprenants = DAOApprenant::getAll();

			require_once "includes/core/views/lists/liste_apprenants.phtml";
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