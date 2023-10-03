<?php
class Utilisateur {
    private string $name = '';
    private string $firstName = '';
    private string $mail = '';
    private string $born = '';
    private string $sexe = '';
    private float $weight = 0.0;
    private float $size = 0.0;
    private string $password = '';

    public function  __construct() { }
    public function init($n, $f, $m, $b, $sexe, $w, $size, $p){
        
        if ($n == null) {
            die("the name is invalid");
        }
        if ($f == null) {
            die("the first nale is invalid");
        }
        if ($m == null) {
            die("the mail is invalid");
        }
        if ($b == null) {
            $b = '01/01/0001';
        }
        if (strcmp($sexe, 'H') != 0 && strcmp($sexe, 'F') != 0) {
            $sexe = 'NONE';
        }
        if ($p == null && strlen($p) >= 8) {
            die("the password is to short");
        }
        if ($w < 1.0) {
            $w = 1.0;
        }
        if ($size < 1.0) {
            $size = 1.0;
        }
        
        $this->name = $n;
        $this->firstName = $f;
        $this->mail = $m;
        $this->born = $b;
        $this->sexe = $sexe;
        $this->weight = $w;
        $this->size = $size;
        $this->password = $p;
        
    }

    public function getName(): string { return $this->name; }
    public function getFirstName(): string { return $this->firstName; }
    public function getMail(): string { return $this->mail; }
    public function getBorn(): string { return $this->born; }
    public function getSexe(): string { return $this->sexe; }
    public function getWeight(): string { return $this->weight; }
    public function getSize(): string { return $this->size; }
    public function getPassword(): string { return $this->password; }

    public function  __toString(): string { return $this->name. " ". $this->firstName; }
}
?>