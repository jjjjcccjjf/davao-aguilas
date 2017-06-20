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
    # NOTE: This is an example usage of single upload
    $data = array_merge($this->input->post(), $this->model->upload('image_url'));

    if($last_id = $this->model->add($data)){ # Try to add and get the last id
      $res = $this->model->get($last_id); # Get the last entry data
      $this->response_header('Location', api_url($this) .  $last_id); # Set the header location
      $this->response($res, 201);
    }else{
      $this->response(['message' => 'Malformed syntax'], 400);
    }
  }

  function single_post($id)
  {
    # If upload failed, just set default post data
    if(($upload_arr = $this->model->upload('image_url')) === [])
    $data = $this->input->post();
    else # If upload was successful, merge array
    $data = array_merge($this->input->post(), $upload_arr);

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
