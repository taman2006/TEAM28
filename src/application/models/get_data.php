<?php

class Get_data extends CI_Model {

  public function __construct(){
    $this->load->database();
  }
  
  public function get_data(){
    date_default_timezone_set('Asia/Tokyo');
    $this->load->helper('date');
    $this->load->dbutil();
    // $this->db->where('limit_date <=','DATE_ADD(now("Asia/Tokyo"),INTERVAL 3 DAYS )');
    $this->db->order_by('limit_date','desc');
    $this->db->select('kadai_name , limit_date');
    $query = $this->db->get('kadai_kanri');
    $results = $query->result_array();

    return $results;
    
  }

  public function convertToDayTimeAgo(string $datetime){
    $unix = strtotime($datetime);
    $now = time();
    
    $diff_sec = $unix - $now;
    $time = $diff_sec / 86400;

    if ($unix > $now) {
        return (int)$time + 1;
    } 
  }
}