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

    $this->db->order_by('id', @$_GET['order_by']);

  }

  /**
  * Get all rows from the table
  * @return array
  */
  public function all()
  {
     $res['news'] = $this->db->get($this->table)->result();
     $res['featured'] = $this->getFeatured();

     $this->formatFields($res['news']);

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

    $this->formatFields($res);

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

    $this->formatFields($res);

    return $res;
  }

  /**
   * Set featured news
   * @param [type] $id [description]
   */
  public function setFeatured($id)
  {
    # Return 0 when id doesn't exist
    if($this->get($id) == [])
    return 0;

    $this->db->update($this->table, ['is_featured' => 0]);
    $this->db->update($this->table, ['is_featured' => 1], ['id' => $id]);

    return $this->db->affected_rows(); # Returns 1 if update is successful, returns 0 if update is already made, but query is successful
  }

  function formatFields($res){
    foreach ($res as $item){
      $item->image_url =  $this->full_up_path . $item->image_url;
      $item->created_at_f = date('F j, Y', strtotime($item->created_at));
    }
  }
}
