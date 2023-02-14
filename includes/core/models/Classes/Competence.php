<?php

	class Competence{
		private int $id;
		private bool $eliminatoire;
		private string $libelle, $details;

		/**
		 * @param bool   $eliminatoire
		 * @param string $libelle
		 * @param string $details
		 */
		public function __construct(bool $eliminatoire = false, string $libelle = '', string $details = ''){
			$this->eliminatoire = $eliminatoire;
			$this->libelle = $libelle;
			$this->details = $details;
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
		 * @return bool
		 */
		public function isEliminatoire(): bool{
			return $this->eliminatoire;
		}

		/**
		 * @param bool $eliminatoire
		 */
		public function setEliminatoire(bool $eliminatoire): void{
			$this->eliminatoire = $eliminatoire;
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


	}