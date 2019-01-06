<?php
  class Models extends Controller {

    //-------------------------------------------------------------------------------------//
    
    public function __construct(){
      
       $this->modelModel = $this->model('Model');

    }
    
    //-------------------------------------------------------------------------------------//

    public function index(){
      $data = [
        'title' => 'Add Car Model',
      ];
     
      $this->view('model/index', $data);
    }

    //-------------------------------------------------------------------------------------//

    public function add(){
        
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Initialize data
        $data =[
          'name' => trim($_POST['name']),
          'car_manufacturer' => trim($_POST['car_manufacturer'])
        ];

        // Validate input data
        if(empty($data['name'])){
          // $data['name_err'] = 'Please enter model name';
          echo "Please enter model name";
          die();
        }

        if(($data['car_manufacturer'])== 'Select a Manufacturer...'){
          // $data['manufacturer_err'] = 'Please select a car manufacturer';
          echo 'Please select a car manufacturer!';
          die();
        }

        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['manufacturer_err'])){
          // Validated
          
          // Add model
          if($this->modelModel->add($data)){
            echo "success";
          } else {
            echo "error";
          }

        } else {
          echo json_encode($data);
        }

      } 
      else {
        // Init data
        $data =[
          'name' => ''
        ];

        // Load view
        $this->view('models', $data);
      }

    }

    public function load_manufacturers() {

      $results = $this->modelModel->load_manufacturers();

      $output = "";

      $output .= '

              <div class="form-group">
                  <label for="car_manufacturer_list">Car Manufacturer</label>
                  <select class="form-control mb-2 mr-sm-2" name="car_manufacturer" id="car_manufacturer_list">
                    <option>Select a Manufacturer...</option>
      ';

      foreach ($results as $manufacturer) {
        
        $output .= '<option value="'.$manufacturer->id.'" >'.$manufacturer->name.'</option>';

      }

      $output .='

           </select>
          </div>

      ';

      echo json_encode($output);
    }
  }