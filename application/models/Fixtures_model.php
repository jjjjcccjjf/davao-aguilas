<?php

# See application/core/MY_Model for this parent model
class Fixtures_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'fixtures';

    $this->upload_dir = 'teams'; # REVIEW: Hmmm. Is this ok? Since there's no uploading, might as well use this (?)
    $this->full_up_path = base_url() . "uploads/" . $this->upload_dir . "/";
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

    $res['matches'] = $fixtures;

    $res['league_name'] = $this->getLeagueName($fixtures[0]->league_id);
    return $res;
  }

  function formatFields($res){
    foreach ($res as $item){
      $item->home_team_name = $this->getTeamName($item->home_team_id);
      $item->away_team_name = $this->getTeamName($item->away_team_id);

      $item->match_schedule_f = date('l, d F Y', strtotime($item->match_schedule));
      $item->match_time = date('H:i', strtotime($item->match_schedule));
      $item->match_date = date('Y-m-d', strtotime($item->match_schedule));

      $item->home_team_image_url = $this->full_up_path . $this->getTeamImageUrl($item->home_team_id);
      $item->away_team_image_url = $this->full_up_path . $this->getTeamImageUrl($item->away_team_id);

      $item->league_name = $this->getLeagueName($item->league_id);
    }
  }

}
