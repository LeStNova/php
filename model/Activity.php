<?php

class Activity {
	private int $idActi = 0;
	private string $mailForeign = '';
	private string $dateActi = '';
	private string $description = '';

	public function __construct() {}

	public function init(int $idActi, string $mailForeign, string $dateActi, string $description) {
		
		if ($idActi == null) {
			die("Error: idActi is null");
		}

		if ($mailForeign == null) {
			die("Error: mailForeign is null");
		}

		if ($dateActi == null) {
			$dateActi = '';
		}

		if ($description == null) {
			$description = '';
		}

		$this->idActi = $idActi;
		$this->mailForeign = $mailForeign;
		$this->dateActi = $dateActi;
		$this->description = $description;
		
	}

	public function getIdActi(): int {
		return $this->idActi;
	}

	public function setIdActi(int $i): void {
		$this->idActi = $i;
	}

	public function getMailForeign(): string {
		return $this->mailForeign;
	}

	public function getDateActi(): string {
		return $this->dateActi;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function __toString(): string {
		return "idActi: " . $this->idActi . " mailForeign: " . $this->mailForeign . " dateActi: " . $this->dateActi . " description: " . $this->description;
	}

}

?>