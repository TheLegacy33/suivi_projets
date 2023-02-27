<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/BlocCompetence.php";

	abstract class DAOBlocCompetences extends BDD{
		public static function getByIdReferentiel(int $idReferentiel): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_bloc, code, libelle, mode_evaluation, id_referentiel
				FROM bloc_competence
				WHERE id_referentiel = :idreferentiel
				ORDER BY code, libelle";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idreferentiel', $idReferentiel, PDO::PARAM_INT);
			$SQLStmt->execute();

			$listeBlocCompetences = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$unBloc = new BlocCompetence(
					$SQLRow['code'],
					$SQLRow['libelle'],
					$SQLRow['mode_evaluation']
				);
				$unBloc->setId($SQLRow['id_bloc']);

				$listeBlocCompetences[] = $unBloc;
			}

			$SQLStmt->closeCursor();

			return $listeBlocCompetences;
		}
	}