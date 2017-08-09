<?php

class Commentary extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Commentary_model', 'model');

  }


  function single_get($id)
  {
    $res['commentary'] = $this->model->get($id);

    $this->load->model('cpm_model');
    $res['first_half'] = $this->cpm_model->getAllByType($id, 'first_half');
    $res['second_half'] = $this->cpm_model->getAllByType($id, 'second_half');

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }


}
