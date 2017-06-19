<?php

class Videos extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Videos_model', 'model');

  }


}
