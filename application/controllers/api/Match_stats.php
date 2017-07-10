<?php

class Match_stats extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Match_stats_model', 'model');

  }

}
