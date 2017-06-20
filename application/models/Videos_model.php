<?php

# See application/core/MY_Model for this parent model
class Videos_model extends Crud_model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'videos';
    $this->upload_dir = 'video_thumbnails';

    #TODO: Duration
  }

}
