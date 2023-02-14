<?php

	class BlocCompetence{
		private int $id;
		private string $code, $libelle, $modeevaluation;

		private array $competences;

		/**
		 * @param string $code
		 * @param string $libelle
		 * @param string $modeevaluation
		 */
		public function __construct(string $code = '', string $libelle = '', string $modeevaluation = ''){
			$this->code = $code;
			$this->libelle = $libelle;
			$this->modeevaluation = $modeevaluation;
			$this->competences = array();
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
		public function getCode(): string{
			return $this->code;
		}

		/**
		 * @param string $code
		 */
		public function setCode(string $code): void{
			$this->code = $code;
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
		public function getModeevaluation(): string{
			return $this->modeevaluation;
		}

		/**
		 * @param string $modeevaluation
		 */
		public function setModeevaluation(string $modeevaluation): void{
			$this->modeevaluation = $modeevaluation;
		}

		/**
		 * @return array
		 */
		public function getCompetences(): array{
			return $this->competences;
		}

		/**
		 * @param array $competences
		 */
		public function setCompetences(array $competences): void{
			$this->competences = $competences;
		}
	}