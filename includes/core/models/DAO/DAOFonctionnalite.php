<?php
	require_once "includes/core/models/DAO/BDD.php";
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
	}