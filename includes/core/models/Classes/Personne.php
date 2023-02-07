<?php
	require_once "Promotion.php";
	require_once "Cpville.php";

	class Personne{
		private int $id;
		private string $nom, $prenom, $numRue, $nomRue, $complementRue;
		private int $taille, $poids;
		private ?DateTime $dateNaissance;
		private ?Promotion $civilite;
		private ?Cpville $cpVille;

		public function __construct(string $nom = '', string $prenom = '', ?DateTime $dateNaissance = null,
									string $numRue = '', string $nomRue = '', ?Promotion $civilite = null, ?Cpville $cpVille = null,
									int    $taille = 0, int $poids = 0, string $complementRue = ''){
				$this->nom = $nom;
				$this->prenom = $prenom;

				if (is_null($dateNaissance)){
					$this->dateNaissance = new DateTime('now');
				}else{
					$this->dateNaissance = $dateNaissance;
				}

				//$this->dateNaissance = is_null($dateNaissance) ? new DateTime('now') : $dateNaissance;
				//$this->dateNaissance = $dateNaissance ?? new DateTime('now');

				$this->numRue = $numRue;
				$this->nomRue = $nomRue;
				$this->taille = $taille;
				$this->poids = $poids;
				$this->complementRue = $complementRue;

				$this->civilite = $civilite ?? new Promotion('', '');
				$this->cpVille = $cpVille ?? new Cpville('', '');
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

		public function getDateNaissance(): DateTime{
			return $this->dateNaissance;
		}

		public function setDateNaissance(DateTime $dateNaissance): void{
			$this->dateNaissance = $dateNaissance;
		}

		public function getNumRue(): string{
			return $this->numRue;
		}

		public function setNumRue(string $numRue): void{
			$this->numRue = $numRue;
		}

		public function getNomRue(): string{
			return $this->nomRue;
		}

		public function setNomRue(string $nomRue): void{
			$this->nomRue = $nomRue;
		}

		public function getComplementRue(): string{
			return $this->complementRue;
		}

		public function setComplementRue(string $complementRue): void{
			$this->complementRue = $complementRue;
		}

		public function getTaille(): int{
			return $this->taille;
		}

		public function setTaille(int $taille): void{
			$this->taille = $taille;
		}

		public function getPoids(): int{
			return $this->poids;
		}

		public function setPoids(int $poids): void{
			$this->poids = $poids;
		}

		public function getCivilite(): Promotion{
			return $this->civilite;
		}

		public function setCivilite(Promotion $nom): void{
			$this->civilite = $civilite;
		}

		public function getCpVille(): Cpville{
			return $this->cpVille;
		}

		public function setCpVille(Cpville $cpVille): void{
			$this->cpVille = $cpVille;
		}
	}