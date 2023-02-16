<?php
	require_once "includes/core/models/Classes/Promotion.php";

	class Apprenant {
		private int $id;
		private string $nom, $prenom, $email;

		private int $idPromo, $idPersonne;
		private Promotion $promotion;

		public function __construct(string $nom = '', string $prenom = '', string $email = '', int $idPromo = 0, int $idPersonne = 0){
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->email = $email;
			$this->idPromo = $idPromo;
			$this->promotion = new Promotion();
			$this->idPersonne = $idPersonne;
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

		public function getPrenom(): string{
			return $this->prenom;
		}

		public function setPrenom(string $prenom): void{
			$this->prenom = $prenom;
		}

		public function getFullName():string{
			return $this->nom.' '.$this->prenom;
		}

		public function getEmail(): string{
			return $this->email;
		}

		public function setEmail(string $email): void{
			$this->email = $email;
		}

		public function getPromotion(): Promotion{
			return $this->promotion;
		}

		public function setPromotion(Promotion $promotion): void{
			$this->promotion = $promotion;
		}

		/**
		 * @return int
		 */
		public function getIdPromo(): int{
			return $this->idPromo;
		}

		/**
		 * @param int $idPromo
		 */
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