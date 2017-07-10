<?php

class Fixtures extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Fixtures_model', 'model');

  }

}
