<?php

class Members extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Members_model', 'model');

  }

}
