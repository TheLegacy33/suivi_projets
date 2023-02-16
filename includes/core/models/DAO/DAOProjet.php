<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Projet.php";

	class DAOProjet extends BDD{
		public static function getAllByIdApprenant(int $idApprenant): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_projet, nom, presentation, specificites, evolutions, date_debut, id_apprenant
				FROM projet
				WHERE id_apprenant = :idapprenant
				ORDER BY nom";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idapprenant', $idApprenant, PDO::PARAM_INT);
			$SQLStmt->execute();

			$listeProjets = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$unProjet = new Projet(
					$SQLRow['nom'],
					$SQLRow['presentation'],
					$SQLRow['specificites'] ?? '',
					$SQLRow['evolutions'] ?? '',
					date_create($SQLRow['date_debut']),
					$SQLRow['id_apprenant']
				);
				$unProjet->setId($SQLRow['id_projet']);

				$listeProjets[] = $unProjet;
			}
			$SQLStmt->closeCursor();

			return $listeProjets;
		}

		public static function getById(int $idProjet): Projet{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_projet, nom, presentation, specificites, evolutions, date_debut, id_apprenant
				FROM projet
				WHERE id_projet = :idprojet";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idprojet', $idProjet, PDO::PARAM_INT);
			$SQLStmt->execute();

			$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

			$unProjet = new Projet(
				$SQLRow['nom'],
				$SQLRow['presentation'],
				$SQLRow['specificites'] ?? '',
				$SQLRow['evolutions'] ?? '',
				date_create($SQLRow['date_debut']),
				$SQLRow['id_apprenant']
			);
			$unProjet->setId($SQLRow['id_projet']);

			$SQLStmt->closeCursor();

			return $unProjet;
		}

		public static function insert(Projet $newPromotion): bool {
			// INSERT DANS LA BDD
			$conn = parent::getConnexion();

			$SQLQuery = "INSERT INTO promotion(nom, date_debut, date_fin, id_titre)
			VALUES (:nom, :datedebut, :datefin, :idtitre)";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $newPromotion->getNom(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':datedebut', $newPromotion->getDateDebut()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':datefin', $newPromotion->getDateFin()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':idtitre', $newPromotion->getTitre()->getId(), PDO::PARAM_INT);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}

		public static function delete(Projet $promoToDelete): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "DELETE FROM promotion
				WHERE id_promo = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $promoToDelete->getId(), PDO::PARAM_INT);
			return $SQLStmt->execute();
		}

		public static function update(Projet $newProjet): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "UPDATE projet 
					SET nom = :nom,
					    date_debut = :datedebut,
					    evolutions = :evolutions,
					    presentation = :presentation,
					    specificites = :specificites
					WHERE id_projet = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $newProjet->getNom(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':datedebut', $newProjet->getDateDebut()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':evolutions', $newProjet->getEvolutions(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':presentation', $newProjet->getPresentation(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':specificites', $newProjet->getSpecificites(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':id', $newProjet->getId(), PDO::PARAM_STR);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}
	}