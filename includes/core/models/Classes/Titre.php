<?php
	require_once "includes/core/models/Classes/Referentiel.php";
	class Titre{
		private int $id;
		private string $nom;
		private Referentiel $referentiel;

		public function __construct(string $nom = '', Referentiel $referentiel = new Referentiel('')){
			$this->nom = $nom;
			$this->referentiel = $referentiel;
			$this->id = 0;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getNom(): string{
			return $this->nom;
		}

		public function setNom(string $nom): void{
			$this->nom = $nom;
		}

		/**
		 * @return Referentiel
		 */
		public function getReferentiel(): Referentiel{
			return $this->referentiel;
		}

		/**
		 * @param Referentiel $referentiel
		 */
		public function setReferentiel(Referentiel $referentiel): void{
			$this->referentiel = $referentiel;
		}
	}