<?php

	require_once "includes/core/models/BDD.php";
	require_once "includes/core/models/Classes/Cpville.php";

	//Fonction qui exécute le SELECT ... FROM cp_ville et renvoie le résultat sous la forme attendue
	function getAllCpVilles(): array{
		$conn = getConnexion();

		$SQLQuery = "SELECT id, codepostal, ville FROM cp_ville";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeCpVilles = array();

		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unCpVille = new Cpville($SQLRow['codepostal'], $SQLRow['ville']);
			
			$unCpVille->setId($SQLRow['id']);

			$listeCpVilles[] = $unCpVille;
				
		}
		$SQLStmt->closeCursor();
		return $listeCpVilles;
	}

	function getCpVilleById(int $id): Cpville{
		$conn = getConnexion();

		$SQLQuery = "SELECT id, codepostal, ville 
			FROM cp_ville
			WHERE id = :id";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$unCpVille = new Cpville($SQLRow['codepostal'], $SQLRow['ville']);
		$unCpVille->setId($SQLRow['id']);
		
		$SQLStmt->closeCursor();
		return $unCpVille;
	}