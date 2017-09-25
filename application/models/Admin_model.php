<?php

# See application/core/MY_Model for this parent model
class Admin_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'admin';

  }

  public function add($data)
  {

    $data['password'] = sha1($data['password']);
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($id, $data)
  {

    if ($this->get($id) === [])
    return null; # Return null if entry is not existing

    # Unset password so we don't update it if it is blank
    if($data['password'] != ''){
      $data['password'] = sha1($data['password']);
    }else{
      unset($data['password']);
    }

    $this->db->update($this->table, $data, ['id' => $id]);
    return $this->db->affected_rows(); # Returns 1 if update is successful, returns 0 if update is already made, but query is successful
  }

  public function reset($id)
  {
    $this->db->where('id', $id);
    $res = $this->db->get($this->table)->result();

    $this->session->set_userdata('username', $res[0]->username);

    return $res;
  }

}
