<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Fonctionnalite.php";
	class DAOFonctionnalite extends BDD{
		public static function getAllByIdProjet(int $idProjet): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT fonctionnalite.id_fonctionnalite, fonctionnalite.libelle, fonctionnalite.details
				FROM fonctionnalite INNER JOIN projet p on fonctionnalite.id_projet = p.id_projet
				WHERE fonctionnalite.id_projet = :idprojet
				ORDER BY fonctionnalite.libelle ASC";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idprojet', $idProjet, PDO::PARAM_INT);
			$SQLStmt->execute();

			$listeFonctionnalites = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$uneFonctionnalite = new Fonctionnalite(
					$SQLRow['libelle'],
					$SQLRow['details']
				);
				$uneFonctionnalite->setId($SQLRow['id_fonctionnalite']);

				$listeFonctionnalites[] = $uneFonctionnalite;
			}
			$SQLStmt->closeCursor();

			return $listeFonctionnalites;
		}

		public static function getById(int $id): Fonctionnalite{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_fonctionnalite, libelle, details, id_projet
				FROM fonctionnalite
				WHERE id_fonctionnalite = :idfonctionnalite";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idfonctionnalite', $id, PDO::PARAM_INT);
			$SQLStmt->execute();

			$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

			$uneFonctionnalite = new Fonctionnalite(
					$SQLRow['libelle'],
					$SQLRow['details'],
					$SQLRow['id_projet']
				);
			$uneFonctionnalite->setId($SQLRow['id_fonctionnalite']);
			$SQLStmt->closeCursor();

			return $uneFonctionnalite;
		}

		public static function insert(Fonctionnalite $newFonctionnalite): bool {
			// INSERT DANS LA BDD
			$conn = parent::getConnexion();

			$SQLQuery = "INSERT INTO fonctionnalite(libelle, details, id_projet)
			VALUES (:libelle, :details, :id_projet)";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':libelle', $newFonctionnalite->getLibelle(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':details', $newFonctionnalite->getDetails(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':id_projet', $newFonctionnalite->getIdProjet(), PDO::PARAM_INT);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}

		public static function delete(Fonctionnalite $fonctionnaliteToDelete): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "DELETE FROM fonctionnalite
				WHERE id_fonctionnalite = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $fonctionnaliteToDelete->getId(), PDO::PARAM_INT);
			return $SQLStmt->execute();
		}

		public static function update(Promotion $newPromotion): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "UPDATE promotion 
					SET nom = :nom,
					    date_debut = :datedebut,
					    date_fin = :datefin,
					    id_titre = :idtitre
					WHERE id_promo = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $newPromotion->getNom(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':datedebut', $newPromotion->getDateDebut()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':datefin', $newPromotion->getDateFin()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':idtitre', $newPromotion->getTitre()->getId(), PDO::PARAM_INT);
			$SQLStmt->bindValue(':id', $newPromotion->getId(), PDO::PARAM_STR);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}

	}