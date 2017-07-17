<?php

# See application/core/MY_Model for this parent model
class Ladders_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'Ladders';

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

  public function getStandings($league_id)
  {
    $home = $this->getStandingsByCourtType($league_id, 'Home');
    $away = $this->getStandingsByCourtType($league_id, 'Away');

    $res = [];

    foreach($home as $row){
      $arr = [];
      foreach($away as $inner){
        if($row->team_id == $inner->team_id && $inner->court_type == 'Away'){
          $arr['wins'] = $row->wins + $inner->wins;
          $arr['losses'] = $row->losses + $inner->losses;
          $arr['draws'] = $row->draws + $inner->draws;
          $arr['matches_played'] = $row->matches_played + $inner->matches_played;
          $arr['goal_difference'] = $row->goal_difference + $inner->goal_difference;
          $arr['points'] = $row->points + $inner->points;
          $arr['team_id'] = $row->team_id;
          $arr['team_name'] = $row->team_name;
          $arr['team_image_url'] = $row->team_image_url;
        }
      }
      $res['standings'][] = $arr;
    }

    $res['league_name'] = $this->getLeagueName($league_id);
    return $res;
  }

  public function getStandingsByCourtType($league_id, $court_type)
  {
    $this->db->where('league_id', $league_id);
    $this->db->where('court_type', $court_type);
    $res = $this->db->get($this->table)->result();

    $this->formatFields($res);

    return $res;
  }

  function formatFields($res){
    foreach ($res as $item){
      $item->team_name = $this->getTeamName($item->team_id);
      $item->team_image_url = $this->full_up_path . $this->getTeamImageUrl($item->team_id);

      $item->league_name = $this->getLeagueName($item->league_id);
    }
  }

}
