<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Competence.php";

	abstract class DAOCompetences extends BDD{
		public static function getByIdBloc(int $idBloc): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_competence, libelle, detail, eliminatoire, id_bloc
				FROM competence
				WHERE id_bloc = :idbloc
				ORDER BY libelle";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idbloc', $idBloc, PDO::PARAM_INT);
			$SQLStmt->execute();

			$listeCompetences = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$uneCompetence = new Competence(
					$SQLRow['eliminatoire'],
					$SQLRow['libelle'],
					$SQLRow['detail'] ?? ''
				);
				$uneCompetence->setId($SQLRow['id_competence']);

				$listeCompetences[] = $uneCompetence;
			}
			$SQLStmt->closeCursor();

			return $listeCompetences;
		}
	}