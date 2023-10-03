<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/controllers/ConnectUserController.php');

class connect extends Controller{

    private $connection = false;

    public function get($request){
        $this->render('user_connect_form', $request);
    }

    public function post($request){

        $rep = new ConnectUserController;

        $rep->init($request);

        $this->connection = $rep->getConnection();

        if ($this->connection == true) {
            session_start();
            $_SESSION["mail"] = $request['mail'];
            $this->render('user_connect_valid', ['compteCo' => true]);
        } else {
            $this->render('user_connect_valid', ['compteCo' => false]);
        }

    }

    public function getConnecter() {
        return $this->connection;
    }

    public function setConnecter($value) {
        $this->connection = $value;
    }

}


?>
