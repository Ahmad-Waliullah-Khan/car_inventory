<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Mini Car Inventory System',
      ];
     
      $this->view('pages/index', $data);
    }

  }