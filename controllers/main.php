<?php

require(__ROOT__.'/controllers/Controller.php');



class connect extends Controller{

    public function get($request) {
        $this->render('main', []);
    }

}

?>