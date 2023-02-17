<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Intervenant.php";

	class DAOIntervenant extends BDD{
		public static function getById(int $idIntervenant): Intervenant | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT  id_intervenant, nom, prenom, email, id_personne
				FROM intervenant
				WHERE id_intervenant = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $idIntervenant, PDO::PARAM_INT);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unIntervenant = new Intervenant($SQLRow['nom'], $SQLRow['prenom'], $SQLRow['email'], $SQLRow['id_personne']);
				$unIntervenant->setId($SQLRow['id_intervenant']);

				$SQLStmt->closeCursor();

				return $unIntervenant;
			}
		}

		public static function getByIdSuivi(int $idSuivi): Intervenant | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT  intervenant.id_intervenant, nom, prenom, email, id_personne
				FROM intervenant INNER JOIN suivi s on intervenant.id_intervenant = s.id_intervenant
				WHERE id_suivi = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $idSuivi, PDO::PARAM_INT);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unIntervenant = new Intervenant($SQLRow['nom'], $SQLRow['prenom'], $SQLRow['email'], $SQLRow['id_personne']);
				$unIntervenant->setId($SQLRow['id_intervenant']);

				$SQLStmt->closeCursor();

				return $unIntervenant;
			}
		}
	}