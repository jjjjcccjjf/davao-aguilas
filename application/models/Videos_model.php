<?php

class Videos_model extends CI_model
{

  # Your table name here
  protected $table = 'videos';

  public function __construct()
  {
    parent::__construct();
  }

  public function all()
  {
    return $this->db->get($this->table)->result();
  }

  public function get($id)
  {
    $this->db->where('id', $id);
    return $this->db->get($this->table)->result();
  }

  public function add($data)
  {
    # TODO: Use YouTube API v3 to get the embed video duration
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

}
