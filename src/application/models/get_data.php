
<?php


class get_data extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }
  
  public function get_data($message){
    $this->load->dbutil();
    $this->db->where('id',1);
    $this->db->order_by('id','desc');
    $query = $this->db->get('kadai-kanri');
    $results = $query->result('object');
    $count = 0;
    foreach ( $results as $result){
      $data[$count] ['kadai-name']= $result->name;
      $data[$count] ['limit-date']= $result->date;
      $count++;
    } 

    
  }
  
}