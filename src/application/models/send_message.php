<?php

class Send_message extends CI_Model {

  public function post_message($message){
      $message = urldecode($message); //日本語を正しく表示させるために追加
      $data = array(
                          "message" => $message
                       );
      $data = http_build_query($data, "", "&");
      $options = array(
          'http'=>array(
              'method'=>'POST',
              'header'=>"Authorization: Bearer " . LINE_API_TOKEN . "\r\n"
                        . "Content-Type: application/x-www-form-urlencoded\r\n"
                        . "Content-Length: ".strlen($data)  . "\r\n" ,
              'content' => $data
          )
      );
      $context = stream_context_create($options);
      $resultJson = file_get_contents(LINE_API_URL,FALSE,$context );
      $resultArray = json_decode($resultJson,TRUE);
      if( $resultArray['status'] != 200)  {
          return false;
      }
      return true;
  }
}