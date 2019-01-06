<?php
  class Model {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add Model
    public function add($data){
      $this->db->query('INSERT INTO models (name, manufacterer_id) VALUES(:name, :manufacterer_id)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':manufacterer_id', $data['car_manufacturer']);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function load_manufacturers(){
      $this->db->query('SELECT * FROM manufacturers');
      
      $rows = $this->db->resultSet();

      return $rows;
    }

  }