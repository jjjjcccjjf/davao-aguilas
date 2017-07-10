<?php

class Ladders extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Ladders_model', 'model');

  }

}
