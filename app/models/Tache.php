<?php
// Tache.php

class Tache {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getTachesByUserId($userId) {
        $this->db->query('SELECT t.*, p.nom_projet AS nom_projet FROM taches t 
        INNER JOIN projets p ON t.Project_ID = p.id_Project 
        WHERE t.User_Id = :user_id AND t.Project_ID = p.id_Project');

// Liaison de la valeur du paramètre
$this->db->bind(':user_id', $userId);

$results = $this->db->resultSet();

return $results;
    }

    public function addTache($data) {
        $this->db->query('INSERT INTO taches (Nome_Tache, Date_debut, Date_fin, statut, Project_ID, User_Id) VALUES (:nome_tache, :date_debut, :date_fin, :statut, :project_id, :user_id)');
        // Bind values
        $this->db->bind(':nome_tache', $data['nome_tache']);
        $this->db->bind(':date_debut', $data['date_debut']);
        $this->db->bind(':date_fin', $data['date_fin']);
        $this->db->bind(':statut', $data['statut']);
        $this->db->bind(':project_id', $data['project_id']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute
        return $this->db->execute();
    }

    public function updateTache($data) {
        $this->db->query('UPDATE taches SET Nome_Tache = :nome_tache, Date_debut = :date_debut, Date_fin = :date_fin, statut = :statut, Project_ID = :project_id WHERE id_tache = :tache_id');
        // Bind values
        $this->db->bind(':tache_id', $data['tache_id']);
        $this->db->bind(':nome_tache', $data['nome_tache']);
        $this->db->bind(':date_debut', $data['date_debut']);
        $this->db->bind(':date_fin', $data['date_fin']);
        $this->db->bind(':statut', $data['statut']);
        $this->db->bind(':project_id', $data['project_id']);

        // Execute
        return $this->db->execute();
    }

    public function deleteTache($tacheId) {
        $this->db->query('DELETE FROM taches WHERE id_tache = :tache_id');
        // Bind values
        $this->db->bind(':tache_id', $tacheId);

        // Execute
        return $this->db->execute();
    }
}
