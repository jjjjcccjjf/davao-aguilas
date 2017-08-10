<?php

# See application/core/MY_Model for this parent model
class Geo_tags_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'geo_tags';

  }


  /**
  * Inserts to the table with the associative array provided
  * @param  array $data
  * @return int   the last insert id
  */
  // public function add($data)
  // {

    // $id = $this->getIdByDeviceId($data['device_id']);
    // 
    // if($id === null){
    //   $this->db->insert($this->table, $data);
    //   return $this->db->insert_id();
    // }
    // else{
    //   $this->db->update($this->table, $data, ['id' => $id]);
    //   if(in_array ($this->db->affected_rows(), [1,0]) ) return $id;
    // }

  // }

  public function getIdByDeviceId($device_id = null)
  {
    $this->db->where('device_id', $device_id);
    $res = $this->db->get($this->table)->result();

    return @$res[0]->id;
  }

}
