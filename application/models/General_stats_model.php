<?php

# See application/core/MY_Model for this parent model
class General_stats_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'general_stats';

    $this->upload_dir = 'players';
    $this->uploads_folder = "uploads/" . $this->upload_dir . "/";
    $this->full_up_path = base_url() . "uploads/" . $this->upload_dir . "/";


  }

  public function all()
  {
    $res = $this->db->get($this->table)->result();

    $this->formatFields($res);

    return $res;
  }

  public function getStatsByTeamId($team_id)
  {
    $this->db->where('team_id', $team_id);
    $res = $this->db->get($this->table)->result();

    $this->formatFields($res);

    return $res;
  }

  public function getDefaultTeamStats()
  {
    $this->load->model('Players_model');
    $default_team_id = $this->getTeamIdByName(DEFAULT_SQUAD); # Find in constants
    $res = $this->getStatsByTeamId($default_team_id);
    $this->formatFields($res);

    return $res;
  }

  public function getStatsByPlayerId($player_id)
  {
    $this->db->where('player_id', $player_id);
    $res = $this->db->get($this->table)->result();

    $this->formatFields($res);

    return $res;
  }

  public function formatFields($res)
  {
    foreach($res as $val) {
      if(is_numeric($val->stat_value))
      $val->stat_value = floatval($val->stat_value);

      $val->name = $this->getPlayerNameById($val->player_id);
      $val->position = $this->getPlayerPositionById($val->player_id);
      $val->jersey_num = $this->getJerseyNumById($val->player_id);
      $val->image_url = $this->full_up_path . $this->getPlayeImageById($val->player_id);
    }
  }

}
