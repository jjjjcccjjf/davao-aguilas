<?php

class MY_Model extends CI_model
{
  # Just need to declare this but not needing it
  # I prefer more declarative class names than `MY_*`
}

class Crud_model extends CI_model
{
  /**
  * Your table name
  * @var string
  */
  protected $table;

  public function __construct()
  {
    parent::__construct();
    $this->table = 'crud';
  }

  /**
  * Get all rows from the table
  * @return array
  */
  public function all()
  {
    return $this->db->get($this->table)->result();
  }

  /**
  * Get specific row via id
  * @param  int     $id
  * @return array   associative array of data
  */
  public function get($id)
  {
    $this->db->where('id', $id);
    return $this->db->get($this->table)->result();
  }

  /**
  * Inserts to the table with the associative array provided
  * @param  array $data
  * @return int   the last insert id
  */
  public function add($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  /**
  * Deletes the row via id
  * @param  int $id
  * @return int number of rows deleted
  */
  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }

  /**
  * Simply updates the table matching the associative array provided
  * @param  int    $id    id of row to update
  * @param  array  $data  associative array of values to be updated
  * @return bool
  */
  public function update($id, $data)
  {
    return $this->db->update($this->table, $data, ['id' => $id]);
  }

  /**
  * Batch upload of the given $_FILES[key] multiple upload input
  * TODO: Refactor this to accept the key only
  * @param  array   $files   example value is $_FILES[key]
  * @return array           returns a multidimensional array in this structure array[key] => [0 => 'file1', 1 => 'file2']
  */
  public function batch_upload($files = [])
  {

    if($files == [] || $files == null ) return []; # Immediately returns an empty array if a parameter is not provided or key is not existing with the help of @ operator. Example @$_FILES['nonexistent_key']

    # Defaults
    $k = key($files); # Gets the `key` of the uplaoded thing on your form

    $uploaded_files = []; # Initialize empty return array
    $upload_path = 'uploads/your_dir'; # Your upload path starting from the `root folder`. NOTE: Change this as needed

    # Configs
    $config['upload_path'] = $upload_path; # Set upload path
    $config['allowed_types'] = 'gif|jpg|jpeg|png'; # NOTE: Change this as needed

    # Folder creation
    if (!is_dir($upload_path) && !mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true)){
      mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true); # You can set DEFAULT_FOLDER_PERMISSIONS constant in application/config/constants.php
    }

    foreach ($files['name'] as $key => $image) {
      $_FILES[$k]['name'] = $files['name'][$key];
      $_FILES[$k]['type'] = $files['type'][$key];
      $_FILES[$k]['tmp_name'] = $files['tmp_name'][$key];
      $_FILES[$k]['error'] = $files['error'][$key];
      $_FILES[$k]['size'] = $files['size'][$key];

      $filename = time() . "_" . $files['name'][$key]; # Renames the filename into timestamp_filename
      $images[] = $uploaded_files[$k][] = $filename; # Appends all filenames to our return array with the key

      $config['file_name'] = $filename;
      $this->upload->initialize($config);

      $this->upload->do_upload($k);
    }

    return $uploaded_files;
  }

  /**
   * Upload single file. Returns an empty array on failure
   * @param  string    $file_key   [description]
   * @return array                 [description]
   */
  public function upload($file_key)
  {
    @$file = $_FILES[$file_key];
    $upload_path = "uploads/your_dir";

    $config['upload_path'] = $upload_path; # NOTE: Change your directory as needed
    $config['allowed_types'] = 'gif|jpg|jpeg|png'; # NOTE: Change file types as needed
    $config['file_name'] = time() . '_' . $file['name']; # Set the new filename
    $this->upload->initialize($config);

    # Folder creation
    # TODO: Will refactor this and integrate it to the core upload class
    if (!is_dir($upload_path) && !mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true)){
      mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true); # You can set DEFAULT_FOLDER_PERMISSIONS constant in application/config/constants.php
    }

    if($this->upload->do_upload($file_key)){
      return [$file_key => $this->upload->data('file_name')];
    }else{
      // echo $this->upload->display_errors(); die();
      return [];
    }

  }

}