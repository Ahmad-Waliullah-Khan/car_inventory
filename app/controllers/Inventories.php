<?php
  class Inventories extends Controller {

    //-------------------------------------------------------------------------------------//
    
    public function __construct(){
      
      $this->inventoryModel = $this->model('Inventory');

    }
    
    //-------------------------------------------------------------------------------------//

    public function index(){
      $data = [
        'title' => 'Car Inventory',
      ];
     
      $this->view('inventory/index', $data);
    }

    //-------------------------------------------------------------------------------------//

    public function get(){

      $results = $this->inventoryModel->get_inventory();

      $output = "";

      $output .= '

        <table class="table table-hover" id="inventory_table">
          <thead>
            <tr>
              <th scope="col">Sl. No.</th>
              <th scope="col">Manufacturer Name</th>
              <th scope="col">Model Name</th>
              <th scope="col">Count</th>
              <th scope="col">Sold</th>
            </tr>
          </thead>
          <tbody>
      ';

      $i =1 ;

      foreach ($results as $inventory_item) {
        
        $output .= '<tr>
              <th scope="row">'.$i.'</th>
              <td>'.$inventory_item->manufacturer_name.'</td>
              <td>'.$inventory_item->model_name.'</td>
              <td>'.$inventory_item->car_count.'</td>
              <td><a href="'.URLROOT .'/inventories/delete/'.$inventory_item->id.'" class="btn btn-success">Sold</a></td>
            </tr>';

          $i++;
      }

      $output .='

           </tbody>
        </table>

      ';

      echo json_encode($output);
    }

    //-------------------------------------------------------------------------------------//

    public function delete($id){

      if($this->inventoryModel->delete($id)){
        // Redirect to inventories
        redirect('inventories');
        } else {
          die('Something went wrong');
        }
      
    }

    //-------------------------------------------------------------------------------------//

  }