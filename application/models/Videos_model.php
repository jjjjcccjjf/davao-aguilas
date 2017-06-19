<?php

# See application/core/MY_Model for this child model
class Videos_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'videos';

    #TODO: Duration
  }

}
