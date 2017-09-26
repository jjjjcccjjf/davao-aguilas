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
    return $this->formatNull($this->db->get($this->table)->result());
  }

  public function formatNull($res)
  {
    foreach($res as $key => $val){
      if($res[$key]->icon_type == null || $res[$key]->icon_type == ''){
        $res[$key]->icon_type = 'N/A';
      }
    }
    return $res;
  }


  /**
  * Inserts to the table with the associative array provided
  * @param  array $data
  * @return int   the last insert id
  */
  public function add($data)
  {
    # delete all blank
    $this->db->where('minute_mark', '');
    $this->db->delete($this->table);
    $this->db->flush_cache();

    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  /**
   * [update description]
   * @param  [type] $id   general_stats ID
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  public function update($id, $data)
  {

    if ($this->get($id) === [])
    return null; # Return null if entry is not existing

    # We check here if stat is already existing
    $this->db->where(['fixture_id' => $data['fixture_id'], 'minute_mark' => $data['minute_mark']]);

    # If there are 2 or more stats with the same name
    $existing_item = $this->db->get($this->table)->result();

    $existing_item_id = @$existing_item[0]->id; # Exsisting Gen stat ID

    $this->db->flush_cache();

    # Handle whether the stat is existing or not
    if($existing_item_id != null && ($existing_item_id != $id) ){ # if gen_stat_id has a value
      # If Stat already exists
      $this->db->update($this->table, $data, ['id' => $existing_item_id]);
      $update_status =  $this->db->affected_rows(); # Returns 1 if update is successful, returns 0 if update is already made, but query is successful

      $this->db->where('id', $id);
      $this->db->delete($this->table);
      $this->db->flush_cache();

    }else{
      $this->db->update($this->table, $data, ['id' => $id]);
      $update_status =  $this->db->affected_rows(); # Returns 1 if update is successful, returns 0 if update is already made, but query is successful
    }

    # delete all blank
    $this->db->where('minute_mark', '');
    $this->db->delete($this->table);
    $this->db->flush_cache();

    return $update_status;
  }


}
