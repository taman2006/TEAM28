<?php

define('LINE_API_URL'  ,"https://notify-api.line.me/api/notify");
define('LINE_API_TOKEN','2427s3EAAJfJL38Txxv3c2VvjucJWDSXZ8UUTZsSfGU');    // 「ACCESS_TOKEN」を取得したアクセストークンに置き換える
class Send extends CI_Controller {

  
  public function index(){

    $this->load->model('get_data');
    $array = $this->get_data->get_data();

    foreach($array as $vals){
      $time = $this->get_data->convertToDayTimeAgo($vals['limit_date']);
      if($time < 4 && $time > 0){
            echo '課題名：'.$vals['kadai_name'].'  / 期限：'.$vals['limit_date'].'  / '.$time.'日前';
            echo '<br>';
          }
    }     
        
   

    foreach($array as $vals){
      $this->load->model('get_data');
      $time = $this->get_data->convertToDayTimeAgo($vals['limit_date']);
      if($time < 4 && $time > 0){
            $this->load->model('send_message');
            $this->send_message->post_message('課題名：'.$vals['kadai_name'].'  / 期限：'.$vals['limit_date'].'  / '.$time.'日前');
      }
   }   
        
  
    

  }

}