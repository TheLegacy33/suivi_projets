<?php
	require_once "includes/core/models/DAO/BDD.php";
	class DAOTechnologie extends BDD{
		public static function getAllByIdProjet(int $idProjet): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT technologie.id_technologie, libelle
				FROM technologie INNER JOIN exploiter e on technologie.id_technologie = e.id_technologie
				WHERE id_projet = :idprojet
				ORDER BY libelle DESC";

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
	}