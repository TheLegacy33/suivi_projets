<?php
	require_once "includes/core/models/Classes/Intervenant.php";
	class Suivi{
		private int $id, $idprojet, $idintervenant;
		private DateTime $dateSuivi;
		private string $commentaire;
		private Intervenant $intervenant;

		/**
		 * @param DateTime $dateSuivi
		 * @param string   $commentaire
		 */
		public function __construct(DateTime $dateSuivi = null, string $commentaire = '', int $idintervenant = 0, int $idprojet = 0){
			$this->dateSuivi = $dateSuivi ?? new DateTime('now');
			$this->commentaire = $commentaire;
			$this->id = 0;
			$this->idprojet = $idprojet;
			$this->idintervenant = $idintervenant;
			$this->intervenant = new Intervenant();
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
		 * @return DateTime
		 */
		public function getDateSuivi(): DateTime{
			return $this->dateSuivi;
		}

		/**
		 * @param DateTime $dateSuivi
		 */
		public function setDateSuivi(DateTime $dateSuivi): void{
			$this->dateSuivi = $dateSuivi;
		}

		/**
		 * @return string
		 */
		public function getCommentaire(): string{
			return $this->commentaire;
		}

		/**
		 * @param string $commentaire
		 */
		public function setCommentaire(string $commentaire): void{
			$this->commentaire = $commentaire;
		}

		/**
		 * @return Intervenant
		 */
		public function getIntervenant(): Intervenant{
			return $this->intervenant;
		}

		/**
		 * @param Intervenant $intervenant
		 */
		public function setIntervenant(Intervenant $intervenant): void{
			$this->intervenant = $intervenant;
		}

		/**
		 * @return int
		 */
		public function getIdprojet(): int{
			return $this->idprojet;
		}

		/**
		 * @param int $idprojet
		 */
		public function setIdprojet(int $idprojet): void{
			$this->idprojet = $idprojet;
		}

		/**
		 * @return int
		 */
		public function getIdintervenant(): int{
			return $this->idintervenant;
		}

		/**
		 * @param int $idintervenant
		 */
		public function setIdintervenant(int $idintervenant): void{
			$this->idintervenant = $idintervenant;
		}


	}