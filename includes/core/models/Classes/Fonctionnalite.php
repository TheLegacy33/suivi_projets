<?php

	class Fonctionnalite{
		private int $id;
		private string $libelle, $details;

		private int $idProjet;

		/**
		 * @param string $libelle
		 * @param string $details
		 * @param int    $idProjet
		 */
		public function __construct(string $libelle = '', string $details = '', int $idProjet = 0){
			$this->libelle = $libelle;
			$this->details = $details;
			$this->idProjet = $idProjet;
			$this->id = 0;
		}

		/**
		 * @return int
		 */
		public function getId(): int{
			return $this->id;
		}

		/**
		 * @param int $id
		 */
		public function setId(int $id): void{
			$this->id = $id;
		}

		/**
		 * @return string
		 */
		public function getLibelle(): string{
			return $this->libelle;
		}

		/**
		 * @param string $libelle
		 */
		public function setLibelle(string $libelle): void{
			$this->libelle = $libelle;
		}

		/**
		 * @return string
		 */
		public function getDetails(): string{
			return $this->details;
		}

		/**
		 * @param string $details
		 */
		public function setDetails(string $details): void{
			$this->details = $details;
		}

		/**
		 * @return int
		 */
		public function getIdProjet(): int{
			return $this->idProjet;
		}

		/**
		 * @param int $idProjet
		 */
		public function setIdProjet(int $idProjet): void{
			$this->idProjet = $idProjet;
		}



	}