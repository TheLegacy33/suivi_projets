<?php
	require_once "includes/core/models/Classes/Titre.php";

	class Promotion{
		private int $id;
		private string $nom;
		private DateTime $dateDebut, $dateFin;
		private Titre $titre;

		private array $apprenants;

		public function __construct(string $nom = '', DateTime $dateDebut = new DateTime('now'), DateTime $dateFin = new DateTime('now'), Titre $titre = new Titre('')){
			$this->nom = $nom;
			$this->dateDebut = $dateDebut;
			$this->dateFin = $dateFin;
			$this->apprenants = array();
			$this->titre = $titre;
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

		public function getDateDebut(): DateTime{
			return $this->dateDebut;
		}

		public function setDateDebut(DateTime $dateDebut): void{
			$this->dateDebut = $dateDebut;
		}

		public function getDateFin(): DateTime{
			return $this->dateFin;
		}

		public function setDateFin(DateTime $dateFin): void{
			$this->dateFin = $dateFin;
		}

		public function getApprenants(): array{
			return $this->apprenants;
		}

		public function setApprenants(array $apprenants): void{
			$this->apprenants = $apprenants;
		}

		public function getApprenant(int $id): ?Apprenant{
			if (array_key_exists($id)){
				return $this->apprenants[$id];
			}else{
				return null;
			}
		}

		public function setApprenant(Apprenant $apprenant, int $id = null): void{
			if (is_null($id)){
				$this->apprenants[] = $apprenant;
			}else{
				$this->apprenants[$id] = $apprenant;
			}
		}

		public function getTitre(): Titre{
			return $this->titre;
		}

		public function setTitre(Titre $titre): void{
			$this->titre = $titre;
		}

		public function getNbApprenants(): int{
			return count($this->apprenants);
		}
	}