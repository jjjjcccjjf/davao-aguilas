<?php

class Fixtures extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Fixtures_model', 'model');

  }

  /**
  * [league_get description]
  * @param  [type] $league_id [description]
  * @param  [type] $type      fixtures or results
  * @return [type]            [description]
  */
  function league_get($league_id, $type){

    $res = $this->model->getFixtures($league_id, ucwords($type));

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }
}
