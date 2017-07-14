<?php

# See application/core/MY_Model for this parent model
class Ladders_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'Ladders';
  }

  /**
  * Get all rows from the table
  * @return array
  */
  public function all()
  {
     $res = $this->db->get($this->table)->result();

     foreach ($res as $item){
       $item->team_name = $this->getTeamName($item->team_id);
       $item->league_name = $this->getLeagueName($item->league_id);
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
      $item->team_name = $this->getTeamName($item->team_id);
      $item->league_name = $this->getLeagueName($item->league_id);
    }

    return $res;
  }

}
