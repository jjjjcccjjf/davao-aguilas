<?php

class Fixtures extends Crud_controller
{

  public $client;

  function __construct()
  {
    parent::__construct();
    $this->load->model('Fixtures_model', 'model');

    $this->client = new GuzzleHttp\Client();

  }

  /**
  * [league_get description]
  * @param  [type] $league_id [description]
  * @param  [type] $type      fixtures or results
  * @return [type]            [description]
  */
  function leagues_get($league_id, $type){

    $res = $this->model->getFixtures($league_id, ucwords($type));

    // if($res['matches'] !== [] && $res['league_name'] !== null){ # Respond with 404 when the resource is not found
      $this->response($res, 200); # REVIEW: Hmmmmmm
    // }else{
    //   $this->response([], 200);
    // }
  }

  /**
   * combines fixture type1 with type2. type1 having priority
   * @param  [type] $type1 'ongoing'
   * @param  [type] $type2 'final'
   * @return [type]        [description]
   */
  function mixed_get($league_id, $type1, $type2)
  {
    $res = $this->client->request('GET', base_url() . "api/fixtures/leagues/$league_id/$type1");
    $type1_res = json_decode($res->getBody());

    $get_var = (@$_GET['page'] != null) ? "?page=" . $_GET['page'] : "";
    $get_var .= (@$_GET['per_page'] != null) ? "&per_page=" . $_GET['per_page'] : "";

    $res = $this->client->request('GET', base_url() . "api/fixtures/leagues/$league_id/$type2" . $get_var);
    $type2_res = json_decode($res->getBody());

    $type1_match = @$type1_res->matches[0];

    # Block for removing null if ongoing matches is empty
    $type2_res->ongoing_matches[] = $type1_match;
    if($type2_res->ongoing_matches[0] == null){
      $type2_res->ongoing_matches = [];
    }
    # / Block for removing null if ongoing matches is empty

    $this->response($type2_res, 200);

  }

  function upcoming_get(){

    $res = $this->model->getUpcoming();

    if($res['matches'] !== [] && $res['league_name'] !== null){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  function recent_get(){

    $res = $this->model->getRecent();

    if($res['matches'] !== [] && $res['league_name'] !== null){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  function single_get($id)
  {
    $res = $this->model->get($id);


    if($res || $res !== []){ # Respond with 404 when the resource is not found

      # For making match_stats never missing key
      if(!array_key_exists('match_stats', $res[0]))
      $res[0]->match_stats = [];

      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

}
