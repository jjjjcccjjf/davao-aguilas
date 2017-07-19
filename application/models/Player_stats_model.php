<?php

# See application/core/MY_Model for this parent model
class Player_stats_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'player_stats';

  }

  public function all()
  {
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
    }
  }

}
