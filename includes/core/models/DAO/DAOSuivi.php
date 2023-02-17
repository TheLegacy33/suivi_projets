<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Suivi.php";
	class DAOSuivi extends BDD{
		public static function getAllByIdProjet(int $idProjet): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_suivi, date, commentaire, id_intervenant
				FROM suivi
				WHERE id_projet = :idprojet
				ORDER BY date DESC";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idprojet', $idProjet, PDO::PARAM_INT);
			$SQLStmt->execute();

			$listeSuivis = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$unSuivi = new Suivi(
					date_create($SQLRow['date']),
					$SQLRow['commentaire']
				);
				$unSuivi->setId($SQLRow['id_suivi']);

				$listeSuivis[] = $unSuivi;
			}
			$SQLStmt->closeCursor();

			return $listeSuivis;
		}
	}