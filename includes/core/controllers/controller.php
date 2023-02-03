<?php
	require_once "includes/core/models/Civilite.php";
	require_once "includes/core/models/Cpville.php";
	require_once "includes/core/models/Personne.php";
	// Je vais construire un lot d'objets pour le afficher sur la vue

	$civiliteMme = new Civilite('Mme', 'Madame');
	$civiliteM = new Civilite('M', 'Monsieur');

	$villeBordeaux = new Cpville('33000', 'BORDEAUX');
	$villeMerignac = new Cpville('33700', 'MERIGNAC');

	$personne1 = new Personne('BONHEUR', 'Gontrand', date_create('1982-05-12'), '13', 'Rue de la chance', 
		$civiliteM, $villeBordeaux, 127, 87, 'En haut du coffre fort');

	require_once("includes/core/views/view.phtml");