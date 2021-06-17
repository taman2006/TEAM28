<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadai_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 全課題を取得して配列として出力
     * 
     * @param int $limit=null 
     * @return array
     */
    public function fetch_all_rows($limit=null)
    {
        if ($limit) { $this->db->limit($limit); }
        return $this->db->order_by('limit_date', 'ASC')
            ->get('kadai_name')
            ->result_array();
    }

    /**
     * 掲示板データを入力
     * 
     * @param array $data
     * @return bool
     */
    public function insert_row($data)
    {
        return $this->db->insert('message', $data);
    }

    /**
     * idを指定して掲示板データを更新
     * 
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update_row($id, $data)
    {
        return $this->db->where('id', $id)
            ->update('message', $data);
    }

    /**
     * idを指定して掲示板データを削除
     * 
     * @param int $id
     * @return bool
     */
    public function delete_row($id)
    {
        return $this->db->where('id', $id)
            ->delete('message');
    }
}
