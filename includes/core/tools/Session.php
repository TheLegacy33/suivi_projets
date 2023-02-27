<?php
	class Session{
		private string $id, $name;
		private ?User $user;

		private static Session $activeSession;
		/**
		 * @param string $id
		 * @param string $name
		 * @param ?User   $user
		 */
		public function __construct(string $id, string $name, ?User $user = null){
			$this->id = $id;
			$this->name = $name;
			$this->user = $user;
			$_SESSION[$name] = $this;
		}

		/**
		 * @return string
		 */
		public function getId(): string{
			return $this->id;
		}

		/**
		 * @param string $id
		 */
		public function setId(string $id): void{
			$this->id = $id;
		}

		/**
		 * @return string
		 */
		public function getName(): string{
			return $this->name;
		}

		/**
		 * @param string $name
		 */
		public function setName(string $name): void{
			$this->name = $name;
		}

		/**
		 * @return User
		 */
		public function getUser(): ?User{
			return $this->user ?? null;
		}

		/**
		 * @param User $user
		 */
		public function setUser(User $user): void{
			$this->user = $user;
		}

		public static function initialise(string $appName): void{
			if (session_status() == PHP_SESSION_NONE || empty($_SESSION)){

				self::$activeSession = new Session(session_create_id(), $appName);
				self::$activeSession->setUser(new User(''));
			}else{
				self::$activeSession = $_SESSION[$appName];
			}
		}

		public static function destroy(): void{
			session_unset();
			session_destroy();
		}

		public static function getActiveSession(): Session{
			return self::$activeSession;
		}
	}