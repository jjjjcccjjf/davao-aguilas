<?php

class Actions extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Actions_model', 'model');

  }

}
