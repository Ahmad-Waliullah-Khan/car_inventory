<?php
  class Inventory {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }


    public function get_inventory(){
      $this->db->query('SELECT models.name as model_name, models.id as id, manufacturers.name as manufacturer_name, COUNT(models.name) as car_count
        FROM models,manufacturers
        WHERE models.manufacterer_id=manufacturers.id
        GROUP BY models.manufacterer_id, models.name
        ORDER BY manufacturers.name;');
      
      $rows = $this->db->resultSet();

      return $rows;
    }

    public function delete($id) {

      // Prepare Query
      $this->db->query('DELETE FROM models WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

  }