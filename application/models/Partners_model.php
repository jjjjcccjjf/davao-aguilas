<?php

# See application/core/MY_Model for this parent model
class Partners_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'partners';
    $this->upload_dir = 'partners';
    $this->uploads_folder = "uploads/" . $this->upload_dir . "/";
    $this->full_up_path = base_url() . "uploads/" . $this->upload_dir . "/";

    $this->db->order_by('title', 'ASC');
  }

  /**
  * Get all rows from the table
  * @return array
  */
  public function all()
  {
    $res = $this->db->get($this->table)->result();

    foreach ($res as $item){
      $item->image_url =  $this->full_up_path . $item->image_url;
    }

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

    foreach ($res as $item){
      $item->image_url =  $this->full_up_path . $item->image_url;
    }

    return $res;
  }


  /**
  * Deletes the row via id
  * @param  int $id
  * @return int number of rows deleted
  */
  public function delete($id)
  {
    $item = $this->getImage($id, 'image_url');
    unlink($item);

    $this->db->where('id', $id);
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }
}
