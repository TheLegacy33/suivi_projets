<?php
	require_once "includes/core/models/DAO/BDD.php";
	require_once "includes/core/models/Classes/User.php";
	require_once "includes/core/models/Classes/Apprenant.php";
	require_once "includes/core/models/Classes/Intervenant.php";
	class DAOUSer extends BDD{
		public static function userExists(string $login): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "
			SELECT COUNT(id) as existe
			FROM personne
			WHERE login = :login
		";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
			$SQLStmt->execute();

			$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
			$loginTrouve = $SQLRow['existe'];

			$SQLStmt->closeCursor();

			return ($loginTrouve > 0);
		}

		public static function checkAuth(string $login, string $mdp): bool{
			$conn = parent::getConnexion();

			$SQLQuery = "
			SELECT mdp
			FROM personne
			WHERE login = :login	
		";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
			$SQLStmt->execute();

			$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
			$motDePasseStocke = $SQLRow['mdp'];

			$SQLStmt->closeCursor();

			return (password_verify($mdp, $motDePasseStocke));
		}

		public static function getFullUserInfosByLogin(string $login): User{
			$conn = parent::getConnexion();
			$SQLQuery = "SELECT *
				FROM (SELECT 'a' as role, id_apprenant as id, nom, prenom, email, id_personne
					  FROM apprenant
					  UNION
					  SELECT 'i' as role, id_intervenant as id, nom, prenom, email, id_personne
					  FROM intervenant) listeUsers INNER JOIN personne ON id_personne = personne.id
				WHERE login = :login";

			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
			$SQLStmt->execute();

			$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
			$myUser = new User($SQLRow['login'], $SQLRow['mdp'], isset($_SESSION['user']) && $_SESSION['user']->getLogin() == $SQLRow['login']);
			if ($SQLRow['role'] == 'a'){
				$myUser->setPersonne(new Apprenant());
			}else{
				$myUser->setPersonne(new Intervenant());
			}
			$myUser->setId($SQLRow['id_personne']);
			$myUser->getPersonne()->setId($SQLRow['id']);
			$myUser->getPersonne()->setNom($SQLRow['nom']);
			$myUser->getPersonne()->setPrenom($SQLRow['prenom']);
			$myUser->getPersonne()->setEmail($SQLRow['email']);

			$SQLStmt->closeCursor();
			return $myUser;
		}
	}