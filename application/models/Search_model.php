<?php

# See application/core/MY_Model for this parent model
class Search_model extends CI_model
{

  public function __construct()
  {
    parent::__construct();

  }

  public function getTeamIdByTeamName($team_name)
  {
    $this->db->like('name', $team_name);
    $res = $this->db->get('teams')->result();

    $team_ids = [];
    foreach ($res as $team) {
      $team_ids[] = $team->id;
    }

    return $team_ids;
  }

  public function getNewsIdsByTitle($title)
  {
    $this->db->like('title', $title);
    $res = $this->db->get('news')->result();

    $news_arr = [];
    foreach($res as $news){
      $news_arr[] = ['id' => $news->id, 'title' => $news->title, 'created_at' => $news->created_at ];
    }

    return $news_arr;
  }

  public function checkFixture($team_id)
  {
    $this->db->or_like(['home_team_id' => $team_id, 'away_team_id' => $team_id ]);
    $res = $this->db->get('fixtures')->result();

    $fixtures_arr = [];

    foreach($res as $fixture){
      $fixtures_arr[$fixture->id] =
      array('title' => $this->getTeamNameById($fixture->home_team_id) . " vs "
      . $this->getTeamNameById($fixture->away_team_id) . " on " .
      date('l, d F Y', strtotime($fixture->match_schedule)),
      'created_at' => $fixture->created_at
      );
    }

    return $fixtures_arr;
  }

  public function checkOthers($keyword)
  {
    $this->db->or_like(['location' => $keyword, 'match_progress' => $keyword,
    'hash_tag' => $keyword
   ]);
    $res = $this->db->get('fixtures')->result();

    $fixtures_arr = [];

    foreach($res as $fixture){
      $fixtures_arr[$fixture->id] =
      array(
        'title' => $this->getTeamNameById($fixture->home_team_id) . " vs "
        . $this->getTeamNameById($fixture->away_team_id) . " on " .
        date('l, d F Y', strtotime($fixture->match_schedule)),
        'created_at' => $fixture->created_at
      );
    }

    return $fixtures_arr;
  }

  /**
  * [getTeamNameById description]
  * @param  string $value [description]
  * @return [type]        [description]
  */
  public function getTeamNameById($id)
  {
    $this->db->where('id', $id);
    $res = $this->db->get('teams')->result();

    return @$res[0]->name;
  }


}
