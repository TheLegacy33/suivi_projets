<?php

	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Apprenant.php";

	abstract class DAOApprenant extends BDD{
		public static function getAll(): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_apprenant, nom, prenom, email, id_personne, id_promo
				FROM apprenant
				ORDER BY nom";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->execute();

			$listeApprenants = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$unApprenant = new Apprenant($SQLRow['nom'], $SQLRow['prenom'], $SQLRow['email'], DAOPromotion::getById($SQLRow['id_promo']), $SQLRow['id_personne']);
				$unApprenant->setId($SQLRow['id_apprenant']);

				$listeApprenants[] = $unApprenant;
			}

			$SQLStmt->closeCursor();

			return $listeApprenants;
		}
		public static function getAllByIdPromo(int $idPromo){
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_apprenant, nom, prenom, email, id_personne
				FROM apprenant
				WHERE id_promo = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $idPromo, PDO::PARAM_INT);
			$SQLStmt->execute();
			$listeApprenants = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$unApprenant = new Apprenant($SQLRow['nom'], $SQLRow['prenom'], $SQLRow['email'], DAOPromotion::getById($idPromo), $SQLRow['id_personne']);
				$unApprenant->setId($SQLRow['id_apprenant']);

				$listeApprenants[] = $unApprenant;
			}

			$SQLStmt->closeCursor();

			return $listeApprenants;
		}

		public static function findByName(string $nomPromotion): Promotion | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_promo, nom 
				FROM promotion
				WHERE nom = :nom";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $nomPromotion, PDO::PARAM_STR);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unePromotion = new Promotion($SQLRow['nom']);
				$unePromotion->setId($SQLRow['id_promo']);

				$SQLStmt->closeCursor();

				return $unePromotion;
			}
		}

		public static function getById(int $idPromo): Promotion | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_promo, nom 
				FROM promotion
				WHERE id_promo = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $idPromo, PDO::PARAM_INT);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unePromotion = new Promotion($SQLRow['nom']);
				$unePromotion->setId($SQLRow['id_promo']);

				$SQLStmt->closeCursor();

				return $unePromotion;
			}
		}

		public static function insert(Promotion $newPromotion): bool {
			// INSERT DANS LA BDD
			$conn = parent::getConnexion();

			$SQLQuery = "INSERT INTO promotion(nom)
			VALUES (:nom)";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $newPromotion->getNom(), PDO::PARAM_STR);

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

			$SQLQuery = "UPDATE promotion SET nom = :nom WHERE id_promo = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $newPromotion->getNom(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':id', $newPromotion->getId(), PDO::PARAM_STR);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}
	}