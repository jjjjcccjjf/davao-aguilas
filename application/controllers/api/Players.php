<?php

class Players extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Players_model', 'model');

  }

  function index_post()
  {
    $data = array_merge($this->input->post(), array_merge($this->model->upload('image_url'), $this->model->upload('full_body_image_url')));

    if($last_id = $this->model->add($data)){ # Try to add and get the last id
      $res = $this->model->get($last_id); # Get the last entry data
      $this->response_header('Location', api_url($this) .  $last_id); # Set the header location
      $this->response($res, 201);
    }else{
      $this->response(['message' => 'Malformed syntax'], 400);
    }
  }


  /**
  * edit single
  * we override MY_Model's because we need to include full_body_image_url too
  * @param  int $id [description]
  */
  function single_post($id)
  {
    $data = array_merge($this->input->post(), array_merge($this->model->upload('image_url'), $this->model->upload('full_body_image_url')));
    
    $res = $this->model->update($id, $data);

    if ($res || $res === 0) {
      $res = $this->model->get($id);
      $this->response_header('Location', api_url($this) .  $id); # Set the newly created object's location
      $this->response($res, 200);
    } elseif ($res === null) {
      $this->response(['message' => 'Not found'], 404);
    } else {
      $this->response(['message' => 'Malformed syntax'], 400);
    }
  }

  /**
  * get players by team id
  * @param  [type] $team_id [description]
  * @return [type]          [description]
  */
  function team_get($team_id = null, $position = null){

    if($position == null){ # Return everyone if position is blank
      $res = $this->model->getPlayersByTeamId($team_id);
    }else{
      $res = $this->model->getPlayersByTeamIdAndPosition($team_id, $position);
    }

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  /**
  * return squad based on param.
  * @param  int | string   $param [description]
  * @return arr            result
  */
  public function squad_get($param)
  {
    if($param == 'default'){
      $res = $this->model->getDefaultSquad();
    }else{
      $res = $this->model->getSquad($param);
    }

    $squad = [];

    foreach($res as $item){
      if(in_array($item->position, PLAYER_POSITIONS)){
        $squad[$item->position]['players'][] = $item;
      }
    }

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($squad, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

}
