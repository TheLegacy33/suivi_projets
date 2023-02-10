<?php
	class User{
		private int $id;
		private string $login, $password;
		private bool $authentified;

		/**
		 * @param string $login
		 * @param string $password
		 * @param bool   $authentified
		 */
		public function __construct(string $login, string $password, bool $authentified = false){
			$this->id = 0;
			$this->login = $login;
			$this->password = $password;
			$this->authentified = $authentified;
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
		 * @return bool
		 */
		public function isAuthentified(): bool{
			return $this->authentified;
		}

		/**
		 * @param bool $authentified
		 */
		public function setAuthentified(bool $authentified): void{
			$this->authentified = $authentified;
		}
	}