<?php
  class Projet {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getProjets(){
      $this->db->query('SELECT *,
                        projets.id_project as projetId,
                        users.id as userId,
                        projets.creation_date as projetCreated,
                        users.created_at as userCreated
                        FROM projets
                        INNER JOIN users
                        ON projets.user_id = users.id
                        ORDER BY projets.creation_date DESC
                        ');

      $results = $this->db->resultSet();

      return $results;
    }
  }