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
    foreach($res as &$val) {
      $val->stat_value = floatval($val->stat_value);
    }

    return $res;
  }

}
