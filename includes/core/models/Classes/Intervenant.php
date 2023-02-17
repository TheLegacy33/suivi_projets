<?php

	class Intervenant{
		private int $id;
		private string $nom, $prenom, $email;
		private int $idPersonne;

		/**
		 * @param string $nom
		 * @param string $prenom
		 * @param string $email
		 * @param int    $idPersonne
		 */
		public function __construct(string $nom = '', string $prenom = '', string $email = '', int $idPersonne = 0){
			$this->id = 0;
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->email = $email;
			$this->idPersonne = $idPersonne;
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
		public function getPrenom(): string{
			return $this->prenom;
		}

		/**
		 * @param string $prenom
		 */
		public function setPrenom(string $prenom): void{
			$this->prenom = $prenom;
		}

		public function getFullName(): string{
			return $this->nom.' '.$this->prenom;
		}

		/**
		 * @return string
		 */
		public function getEmail(): string{
			return $this->email;
		}

		/**
		 * @param string $email
		 */
		public function setEmail(string $email): void{
			$this->email = $email;
		}

		/**
		 * @return int
		 */
		public function getIdPersonne(): int{
			return $this->idPersonne;
		}

		/**
		 * @param int $idPersonne
		 */
		public function setIdPersonne(int $idPersonne): void{
			$this->idPersonne = $idPersonne;
		}
	}