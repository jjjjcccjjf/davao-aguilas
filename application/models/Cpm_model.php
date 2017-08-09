<?php

# See application/core/MY_Model for this parent model
class Cpm_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'cpm';

  }

  public function getAllByType($id, $type)
  {
    $this->db->where('fixture_id', $id);
    $this->db->where('coverage_type', $type);
    return $this->db->get($this->table)->result();
  }

}
