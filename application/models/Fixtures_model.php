<?php

# See application/core/MY_Model for this parent model
class Fixtures_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'fixtures';

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

  function getFixtures($league_id, $type){

    $this->db->where('match_progress', $type);
    $this->db->where('league_id', $league_id);
    $fixtures = $this->db->get($this->table)->result();
    $this->formatFields($fixtures);

    $res['fixtures'] = $fixtures;

    $res['league_name'] = $this->getLeagueName($fixtures[0]->league_id);
    return $res;
  }

  function formatFields($res){
    foreach ($res as $item){
      $item->home_team_name = $this->getTeamName($item->home_team_id);
      $item->away_team_name = $this->getTeamName($item->away_team_id);

      $item->match_time = date('H:i:s', strtotime($item->match_schedule));
      $item->match_date = date('Y-m-d', strtotime($item->match_schedule));

      $item->league_name = $this->getLeagueName($item->league_id);
    }
  }

}
