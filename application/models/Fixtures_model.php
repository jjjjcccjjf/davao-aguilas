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
    $res['league_name'] = $this->getLeagueName(@$fixtures[0]->league_id);

    return $res;
  }

  function getUpcoming(){
    $fixtures = $this->db->query("SELECT * FROM `fixtures` WHERE `match_schedule` >= NOW() AND `match_progress` = 'Upcoming' ORDER BY `match_schedule` LIMIT 1")->result();
    $this->formatFields($fixtures);
    $res['matches'] = $fixtures;

    /** return empty array if the query found nothing **/
    if($fixtures == [])
    return [];

    $res['league_name'] = $this->getLeagueName($fixtures[0]->league_id);
    return $res;
  }

  /**
  * Inserts to the table with the associative array provided
  * @param  array $data
  * @return int   the last insert id
  */
  public function add($data)
  {
    $this->db->insert($this->table, $data);
    $insert_id =  $this->db->insert_id();

    $this->db->insert('match_reports', ['fixture_id' => $insert_id]);
    $this->db->insert('commentary', ['fixture_id' => $insert_id]);

    return $insert_id;
  }

  /**
  * Deletes the row via id
  * @param  int $id
  * @return int number of rows deleted
  */
  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);
    $affected_rows = $this->db->affected_rows();

    $this->db->where('fixture_id', $id);
    $this->db->delete('match_reports');

    $this->db->where('fixture_id', $id);
    $this->db->delete('commentary');

    return $affected_rows;
  }

  function getRecent(){
    $this->db->where('match_progress', 'final');
    $this->db->order_by('match_schedule', 'DESC');
    $this->db->limit(1);
    $fixtures = $this->db->get($this->table)->result();
    $this->formatFields($fixtures);

    $res['matches'] = $fixtures;

    /** return empty array if the query found nothing **/
    if($fixtures == [])
    return [];

    $res['league_name'] = $this->getLeagueName($fixtures[0]->league_id);
    return $res;
  }

  /**
  * Get specific row via id
  * @param  int     $id
  * @return array   associative array of data
  * @override
  */
  public function get($id)
  {
    $this->db->where('id', $id);
    $res = $this->db->get($this->table)->result();

    $this->load->model('match_stats_model');
    $match_stats = $this->match_stats_model->getMatchStatsByFixtureId($id);

    if($match_stats != []){
      $res[0]->match_stats = $match_stats;
    }
    
    $this->formatFields($res);
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
