<?php

class Player_stats extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Player_stats_model', 'model');

  }

}
