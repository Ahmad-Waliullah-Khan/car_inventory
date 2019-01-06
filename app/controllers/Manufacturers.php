<?php
  class Manufacturers extends Controller {

    //-------------------------------------------------------------------------------------//
    
    public function __construct(){
      
      $this->manufacturerModel = $this->model('Manufacturer');

    }
    
    //-------------------------------------------------------------------------------------//

    public function index(){
      $data = [
        'title' => 'Add Manufacturer',
      ];
     
      $this->view('manufacturer/index', $data);
    }

    //-------------------------------------------------------------------------------------//

    public function add(){
        
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Initialize data
        $data =[
          'name' => trim($_POST['name'])
        ];

        // Validate input data
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter manufacturer name';
          echo "Please enter a manufacturer name";
          die();
        }

        // Make sure errors are empty
        if(empty($data['name_err'])){
          // Validated
          
          // Add manufacturer
          if($this->manufacturerModel->add($data)){
            echo "success";
          } else {
            die('Something went wrong');
          }

        } else {
          echo "Please enter a manufacturer name";
          die();
        }

      } 
      else {
        // Init data
        $data =[
          'name' => ''
        ];
      }

    }
  }