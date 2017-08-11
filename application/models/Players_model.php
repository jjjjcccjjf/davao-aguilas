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
    $this->db->order_by('lname', 'ASC');

    $res = $this->db->get($this->table)->result();
    $this->formatFields($res);

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

    $this->formatFields($res);

    return $res;
  }

  public function getPlayersByTeamId($team_id)
  {
    $this->db->where('team_id', $team_id);
    $res = $this->db->get($this->table)->result();

    $this->formatFields($res);

    return $res;
  }

  public function getPlayersByTeamIdAndPosition($team_id, $position)
  {

    foreach(PLAYER_POSITIONS as $pos){
      /**
      * if a string matches an element in our PLAYER_POSITIONS constant, use that element
      * as our position search query. For ex., if strtolower('Goalkeeper') is present in `goalkeepers`
      * query string, use it
      */
      if (strpos($position, strtolower($pos) ) !== false){
        $position_q = $pos; break;
      }else{
        $position_q = null;
      }
    }

    $this->db->where('team_id', $team_id);
    $this->db->where('position', $position_q);
    $res = $this->db->get($this->table)->result();

    $this->formatFields($res);

    return $res;
  }

  /**
  * Get all squad by id
  * @return array
  */
  public function getSquad($id)
  {
    $res = $this->getPlayersByTeamId($id);
    return $res;
  }

  /**
  * Get default squad id
  * @return array
  */
  public function getDefaultSquad()
  {
    $team_id = $this->getTeamIdByName(DEFAULT_SQUAD); # Find in constants

    $this->db->where('team_id', $team_id);
    $res = $this->db->get($this->table)->result();

    $this->formatFields($res);

    return $res;
  }

  public function getPlayerStatistics($player_id)
  {
    $this->db->where('player_id', $player_id);
    $res = $this->db->get('player_stats')->result();

    foreach($res as $val) {
      if(is_numeric($val->stat_value))
      $val->stat_value = floatval($val->stat_value);

      unset($val->created_at);
      unset($val->updated_at);
      unset($val->player_id);
    }

    return $res;
  }

  function formatFields($res){
    foreach ($res as $item){
      $item->image_url =  $this->full_up_path . $item->image_url;
      $item->full_body_image_url =  $this->full_up_path . $item->full_body_image_url;

      $item->birth_date = date('Y-m-d', strtotime($item->birth_date));
      $item->birth_date_f = date('F j, Y', strtotime($item->birth_date));
      $item->team_name = $this->getTeamName($item->team_id);

      $item->age = date_diff(date_create(date('Y-m-d', strtotime($item->birth_date))), date_create('today'))->y;

      $item->stats = $this->getPlayerStatistics($item->id);
    }
  }

}
