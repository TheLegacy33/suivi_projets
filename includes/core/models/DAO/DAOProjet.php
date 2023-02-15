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
					date_create($SQLRow['date_debut'])
				);
				$unProjet->setId($SQLRow['id_projet']);

				$listeProjets[] = $unProjet;
			}
			$SQLStmt->closeCursor();

			return $listeProjets;
		}
	}