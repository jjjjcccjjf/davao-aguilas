<?php

# See application/core/MY_Model for this parent model
class Match_reports_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'match_reports';

  }

  /**
  * Get specific row via id
  * @param  int     $id
  * @return array   associative array of data
  */
  public function get($id)
  {
    $this->db->where('fixture_id', $id);
    return $this->db->get($this->table)->result();
  }

  public function update($id, $data)
  {
    if ($this->get($id) === [])
    return null; # Return null if entry is not existing

    $this->db->update($this->table, $data, ['fixture_id' => $id]);
    return $this->db->affected_rows(); # Returns 1 if update is successful, returns 0 if update is already made, but query is successful
  }

}
