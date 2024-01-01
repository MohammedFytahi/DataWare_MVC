<?php

class Taches extends Controller {
    private $tacheModel;

    public function __construct() {
        $this->tacheModel = $this->model('Tache');
    }

    public function index() {
        // Récupérer les tâches de l'utilisateur connecté
        $user_id = $_SESSION['user_id'];
        $taches = $this->tacheModel->getTachesByUserId($user_id);

        $data = [
            'taches' => $taches
        ];

        $this->view('taches/index', $data);
    }

    // ... Ajoutez d'autres méthodes pour l'ajout, la modification, la suppression de tâches
}
