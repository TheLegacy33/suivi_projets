<?php
class Referentiel{
	private int $id;
	private string $num_rncp, $libelle, $details, $objectifs, $activites, $competences, $modaliteEvaluation;
	private DateTime $dateValidite;

	private array $blocscompetences;

	public function __construct(string $num_rncp = '', string $libelle = '', string $details = '', string $objectifs = '', string $activites = '', string $competences = '', string $modaliteEvaluation = '', DateTime $dateValidite = new DateTime('now')){
		$this->num_rncp = $num_rncp;
		$this->libelle = $libelle;
		$this->details = $details;
		$this->objectifs = $objectifs;
		$this->activites = $activites;
		$this->competences = $competences;
		$this->modaliteEvaluation = $modaliteEvaluation;
		$this->dateValidite = $dateValidite;
		$this->id = 0;
		$this->blocscompetences = array();
	}

	public function getId(): int{
		return $this->id;
	}

	public function setId(int $id): void{
		$this->id = $id;
	}

	public function getNumRncp(): string{
		return $this->num_rncp;
	}

	public function setNumRncp(string $num_rncp): void{
		$this->num_rncp = $num_rncp;
	}

	public function getLibelle(): string{
		return $this->libelle;
	}

	public function setLibelle(string $libelle): void{
		$this->libelle = $libelle;
	}

	public function getDetails(): string{
		return $this->details;
	}

	public function setDetails(string $details): void{
		$this->details = $details;
	}

	public function getObjectifs(): string{
		return $this->objectifs;
	}

	public function setObjectifs(string $objectifs): void{
		$this->objectifs = $objectifs;
	}

	public function getActivites(): string{
		return $this->activites;
	}

	public function setActivites(string $activites): void{
		$this->activites = $activites;
	}

	public function getCompetences(): string{
		return $this->competences;
	}

	public function setCompetences(string $competences): void{
		$this->competences = $competences;
	}

	public function getModaliteEvaluation(): string{
		return $this->modaliteEvaluation;
	}

	public function setModaliteEvaluation(string $modaliteEvaluation): void{
		$this->modaliteEvaluation = $modaliteEvaluation;
	}

	public function getDateValidite(): DateTime{
		return $this->dateValidite;
	}

	public function setDateValidite(DateTime $dateValidite): void{
		$this->dateValidite = $dateValidite;
	}

	public function getBlocscompetences(): array{
		return $this->blocscompetences;
	}

	public function setBlocscompetences(array $blocscompetences): void{
		$this->blocscompetences = $blocscompetences;
	}
}