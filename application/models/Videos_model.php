<?php

# See application/core/MY_Model for this parent model
class Videos_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'videos';
    $this->upload_dir = 'video_thumbnails';
    $this->uploads_folder = "uploads/" . $this->upload_dir . "/";
    $this->full_up_path = base_url() . "uploads/" . $this->upload_dir . "/";

    $this->db->order_by('id', 'DESC');
  }

  /**
  * Get all rows from the table
  * @return array
  */
  public function all()
  {
    $res['videos'] = $this->db->get($this->table)->result();
    $res['featured'] = $this->getFeatured();

    $this->formatFields($res['videos']);

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
  * Get featured video
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
  * Get video by type
  * @param  int     $id
  * @return array   associative array of data
  */
  public function getVideosByType($type)
  {

    switch ($type) {
      case 'news-and-highlights':
      $this->db->where('type', 'News & Highlights');
      break;
      case 'club-videos':
      $this->db->where('type', 'Club Videos');
      break;
    }
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
      $item->embed_code = $item->url; # Just an alias for url.. since URL is wrong in this case

      # Block for giving embed code
      $result = substr($item->url, strpos($item->url, "https"));
      $result = substr($result, 0, strpos($result, "\" frame"));
      $item->embed_url =  $result;

      $item->created_at_f = date('F j, Y', strtotime($item->created_at));
    }
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
