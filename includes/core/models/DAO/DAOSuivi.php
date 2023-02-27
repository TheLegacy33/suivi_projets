<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/Suivi.php";
	abstract class DAOSuivi extends BDD{
		public static function getAllByIdProjet(int $idProjet): array{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_suivi, date, commentaire, id_intervenant, id_projet
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
					$SQLRow['commentaire'],
					$SQLRow['id_intervenant'],
					$SQLRow['id_projet']
				);
				$unSuivi->setId($SQLRow['id_suivi']);
				$unSuivi->setIntervenant(DAOIntervenant::getById($SQLRow['id_intervenant']));
				$unSuivi->setIdprojet($SQLRow['id_projet']);

				$listeSuivis[] = $unSuivi;
			}
			$SQLStmt->closeCursor();

			return $listeSuivis;
		}

		public static function getById(int $idSuivi): Suivi{
			$conn = parent::getConnexion();

			$SQLQuery = "SELECT id_suivi, date, commentaire, id_intervenant, id_projet
				FROM suivi
				WHERE id_suivi = :idsuivi";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':idsuivi', $idSuivi, PDO::PARAM_INT);
			$SQLStmt->execute();

			$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

			$unSuivi = new Suivi(
				date_create($SQLRow['date']),
				$SQLRow['commentaire'],
				$SQLRow['id_intervenant'],
				$SQLRow['id_projet']
			);
			$unSuivi->setId($SQLRow['id_suivi']);
			$unSuivi->setIntervenant(DAOIntervenant::getById($SQLRow['id_intervenant']));
			$unSuivi->setIdprojet($SQLRow['id_projet']);

			$SQLStmt->closeCursor();

			return $unSuivi;
		}

		public static function insert(Suivi $newSuivi): bool {
			$conn = parent::getConnexion();

			$SQLQuery = "INSERT INTO suivi(date, commentaire, id_intervenant, id_projet) 
					VALUES(:date, :commentaire, :id_intervenant, :id_projet)";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':commentaire', $newSuivi->getCommentaire(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':date', $newSuivi->getDateSuivi()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':id_intervenant', $newSuivi->getIntervenant()->getId(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':id_projet', $newSuivi->getIdprojet(), PDO::PARAM_STR);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}

		public static function delete(Suivi $suiviToDelete): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "DELETE FROM suivi
				WHERE id_suivi = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $suiviToDelete->getId(), PDO::PARAM_INT);
			return $SQLStmt->execute();
		}

		public static function update(Suivi $unSuivi): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "UPDATE suivi 
					SET date = :date,
					    commentaire = :commentaire,
					    id_intervenant = :idintervenant
					WHERE id_suivi = :id";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':commentaire', $unSuivi->getCommentaire(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':date', $unSuivi->getDateSuivi()->format('Y-m-d'), PDO::PARAM_STR);
			$SQLStmt->bindValue(':idintervenant', $unSuivi->getIntervenant()->getId(), PDO::PARAM_STR);
			$SQLStmt->bindValue(':id', $unSuivi->getId(), PDO::PARAM_STR);

			if (!$SQLStmt->execute()){
				return false;
			}else{
				return true;
			}
		}
	}