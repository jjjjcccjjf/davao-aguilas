<?php

class General_stats extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('General_stats_model', 'model');
  }

  /**
  * [team_get description]
  * @param  [type] $team_id [description]
  * @param  [type] $param   'default' means return davao's default player stats
  * @return [type]          [description]
  */
  function team_get($team_id, $param = null){
    if($param == 'default'){
       $res = $this->model->getDefaultTeamStats();
    }else{
       $res = $this->model->getStatsByTeamId($team_id);
    }


    $squad = [];

    foreach (GENERAL_PLAYER_STATS as $item) {
      $squad[$item] = ["players"=>[]];
    }

    foreach($res as $item){
      if(in_array($item->stat_key, GENERAL_PLAYER_STATS)){
        $squad[$item->stat_key]['players'][] = $item;
      }
    }

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($squad, 200);
    }else{
      $this->response([], 200);
    }
  }

}
