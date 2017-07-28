<?php

class News extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('News_model', 'model');

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

  function featured_get(){
    $res = $this->model->getFeatured();

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  function featured_post($id){

    if($this->model->setFeatured($id)){
      $res = $this->model->get($id); # Get the last entry data
      $this->response_header('Location', api_url($this) .  $id); # Set the header location
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404); #REVIEW: Set appropriate response
    }
  }

}
