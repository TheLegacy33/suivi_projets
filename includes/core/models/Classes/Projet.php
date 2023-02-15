<?php
	class Projet{
		private int $id;
		private string $nom, $presentation, $specificites, $evolutions;
		private DateTime $dateDebut;

		/**
		 * @param string   $nom
		 * @param string   $presentation
		 * @param string   $specificites
		 * @param string   $evolutions
		 * @param DateTime $dateDebut
		 */
		public function __construct(string $nom, string $presentation, string $specificites, string $evolutions, DateTime $dateDebut){
			$this->nom = $nom;
			$this->presentation = $presentation;
			$this->specificites = $specificites;
			$this->evolutions = $evolutions;
			$this->dateDebut = $dateDebut;
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
	}