<?php

# See application/core/MY_Model for this parent model
class Teams_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'teams';
    $this->upload_dir = 'teams';
    $this->full_up_path = base_url() . "uploads/" . $this->upload_dir . "/";

  }

  /**
  * Get all rows from the table
  * @return array
  */
  public function all()
  {
     $res = $this->db->get($this->table)->result();

     foreach ($res as $item){
       $item->image_url =  $this->full_up_path . $item->image_url;
     }

     return $res;
  }

  /**
  * Get specific row via id
  * @param  int     $id
  * @return array   associative array of data
  */
  public function get($id)
  {
    $this->db->where('id', $id);
    $res = $this->db->get($this->table)->result();

    foreach ($res as $item){
      $item->image_url =  $this->full_up_path . $item->image_url;
    }

    return $res;
  }

  public function getDefaultTeamId()
  {
    return $this->getTeamIdByName(DEFAULT_SQUAD);
  }

}
