<?php

define('LINE_API_URL'  ,"https://notify-api.line.me/api/notify");
define('LINE_API_TOKEN','2427s3EAAJfJL38Txxv3c2VvjucJWDSXZ8UUTZsSfGU');    // 「ACCESS_TOKEN」を取得したアクセストークンに置き換える
class Send extends CI_Controller {

  
  public function index(){

    $this->load->model('send_message');

    $this->send_message->post_message('hello');
  }

}