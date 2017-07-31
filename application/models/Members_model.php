<?php

# See application/core/MY_Model for this parent model
class Members_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'members';

  }


  /**
  * Get all rows from the table
  * @return array
  */
  public function all()
  {
    $res = $this->db->get($this->table)->result();
    $this->formatFields($res);

    return $res;
  }

  function formatFields($res){
    foreach ($res as $item){
      $item->birth_date_f = date('F j, Y', strtotime($item->birth_date));
    }
  }

}
