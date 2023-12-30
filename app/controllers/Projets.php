<?php
class Projets extends Controller {
    public function __construct() {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->projetModel = $this->model('Projet');
    }

    public function index() {
        // Get projects
        $projets = $this->projetModel->getProjets();

        $data = [
            'projets' => $projets
        ];

        $this->view('projets/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'nom_projet' => trim($_POST['nom_projet']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => ''
            ];

            if (empty($data['nom_projet'])) {
                $data['title_err'] = 'Please enter a name';
            }

            if (empty($data['title_err'])) {
                if($this->projetModel->addProjets($data)) {
                  flash('projet_message', 'Projet Added');
                  redirect('projets');
                }else{
                  die('something wrong');
                }
            } else {
                $this->view('projets/add', $data);
            }
        } else {
            $data = [
                'nom_projet' => ''
            ];

            $this->view('projets/add', $data);
        }
    }
}
