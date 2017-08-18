<?php

class Lineups extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Lineups_model', 'model');
    $this->load->model('Players_model', 'players');

  }

  function default_get($fixture_id){
    $res = $this->model->getDefaultLineup($fixture_id);
    $squad = [];

    foreach (PLAYER_POSITIONS as $item) {
      $squad[$item] = ["players"=>[]];
    }

    foreach($res as $item){
      if(in_array($item->position, PLAYER_POSITIONS)){

        $item->player = $this->players->get($item->player_id);
        $squad[$item->position]['players'][] = $item;

      }
    }

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($squad, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }

  }

  function teams_get($fixture_id){
    $res = $this->model->getDefaultLineup($fixture_id);

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }

  }
}
