<?php

class Match_stats extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Match_stats_model', 'model');

  }

  function fixtures_get($fixture_id){

    $res = $this->model->getMatchStatsByFixtureId($fixture_id);
    
    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

}
