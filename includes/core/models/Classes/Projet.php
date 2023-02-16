<?php
	class Projet{
		private int $id, $idApprenant;
		private string $nom, $presentation, $specificites, $evolutions;
		private DateTime $dateDebut;
		private array $suivis, $fonctionnalites, $technologies;

		public function __construct(string $nom, string $presentation, string $specificites, string $evolutions, DateTime $dateDebut, int $idApprenant = 0){
			$this->nom = $nom;
			$this->presentation = $presentation;
			$this->specificites = $specificites;
			$this->evolutions = $evolutions;
			$this->dateDebut = $dateDebut;
			$this->suivis = array();
			$this->fonctionnalites = array();
			$this->technologies = array();
			$this->id = 0;
			$this->idApprenant = $idApprenant;
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
		 * @return int
		 */
		public function getIdApprenant(): int{
			return $this->idApprenant;
		}

		/**
		 * @param int $idApprenant
		 */
		public function setIdApprenant(int $idApprenant): void{
			$this->idApprenant = $idApprenant;
		}

		/**
		 * @return string
		 */
		public function getNom(): string{
			return $this->nom;
		}

		/**
		 * @param string $nom
		 */
		public function setNom(string $nom): void{
			$this->nom = $nom;
		}

		/**
		 * @return string
		 */
		public function getPresentation(): string{
			return $this->presentation;
		}

		/**
		 * @param string $presentation
		 */
		public function setPresentation(string $presentation): void{
			$this->presentation = $presentation;
		}

		/**
		 * @return string
		 */
		public function getSpecificites(): string{
			return $this->specificites;
		}

		/**
		 * @param string $specificites
		 */
		public function setSpecificites(string $specificites): void{
			$this->specificites = $specificites;
		}

		/**
		 * @return string
		 */
		public function getEvolutions(): string{
			return $this->evolutions;
		}

		/**
		 * @param string $evolutions
		 */
		public function setEvolutions(string $evolutions): void{
			$this->evolutions = $evolutions;
		}

		/**
		 * @return DateTime
		 */
		public function getDateDebut(): DateTime{
			return $this->dateDebut;
		}

		/**
		 * @param DateTime $dateDebut
		 */
		public function setDateDebut(DateTime $dateDebut): void{
			$this->dateDebut = $dateDebut;
		}

		/**
		 * @return array
		 */
		public function getSuivis(): array{
			return $this->suivis;
		}

		/**
		 * @param array $suivis
		 */
		public function setSuivis(array $suivis): void{
			$this->suivis = $suivis;
		}

		/**
		 * @return array
		 */
		public function getFonctionnalites(): array{
			return $this->fonctionnalites;
		}

		/**
		 * @param array $fonctionnalites
		 */
		public function setFonctionnalites(array $fonctionnalites): void{
			$this->fonctionnalites = $fonctionnalites;
		}

		/**
		 * @return array
		 */
		public function getTechnologies(): array{
			return $this->technologies;
		}

		/**
		 * @param array $technologies
		 */
		public function setTechnologies(array $technologies): void{
			$this->technologies = $technologies;
		}

		public function getNbSuivis(): int{
			return count($this->suivis);
		}

		public function getNbTechnologies(): int{
			return count($this->technologies);
		}

		public function getNbFonctionnalites(): int{
			return count($this->fonctionnalites);
		}
	}