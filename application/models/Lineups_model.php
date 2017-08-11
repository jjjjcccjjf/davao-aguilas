<?php

# See application/core/MY_Model for this parent model
class Lineups_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'lineups';

  }

  public function getDefaultLineup($fixture_id)
  {
    $team_id = $this->getTeamIdByName(DEFAULT_SQUAD);

    $this->db->where('fixture_id', $fixture_id);
    $this->db->where('team_id', $team_id);
    return $this->db->get($this->table)->result();
  }

}
