<?php
  class Projets extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->projetModel = $this->model('Projet');
    }

    public function index(){
      // Get posts
      $projets = $this->projetModel->getProjets();

      $data = [
        'projets' => $projets
      ];

      $this->view('projets/index', $data);
    }
  }