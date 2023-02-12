<?php

	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Titre.php";
	require_once "includes/core/models/DAO/DAOReferentiel.php";

	abstract class DAOTitre extends BDD{
		public static function getAll(): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_titre, nom, id_referentiel 
				FROM titre
				ORDER BY nom";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->execute();

			$listeTitres = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$unTitre = new Titre($SQLRow['nom'], DAOReferentiel::getById($SQLRow['id_referentiel']));
				$unTitre->setId($SQLRow['id_titre']);

				$listeTitres[] = $unTitre;
			}

			$SQLStmt->closeCursor();

			return $listeTitres;
		}

		public static function findByName(string $nomTitre): Titre | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_titre, nom, id_referentiel 
				FROM titre
				WHERE nom = :nom";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $nomTitre, PDO::PARAM_STR);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unTitre = new Titre($SQLRow['nom'], DAOReferentiel::getById($SQLRow['id_referentiel']));
				$unTitre->setId($SQLRow['id_titre']);

				$SQLStmt->closeCursor();

				return $unTitre;
			}
		}

		public static function getById(int $idTitre): Titre | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_titre, nom, id_referentiel 
				FROM titre
				WHERE id_titre = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $idTitre, PDO::PARAM_INT);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unTitre = new Titre($SQLRow['nom'], DAOReferentiel::getById($SQLRow['id_referentiel']));
				$unTitre->setId($SQLRow['id_titre']);

				$SQLStmt->closeCursor();

				return $unTitre;
			}
		}

		public static function insert(Titre $newTitre): bool {
			// INSERT DANS LA BDD
			$conn = parent::getConnexion();

			$SQLQuery = "INSERT INTO titre(nom, id_referentiel)
			VALUES (:nom, :idreferentiel)";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $newTitre->getNom(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':idreferentiel', $newTitre->getReferentiel()->getId(), PDO::PARAM_INT);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}

		public static function delete(Titre $titreToDelete): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "DELETE FROM titre
				WHERE id_titre = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $titreToDelete->getId(), PDO::PARAM_INT);
			return $SQLStmt->execute();
		}

		public static function update(Titre $newTitre): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "UPDATE titre 
					SET nom = :nom,
					    id_referentiel = :idreferentiel
					WHERE id_titre = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':nom', $newTitre->getNom(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':idreferentiel', $newTitre->getReferentiel()->getId(), PDO::PARAM_INT);
			$SQLStmt->bindValue(':id', $newTitre->getId(), PDO::PARAM_INT);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}
	}