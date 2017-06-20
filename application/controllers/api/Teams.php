<?php

class Teams extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Teams_model', 'model');

  }

  function index_post()
  {
    $data = array_merge($this->input->post(), $this->model->upload('image_url'));

    if($last_id = $this->model->add($data)){ # Try to add and get the last id
      $res = $this->model->get($last_id); # Get the last entry data
      $this->response_header('Location', api_url($this) .  $last_id); # Set the header location
      $this->response($res, 201);
    }else{
      $this->response(['message' => 'Malformed syntax'], 400);
    }
  }


}
