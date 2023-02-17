<?php
	require_once "includes/core/models/Classes/Intervenant.php";
	class Suivi{
		private int $id;
		private DateTime $dateSuivi;
		private string $commentaire;
		private Intervenant $intervenant;

		/**
		 * @param DateTime $dateSuivi
		 * @param string   $commentaire
		 */
		public function __construct(DateTime $dateSuivi, string $commentaire){
			$this->dateSuivi = $dateSuivi;
			$this->commentaire = $commentaire;
			$this->id = 0;
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
	}