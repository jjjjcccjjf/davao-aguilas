<?php

class Leagues extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Leagues_model', 'model');

  }

}
