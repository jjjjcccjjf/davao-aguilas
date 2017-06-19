<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class MY_Controller extends \Restserver\Libraries\REST_Controller
{
  # Just need to declare this but not needing it
  # I prefer more declarative class names than `MY_*`
}

class Crud_controller extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    // $this->load->model('Crud_model', 'model');
  }

  function index_get()
  {
    $res = $this->model->all();
    $this->response($res, 200);
  }

  function single_get($id)
  {
    $res = $this->model->get($id);
    if($res || $res !== []){
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  function index_post()
  {
    # NOTE: This is an example usage of batch upload
    // $data = array_merge($this->input->post(), $this->model->batch_upload($_FILES['input_name']));

    # NOTE: This is an example usage of single upload
    // $data = array_merge($this->input->post(), $this->model->upload('some_text_field'));

    $data = $this->input->post();

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
  * @param  int $id [description]
  */
  function single_post($id)
  {

    # If upload failed, just set default post data
    if(($upload_arr = $this->model->upload('some_text_field')) === [])
    $data = $this->input->post();
    else # If upload was successful, merge array
    $data = array_merge($this->input->post(), $upload_arr);

    $res = $this->model->update($id, $data);

    if($res){
      $res = $this->model->get($id);
      $this->response_header('Location', api_url($this) .  $id); # Set the newly created object's location
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Malformed syntax'], 400);
    }
  }

  function single_delete($id)
  {
    $res = $this->model->delete($id);
    if($res > 0){
      $this->response($res, 204); # Omits the response anyway if 204
    }else{
      $this->response(['message' => 'Not found'], 404 );
    }
  }

}