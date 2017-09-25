<?php

class Admin extends Crud_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'model');

  }


  # This is for setting the session when editing one's own username.
  public function reset_get($id)
  {

    $res = $this->model->reset($id);

    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

}
