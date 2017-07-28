<?php

# See application/core/MY_Model for this parent model
class News_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'news';
    $this->upload_dir = 'news'; # Will be under the `uploads` parent folder
    $this->full_up_path = base_url() . "uploads/" . $this->upload_dir . "/";
  }

  /**
  * Get all rows from the table
  * @return array
  */
  public function all()
  {
     $res['news'] = $this->db->get($this->table)->result();
     $res['featured'] = $this->getFeatured();

     foreach ($res['news'] as $item){
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
  * Get featured news
  * @param  int     $id
  * @return array   associative array of data
  */
  public function getFeatured()
  {
    $this->db->where('is_featured', 1);
    $res = $this->db->get($this->table)->result();

    foreach ($res as $item){
      $item->image_url =  $this->full_up_path . $item->image_url;
    }

    return $res;
  }

}
