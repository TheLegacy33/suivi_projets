<?php
	class User{
		private int $id;
		private string $login, $password;

		private Apprenant | Intervenant | null $personne;

		/**
		 * @param string $login
		 * @param string $password
		 */
		public function __construct(string $login, string $password = ''){
			$this->id = 0;
			$this->login = $login;
			$this->password = $password;
			$this->personne = null;
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
		public function getLogin(): string{
			return $this->login;
		}

		/**
		 * @param string $login
		 */
		public function setLogin(string $login): void{
			$this->login = $login;
		}

		/**
		 * @return string
		 */
		public function getPassword(): string{
			return $this->password;
		}

		/**
		 * @param string $password
		 */
		public function setPassword(string $password): void{
			$this->password = $password;
		}

		/**
		 * @return Apprenant|Intervenant|null
		 */
		public function getPersonne(): Apprenant|Intervenant|null{
			return $this->personne;
		}

		/**
		 * @param Apprenant|Intervenant|null $personne
		 */
		public function setPersonne(Apprenant|Intervenant|null $personne): void{
			$this->personne = $personne;
		}
	}