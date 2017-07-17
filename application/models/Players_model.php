<?php

# See application/core/MY_Model for this parent model
class Players_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'players';
    $this->upload_dir = 'players';
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
      $item->full_body_image_url =  $this->full_up_path . $item->full_body_image_url;

      $item->birth_date = date('Y-m-d', strtotime($item->birth_date));
      $item->birth_date_f = date('F j, Y', strtotime($item->birth_date));
      $item->team_name = $this->getTeamName($item->team_id);
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
      $item->full_body_image_url =  $this->full_up_path . $item->full_body_image_url;

      $item->birth_date = date('Y-m-d', strtotime($item->birth_date));
      $item->birth_date_f = date('F j, Y', strtotime($item->birth_date));
      $item->team_name = $this->getTeamName($item->team_id);
    }

    return $res;
  }


  public function getPlayersByTeamId($team_id)
  {
    $this->db->where('team_id', $team_id);
    $res = $this->db->get($this->table)->result();

    foreach ($res as $item){
      $item->image_url =  $this->full_up_path . $item->image_url;
      $item->full_body_image_url =  $this->full_up_path . $item->full_body_image_url;

      $item->birth_date = date('Y-m-d', strtotime($item->birth_date));
      $item->birth_date_f = date('F j, Y', strtotime($item->birth_date));
      $item->team_name = $this->getTeamName($item->team_id);
    }

    return $res;
  }

  function formatFields($res){
    // TODO:
  }
}
