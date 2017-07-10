<?php

class Lineups extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Lineups_model', 'model');

  }

}
