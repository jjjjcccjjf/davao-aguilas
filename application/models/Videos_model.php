<?php

class Videos_model extends Crud_model # See application/core/MY_Model for this
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'videos';
  }

}
