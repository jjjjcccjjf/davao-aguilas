<?php

# See application/core/MY_Model for this parent model
class Cpm_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'cpm';

  }

}
