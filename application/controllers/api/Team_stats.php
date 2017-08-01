<?php

class Team_stats extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Team_stats_model', 'model');

  }

  /**
   * [team_get description]
   * @param  [type] $team_id [description]
   * @param  [type] $param   'default' means return davao's default team stats
   * @return [type]          [description]
   */
   function team_get($team_id, $param = null){

    if($param == 'default'){
      $res = $this->model->getDefaultTeamStats();
    }else{
      $res = $this->model->getStatsByTeamId($team_id);
    }

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

}
