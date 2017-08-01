<?php

# See application/core/MY_Model for this parent model
class Team_stats_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'team_stats';

  }

  public function all()
  {
    $res = $this->db->get($this->table)->result();

    /* we strip off useless zeros such as 60.00 to 60 or 79.70 to 79.9 */
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
    $default_team_id = $this->Players_model->getDefaultSquad()[0]->team_id; # Get a single player from a squad then get his ID
    $res = $this->getStatsByTeamId($default_team_id);
    $this->formatFields($res);

    return $res;
  }

  public function formatFields($res)
  {
    foreach($res as &$val) {
      $val->stat_value = floatval($val->stat_value);
    }
  }

}
