<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Technologie.php";
	class DAOTechnologie extends BDD{
		public static function getAllByIdProjet(int $idProjet): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT technologie.id_technologie, libelle
				FROM technologie INNER JOIN exploiter e on technologie.id_technologie = e.id_technologie
				WHERE id_projet = :idprojet
				ORDER BY libelle";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idprojet', $idProjet, PDO::PARAM_INT);
			$SQLStmt->execute();

			$listeTechnologies = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$uneTechnologie = new Technologie(
					$SQLRow['libelle']
				);
				$uneTechnologie->setId($SQLRow['id_technologie']);

				$listeTechnologies[] = $uneTechnologie;
			}
			$SQLStmt->closeCursor();

			return $listeTechnologies;
		}

		public static function getById(int $id): Technologie{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_technologie, libelle
				FROM technologie
				WHERE id_technologie = :idtechnologie";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idtechnologie', $id, PDO::PARAM_INT);
			$SQLStmt->execute();

			$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

			$uneTechnologie = new Technologie(
				$SQLRow['libelle']
			);
			$uneTechnologie->setId($SQLRow['id_technologie']);
			$SQLStmt->closeCursor();

			return $uneTechnologie;
		}

		public static function insert(Technologie $newFonctionnalite): bool {
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

		public static function delete(Technologie $fonctionnaliteToDelete): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "DELETE FROM fonctionnalite
				WHERE id_fonctionnalite = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $fonctionnaliteToDelete->getId(), PDO::PARAM_INT);
			return $SQLStmt->execute();
		}

		public static function update(Technologie $newPromotion): bool{
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

		public static function removefromproject(Technologie $uneTechnologie, Projet $unProjet){
			$conn = parent::getConnexion();

			$SQLQuery = "DELETE FROM exploiter
				WHERE id_technologie = :idtechnologie 
					AND id_projet = :idprojet";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idtechnologie', $uneTechnologie->getId(), PDO::PARAM_INT);
			$SQLStmt->bindValue(':idprojet', $unProjet->getId(), PDO::PARAM_INT);
			return $SQLStmt->execute();
		}
	}