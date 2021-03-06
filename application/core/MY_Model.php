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

  /**
  * The directory you want to upload to whose parent dir is `uploads` folder
  * @var [type]
  */
  protected $upload_dir;

  public function __construct()
  {
    parent::__construct();
    $this->table = 'crud';
    $this->upload_dir = 'your_dir';
    $this->uploads_folder = "uploads/" . $this->upload_dir . "/";
    $this->full_up_path = base_url() . "uploads/" . $this->upload_dir . "/"; # override this on your child class. just redeclare it

    # Use `$this->db->reset_query();` on the child class to override these two. Then redeclare them as needed
    // $this->db->order_by('id', 'DESC');

    $this->paginate(); # apply pagination to all methods
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

  public function getImage($id, $key)
  {
    $this->db->where('id', $id);
    return $this->uploads_folder . $this->db->get($this->table)->result()[0]->$key;
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
    if ($this->get($id) === [])
    return null; # Return null if entry is not existing

    $this->db->update($this->table, $data, ['id' => $id]);
    return $this->db->affected_rows(); # Returns 1 if update is successful, returns 0 if update is already made, but query is successful
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
    $upload_path = 'uploads/' . $this->upload_dir; # Your upload path starting from the `root folder`. NOTE: Change this as needed

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
    $upload_path = "uploads/" . $this->upload_dir;

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

  /* Custom scripts for Davao Aguilas only */

  /**
  * return team name based on team_id
  * @param  int       $id      players.team_id
  * @return string             team name
  */
  public function getTeamName($id)
  {
    $this->db->where('id', $id);
    $res = $this->db->get('teams')->result();

    return @$res[0]->name;
  }
  /**
  * return league name based on league_id
  * @param  int       $id      players.league_id
  * @return string             team name
  */
  public function getLeagueName($id)
  {
    $this->db->where('id', $id);
    $res = $this->db->get('leagues')->result();

    return @$res[0]->name;
  }
  /**
  * return image_url based on image_id
  * @param  int       $id      teams.id
  * @return string             teams.image_url
  */
  public function getTeamImageUrl($id)
  {
    $this->db->where('id', $id);
    $res = $this->db->get('teams')->result();

    return @$res[0]->image_url;
  }
  /**
  * return image_url based on image_id
  * @param  string       $needle      teams.id
  * @return int                       teams.id
  */
  public function getTeamIdByName($team_name)
  {
    $this->db->like('name', $team_name);
    $res = $this->db->get('teams')->result();

    $this->db->flush_cache();

    return @$res[0]->id;
  }

  /**
  * return player name based on player_id
  * @param  int       $player_id      player.id
  * @return string                    player.fname . " " . player.lname
  */
  public function getPlayerNameById($player_id)
  {
    $this->db->where('id', $player_id);
    $res = $this->db->get('players')->result();

    return (@$res[0]->fname . " " . @$res[0]->lname);
  }

  public function getTeamIdByPlayerId($player_id)
  {
    $this->db->where('id', $player_id);
    $res = $this->db->get('players')->result();

    return (@$res[0]->team_id);
  }

  public function getPlayerPositionById($player_id)
  {
    $this->db->where('id', $player_id);
    $res = $this->db->get('players')->result();

    return (@$res[0]->position);
  }

  public function getPlayeImageById($player_id)
  {
    $this->db->where('id', $player_id);
    $res = $this->db->get('players')->result();

    return (@$res[0]->image_url);
  }

  public function getJerseyNumById($player_id)
  {
    $this->db->where('id', $player_id);
    $res = $this->db->get('players')->result();

    return (@$res[0]->jersey_num);
  }

  /**
  * this is for pagination
  * uses $this->input->get('page') and $this->input->get('per_page')
  * @return [type] [description]
  */
  public function paginate()
  {
    if ($this->input->get('page')){
      $per_page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 10; # Make 10 default $per_page if $per_page is not set
      $offset = ($_GET['page'] - 1) * $per_page;
      $this->db->limit($per_page, $offset);
    }
  }

}
