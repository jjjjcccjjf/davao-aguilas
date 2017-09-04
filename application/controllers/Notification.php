<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

  }

  public function notify($topic)
  {
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
  }
