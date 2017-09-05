<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

  public $client;

  public function __construct()
  {
    parent::__construct();
    $this->client = new GuzzleHttp\Client();

  }

  public function notify($topic)
  {

    # Dirty SHIT!!
    if($topic == 'goal_scored'){

      $this->goal_notify($this->input->post('fixture_id'));
      die(); # shet shet shett
    }

    require_once(APPPATH.'libraries/firebase.php');

    $firebase = new Firebase();

    $t = $this->input->post('title');
    $b = $this->input->post('body');

    $res = array();
    $res['data']['title'] = $t;
    $res['data']['body'] = $b;
    $res['data']['fixture_id'] = $this->input->post('fixture_id');
    $res['data']['timestamp'] = date('Y-m-d G:i:s');

    $notification['title'] = $t;
    $notification['body'] = $b;

    $response = $firebase->sendToTopic($topic, $res, $notification);

    $is_json = ($response[0] == '{') ? 1 : 0;

      if(@json_decode($response)->message_id || $is_json){
        echo 1;
      }else{
        echo 0;
      }

    }

    public function goal_notify($fixture_id)
    { # Violating DRY like a BAWS!!! N!GG@ #SHEEEET


      # Get match data first
      $res = $this->client->request('GET', base_url() . 'api/fixtures/' . $fixture_id);
      $fixture_body = json_decode($res->getBody())[0];

      require_once(APPPATH.'libraries/firebase.php');

      $firebase = new Firebase();

      $t = 'Goal!';
      $b =
      $fixture_body->home_team_name . " " . $fixture_body->home_score .
      " - " . $fixture_body->away_score . " " . $fixture_body->away_team_name;

      $res = array();
      $res['data']['title'] = $t;
      $res['data']['body'] = $b;
      $res['data']['fixture_id'] = $this->input->post('fixture_id');
      $res['data']['timestamp'] = date('Y-m-d G:i:s');

      $notification['title'] = $t;
      $notification['body'] = $b;

      $response = $firebase->sendToTopic('goal_scored', $res, $notification);

      $is_json = ($response[0] == '{') ? 1 : 0;

        if(@json_decode($response)->message_id || $is_json){
          echo 1;
        }else{
          echo 0;
        }

      }

    }
