<?php

class Commentary extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Commentary_model', 'model');

  }

}
