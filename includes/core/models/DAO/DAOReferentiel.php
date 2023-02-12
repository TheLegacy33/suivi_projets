<?php

	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Referentiel.php";

	abstract class DAOReferentiel extends BDD{
		public static function getAll(): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_referentiel, num_rncp, libelle, details, date_validite, objectifs, activites_visees, competences_attestees, modalite_evaluation 
				FROM referentiel
				ORDER BY libelle, num_rncp";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->execute();

			$listeReferentiels = array();
			while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
				$unReferentiel = new Referentiel(
					$SQLRow['num_rncp'],
					$SQLRow['libelle'],
					$SQLRow['details'],
					$SQLRow['objectifs'],
					$SQLRow['activites_visees'],
					$SQLRow['competences_attestees'],
					$SQLRow['modalite_evaluation'],
					date_create($SQLRow['date_validite'])
				);
				$unReferentiel->setId($SQLRow['id_referentiel']);

				$listeReferentiels[] = $unReferentiel;
			}

			$SQLStmt->closeCursor();

			return $listeReferentiels;
		}

		public static function findByRNCP(string $numRNCP): Referentiel | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_referentiel, num_rncp, libelle, details, date_validite, objectifs, activites_visees, competences_attestees, modalite_evaluation 
				FROM referentiel
				WHERE num_rncp = :numRncp";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':numRncp', $numRNCP, PDO::PARAM_STR);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unReferentiel = new Referentiel(
					$SQLRow['num_rncp'],
					$SQLRow['libelle'],
					$SQLRow['details'],
					$SQLRow['objectifs'],
					$SQLRow['activites_visees'],
					$SQLRow['competences_attestees'],
					$SQLRow['modalite_evaluation'],
					date_create($SQLRow['date_validite'])
				);
				$unReferentiel->setId($SQLRow['id_referentiel']);

				$SQLStmt->closeCursor();

				return $unReferentiel;
			}
		}

		public static function getById(int $idReferentiel): Referentiel | bool{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_referentiel, num_rncp, libelle, details, date_validite, objectifs, activites_visees, competences_attestees, modalite_evaluation 
				FROM referentiel
				WHERE id_referentiel = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $idReferentiel, PDO::PARAM_INT);
			$SQLStmt->execute();
			if ($SQLStmt->rowCount() == 0){
				return false;
			}else{
				$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$unReferentiel = new Referentiel(
					$SQLRow['num_rncp'],
					$SQLRow['libelle'],
					$SQLRow['details'],
					$SQLRow['objectifs'],
					$SQLRow['activites_visees'],
					$SQLRow['competences_attestees'],
					$SQLRow['modalite_evaluation'],
					date_create($SQLRow['date_validite'])
				);
				$unReferentiel->setId($SQLRow['id_referentiel']);

				$SQLStmt->closeCursor();

				return $unReferentiel;
			}
		}

		public static function insert(Referentiel $newReferentiel): bool {
			// INSERT DANS LA BDD
			$conn = parent::getConnexion();

			$SQLQuery = "INSERT INTO referentiel(num_rncp, libelle, details, date_validite, objectifs, activites_visees, competences_attestees, modalite_evaluation)
			VALUES (:num_rncp, :libelle, :details, :date_validite, :objectifs, :activites_visees, :competences_attestees, :modalite_evaluation)";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':num_rncp', $newReferentiel->getNumRncp(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':libelle', $newReferentiel->getLibelle(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':details', $newReferentiel->getDetails(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':date_validite', $newReferentiel->getDateValidite()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':objectifs', $newReferentiel->getObjectifs(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':activites_visees', $newReferentiel->getActivites(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':competences_attestees', $newReferentiel->getCompetences(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':modalite_evaluation', $newReferentiel->getModaliteEvaluation(), PDO::PARAM_STR);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}

		public static function delete(Referentiel $referentielToDelete): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "DELETE FROM referentiel
				WHERE id_referentiel = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $referentielToDelete->getId(), PDO::PARAM_INT);
			return $SQLStmt->execute();
		}

		public static function update(Referentiel $newReferentiel): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "UPDATE referentiel 
					SET num_rncp = :num_rncp,
					    libelle = :libelle,
					    details = :details,
					    date_validite = :date_validite,
					    objectifs = :objectifs,
					    activites_visees = :activites_visees,
					    competences_attestees = :competences_attestees, 
					    modalite_evaluation = :modalite_evaluation
					WHERE id_referentiel = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':num_rncp', $newReferentiel->getNumRncp(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':libelle', $newReferentiel->getLibelle(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':details', $newReferentiel->getDetails(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':date_validite', $newReferentiel->getDateValidite()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':objectifs', $newReferentiel->getObjectifs(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':activites_visees', $newReferentiel->getActivites(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':competences_attestees', $newReferentiel->getCompetences(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':modalite_evaluation', $newReferentiel->getModaliteEvaluation(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':id', $newReferentiel->getId(), PDO::PARAM_STR);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}
	}