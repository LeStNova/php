<?php

class ActivityEntry {

	private $idData;
	private $heureDeb;
	private $heureFin;
	private $freq;
	private $lat;
	private $lon;
	private $alt;
	private $idActiForeign;

	public function __construct() {}

	public function init($idData, $heureDeb, $heureFin, $freq, $lat, $lon, $alt, $idActiForeign) {
	
		if ($idData == null) {
			die("Erreur : idData is null");
		}

		if ($heureDeb == null) {
			die("Erreur : heureDeb is null");
		}

		if ($heureFin == null) {
			die("Erreur : heureFin is null");
		}

		if ($freq == null) {
			die("Erreur : freq is null");
		}

		if ($lat == null) {
			die("Erreur : lat is null");
		}

		if ($lon == null) {
			die("Erreur : lon is null");
		}

		if ($alt == null) {
			die("Erreur : alt is null");
		}

		if ($idActiForeign == null) {
			die("Erreur : idActiForeign is null");
		}

		$this->idData = $idData;
		$this->heureDeb = $heureDeb;
		$this->heureFin = $heureFin;
		$this->freq = $freq;
		$this->lat = $lat;
		$this->lon = $lon;
		$this->alt = $alt;
		$this->idActiForeign = $idActiForeign;
		
	}

	public function getIdData() {
		return $this->idData;
	}

	public function getHeureDeb() {
		return $this->heureDeb;
	}

	public function getHeureFin() {
		return $this->heureFin;
	}

	public function getFreq() {
		return $this->freq;
	}

	public function getLat() {
		return $this->lat;
	}

	public function getLon() {
		return $this->lon;
	}

	public function getAlt() {
		return $this->alt;
	}

	public function getIdActiForeign() {
		return $this->idActiForeign;
	}

	public function __toString() {
		return "idData : " . $this->idData . " heureDeb : " . $this->heureDeb . " heureFin : " . $this->heureFin . " freq : " . $this->freq . " lat : " . $this->lat . " lon : " . $this->lon . " alt : " . $this->alt . " idActiForeign : " . $this->idActiForeign;
	}

}

?>