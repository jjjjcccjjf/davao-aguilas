<?php

class Cpm extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Cpm_model', 'model');

  }

}
