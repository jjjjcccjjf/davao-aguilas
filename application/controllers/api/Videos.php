<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Videos extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->model('videos_model');
  }

  function index_get()
  {
    $res = $this->videos_model->all();
    $this->response(
      $res, 200
    );
  }

  function videos_get($id)
  {
    $res = $this->videos_model->get($id);

    if($res){

      $this->response(
        $res, 200
      );

    }else{
      $this->response(
        array('message' => 'Not found'), 404
      );
    }

  }

  function index_post()
  {

    if($last_id = $this->videos_model->add($this->input->post())){ # try to add and get the last id
      $res = $this->videos_model->get($last_id); # get the last entry data
      $this->response_header('Location', api_url($this) .  $last_id); # set the header location
      $this->response(
        $res, 201
      );
    }else{
      $this->response(
        array('message' => 'Malformed syntax'), 400
      );
    }

  }

  function index_put()
  {
    $this->response(
      array('message'=> 'Put request!'), 200
    );
  }

  function index_patch()
  {
    $this->response(
      array('message'=> 'Patch request!'), 200
    );
  }

}
