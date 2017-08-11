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
  function leagues_get($league_id, $type){

    $res = $this->model->getFixtures($league_id, ucwords($type));

    // if($res['matches'] !== [] && $res['league_name'] !== null){ # Respond with 404 when the resource is not found
      $this->response($res, 200); # REVIEW: Hmmmmmm
    // }else{
    //   $this->response([], 200);
    // }
  }

  function upcoming_get(){

    $res = $this->model->getUpcoming();

    if($res['matches'] !== [] && $res['league_name'] !== null){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  function recent_get(){

    $res = $this->model->getRecent();

    if($res['matches'] !== [] && $res['league_name'] !== null){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  function single_get($id)
  {
    $res = $this->model->get($id);


    if($res || $res !== []){ # Respond with 404 when the resource is not found

      # For making match_stats never missing key
      if(!array_key_exists('match_stats', $res[0]))
      $res[0]->match_stats = [];

      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

}
