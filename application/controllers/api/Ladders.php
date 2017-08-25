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
      $res['standings'] = [];
      $res['league_name'] = "";
      $this->response($res, 200);
    }
  }

  public function home_get($league_id)
  {
    $ladders = $this->model->getStandingsByCourtType($league_id, 'home');

    if($ladders !== []){
      $res['standings'] = $ladders;
      $res['league_name'] = $this->model->getLeagueName($league_id);
    }else{
      $res = [];
    }

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $res['standings'] = [];
      $res['league_name'] = "";
      $this->response($res, 200);
    }
  }

  public function away_get($league_id)
  {
    $ladders = $this->model->getStandingsByCourtType($league_id, 'away');

    if($ladders !== []){
      $res['standings'] = $ladders;
      $res['league_name'] = $this->model->getLeagueName($league_id);
    }else{
      $res = [];
    }

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $res['standings'] = [];
      $res['league_name'] = "";
      $this->response($res, 200);
    }
  }

}
