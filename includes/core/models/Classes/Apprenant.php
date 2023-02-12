<?php
	class Apprenant {
		private int $id;
		private string $nom, $prenom, $email;

		private int $idPromo, $idPersonne;

		public function __construct(string $nom = '', string $prenom = '', string $email = '', int $idPromo = 0, int $idPersonne = 0){
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->email = $email;
			$this->idPromo = $idPromo;
			$this->idPersonne = $idPersonne;
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

		public function getPrenom(): string{
			return $this->prenom;
		}

		public function setPrenom(string $prenom): void{
			$this->prenom = $prenom;
		}

		public function getEmail(): string{
			return $this->email;
		}

		public function setEmail(string $email): void{
			$this->email = $email;
		}

		public function getIdPromo(): int{
			return $this->idPromo;
		}

		public function setIdPromo(int $idPromo): void{
			$this->idPromo = $idPromo;
		}

		public function getIdPersonne(): int{
			return $this->idPersonne;
		}

		public function setIdPersonne(int $idPersonne): void{
			$this->idPersonne = $idPersonne;
		}
	}