<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

  public $client;

  public function __construct()
  {
    parent::__construct();
    $this->client = new GuzzleHttp\Client();

  }

  # Dear maintainer, refactor this to a dispatcher kinda shit
  # Everything goes through this function and then calls other function
  # Just like the closest if statement below
  public function notify($topic)
  {

    # Dirty SHIT!!
    if($topic == 'goal_scored'){

      $this->goal_notify($this->input->post('fixture_id'));
      die(); # shet shet shett
    }

    # Get match data first
    $res = $this->client->request('GET', base_url() . 'api/fixtures/'
    . $this->input->post('fixture_id'));
    $fixture_body = json_decode($res->getBody())[0];

    require_once(APPPATH.'libraries/firebase.php');

    $firebase = new Firebase();

    $t = $this->input->post('title');
    $b = $this->input->post('body');

    $res = array();
    $res['data']['title'] = $t;
    $res['data']['body'] = $b;
    $res['data']['topic'] = $topic;

    $res['data']['home_score'] = $fixture_body->home_score;
    $res['data']['away_score'] = $fixture_body->away_score;
    $res['data']['home_team_name'] = $fixture_body->home_team_name;
    $res['data']['away_team_name'] = $fixture_body->away_team_name;
    $res['data']['home_team_image_url'] = $fixture_body->home_team_image_url;
    $res['data']['away_team_image_url'] = $fixture_body->away_team_image_url;
    $res['data']['match_progress'] = $fixture_body->match_progress;
    $res['data']['location'] = $fixture_body->location;
    $res['data']['match_date'] = $fixture_body->match_date;
    $res['data']['match_date_f'] = date('F j, Y', strtotime($fixture_body->match_date));
    $res['data']['match_time'] = $fixture_body->match_time;

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
      # Don't try this at home, BEEETCH!!

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
      $res['data']['topic'] = 'goal_scored';

      $res['data']['home_score'] = $fixture_body->home_score;
      $res['data']['away_score'] = $fixture_body->away_score;
      $res['data']['home_team_name'] = $fixture_body->home_team_name;
      $res['data']['away_team_name'] = $fixture_body->away_team_name;
      $res['data']['home_team_image_url'] = $fixture_body->home_team_image_url;
      $res['data']['away_team_image_url'] = $fixture_body->away_team_image_url;
      $res['data']['match_progress'] = $fixture_body->match_progress;
      $res['data']['location'] = $fixture_body->location;
      $res['data']['match_date'] = $fixture_body->match_date;
      $res['data']['match_date_f'] = date('F j, Y', strtotime($fixture_body->match_date));
      $res['data']['match_time'] = $fixture_body->match_time;

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
