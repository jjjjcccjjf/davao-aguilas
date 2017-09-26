<?php

class Ladders extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Ladders_model', 'model');

  }

  # We are using this because the normal methods were overridden
  function id_get($id)
  {
    $res = $this->model->getLadder($id);
    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  /**
  * edit single
  * @param  int $id [description]
  */
  function id_post($id)
  {

    $data = $this->input->post();
    $res = $this->model->updateLadder($id, $data);

    if ($res || $res === 0) {
      $res = $this->model->getLadder($id);
      $this->response_header('Location', api_url($this) . 'id/' . $id); # Set the newly created object's location
      $this->response($res, 200);
    } elseif ($res === null) {
      $this->response(['message' => 'Not found'], 404);
    } else {
      $this->response(['message' => 'Malformed syntax'], 400);
    }
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
