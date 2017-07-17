<?php

class Ladders extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Ladders_model', 'model');

  }

  public function standings_get($league_id)
  {
    $res = $this->model->getStandings($league_id);

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  public function home_get($league_id)
  {
    $res = $this->model->getStandingsByCourtType($league_id, 'home');

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  public function away_get($league_id)
  {
    $res = $this->model->getStandingsByCourtType($league_id, 'away');

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

}
