<?php

# See application/core/MY_Model for this parent model
class Match_stats_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'match_stats';

  }

  function getMatchStatsByFixtureId($fixture_id){
    $this->db->where('fixture_id', $fixture_id);
    $res = $this->db->get($this->table)->result();

    return $res;
  }

}
