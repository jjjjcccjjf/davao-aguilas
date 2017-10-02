<?php

# See application/core/MY_Model for this parent model
class Players_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'players';
    $this->upload_dir = 'players';
    $this->uploads_folder = "uploads/" . $this->upload_dir . "/";
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

  /**
  * Get specific row via id
  * @param  int     $id
  * @return array   associative array of data
  */
  public function getByJerseyNum($jersey_num)
  {
    $this->db->where('jersey_num', $jersey_num);
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
    $this->db->order_by('lname', 'ASC');
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

  function getFeaturedStatistics($player_id, $position){
    $player_stats = $this->getPlayerStatistics($player_id);

    $featured_stats = [];

    switch($position){
      case 'Goalkeeper': $featured_array = GOALKEEPER_FEAT_STATS; break;
      case 'Defender': $featured_array = DEFENDER_FEAT_STATS; break;
      case 'Midfielder': $featured_array = MIDFIELDER_FEAT_STATS; break;
      case 'Forward': $featured_array = FORWARD_FEAT_STATS; break;
    }

    foreach($player_stats as $stat){
      if(in_array($stat->stat_key, $featured_array)){
        $featured_stats[]  = $stat;
      }
    }

    return $featured_stats;

  }

  function formatFields($res){
    foreach ($res as $item){
      $item->image_url =  $this->full_up_path . $item->image_url;

      $image_orientation = @exif_read_data( FCPATH . $this->uploads_folder . $item->full_body_image_url )['Orientation'];

      if ($image_orientation && $image_orientation > 1) {
        switch ($image_orientation) {
          case 3:
            $item->rotate_image = 180;
            break;
          case 6:
            $item->rotate_image = -90;
            break;
          case 8:
            $item->rotate_image = 90;
            break;
          default:
            $item->rotate_image = 0;
            break;
        }
      }

      $item->full_body_image_url =  $this->full_up_path . $item->full_body_image_url;

      $item->birth_date = date('Y-m-d', strtotime($item->birth_date));
      $item->birth_date_f = date('F j, Y', strtotime($item->birth_date));
      $item->team_name = $this->getTeamName($item->team_id);

      $item->age = date_diff(date_create(date('Y-m-d', strtotime($item->birth_date))), date_create('today'))->y;

      $item->stats = $this->getPlayerStatistics($item->id);
      $item->featured_stats = $this->getFeaturedStatistics($item->id, $item->position);
    }
  }


    /**
    * Deletes the row via id
    * @param  int $id
    * @return int number of rows deleted
    */
    public function delete($id)
    {
      $item = $this->getImage($id, 'image_url');
      unlink($item);
      $item = $this->getImage($id, 'full_body_image_url');
      unlink($item);

      $this->db->where('id', $id);
      $this->db->delete($this->table);
      return $this->db->affected_rows();
    }

}
