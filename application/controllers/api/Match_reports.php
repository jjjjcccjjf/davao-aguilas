<?php

class Match_reports extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Match_reports_model', 'model');

  }

}
