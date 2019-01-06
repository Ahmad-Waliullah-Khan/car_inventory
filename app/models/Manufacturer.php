<?php
  class Manufacturer {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add manufacturer
    public function add($data){
      $this->db->query('INSERT INTO manufacturers (name) VALUES(:name)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }