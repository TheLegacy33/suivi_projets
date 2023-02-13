<?php

	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Promotion.php";
	require_once "includes/core/models/DAO/DAOApprenant.php";
	require_once "includes/core/models/DAO/DAOTitre.php";

	abstract class DAOPromotion extends BDD{
		public static function getAll(): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_promo, nom, date_debut, date_fin, id_titre
				FROM promotion
				ORDER BY date_debut, nom";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->execute();

			$listePromotions = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$unePromotion = new Promotion($SQLRow['nom'], date_create($SQLRow['date_debut']), date_create($SQLRow['date_fin']), DAOTitre::getById($SQLRow['id_titre']));
				$unePromotion->setApprenants(DAOApprenant::getAllByIdPromo($SQLRow['id_promo']));
				$unePromotion->setId($SQLRow['id_promo']);

				$listePromotions[] = $unePromotion;
			}

			$SQLStmt->closeCursor();

			return $listePromotions;
		}

		public static function findByName(string $nomPromotion): Promotion | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_promo, nom, date_debut, date_fin, id_titre
				FROM promotion
				WHERE nom = :nom";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $nomPromotion, PDO::PARAM_STR);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unePromotion = new Promotion($SQLRow['nom'], date_create($SQLRow['date_debut']), date_create($SQLRow['date_fin']), DAOTitre::getById($SQLRow['id_titre']));
//				$unePromotion->setApprenants(DAOApprenant::getAllByIdPromo($SQLRow['id_promo']));
				$unePromotion->setId($SQLRow['id_promo']);

				$SQLStmt->closeCursor();

				return $unePromotion;
			}
		}

		public static function getById(int $idPromo): Promotion | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_promo, nom, date_debut, date_fin, id_titre 
				FROM promotion
				WHERE id_promo = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $idPromo, PDO::PARAM_INT);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unePromotion = new Promotion($SQLRow['nom'], date_create($SQLRow['date_debut']), date_create($SQLRow['date_fin']), DAOTitre::getById($SQLRow['id_titre']));
//				$unePromotion->setApprenants(DAOApprenant::getAllByIdPromo($SQLRow['id_promo']));
				$unePromotion->setId($SQLRow['id_promo']);
				$SQLStmt->closeCursor();

				return $unePromotion;
			}
		}

		public static function insert(Promotion $newPromotion): bool {
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

		public static function delete(Promotion $promoToDelete): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "DELETE FROM promotion
				WHERE id_promo = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $promoToDelete->getId(), PDO::PARAM_INT);
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