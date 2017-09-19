<?php

class Admin extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'model');

  }

}
