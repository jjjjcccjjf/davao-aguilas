<?php

class Geo_tags extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Geo_tags_model', 'model');

  }

  function index_post()
  {

    $data = $this->input->post();

    $id = $this->model->getIdByDeviceId($data['device_id']);

    # If item is not yet existing in the DB
    if($id === null){

      if($last_id = $this->model->add($data)){ # Try to add and get the last id
        $res = $this->model->get($last_id); # Get the last entry data
        $this->response_header('Location', api_url($this) .  $last_id); # Set the header location
        $this->response($res, 201);
      }else{
        $this->response(['message' => 'Malformed syntax'], 400);
      }

    }else{ # We update our resource

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

  }

}
