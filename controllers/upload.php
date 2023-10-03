<?php
require_once(__ROOT__.'/controllers/Controller.php');
require_once(__ROOT__.'/model/Activity.php');
require_once(__ROOT__.'/model/ActivityDAO.php');

class UploadActivityController extends Controller {

    private $name;

    public function get($request) {
        $this->render('upload_activity_form', []);
    }

    public function post($request) {
        $error = $_FILES["activity"]["error"];

        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["activity"]["tmp_name"];
            $this->name = basename($_FILES["activity"]["name"]);
            move_uploaded_file($tmp_name, "uploads/$this->name");

            $data = file_get_contents(__ROOT__.'/uploads/'.$this->name);
            $obj = json_decode($data, true);

            $acti = new Activity();
            $acti->init(1, 'malo@gmail.com', $obj['activity']['date'], $obj['activity']['description']);
        
            try {
                $activiteDAO = new ActivityDAO();
                $actiIdMax = new Activity();

                if (sizeof($activiteDAO->maxId()) == 0) {
                    $actiIdMax = 1;
                } else {
                    $actiIdMax = $activiteDAO->maxId()[0]->getIdActi() + 1;
                }
                
                $acti->init(($actiIdMax), 'malo@gmail.com', $obj['activity']['date'], $obj['activity']['description']);
                $activiteDAO->insert($acti);

            } catch (PDOException $e) {
                die("Erreur de connexion ou bien doublon dans la table : " . $e->getMessage());
            }

            unlink("uploads/$this->name");

            $this->render('upload_activity_form', ['Fichier bien enregisté']);

        } else {
            $this->render('upload_activity_form', ['Choisissez un fichier .json']);
        }

    }

}

?>