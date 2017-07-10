<?php

class Team_stats extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Team_stats_model', 'model');

  }

}
