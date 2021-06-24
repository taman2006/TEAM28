<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadai_model extends CI_Model {

    public function __construct()
    {
        // parent::__construct();
        $this->load->database();
    }

 /**
     * レコードをid検索して配列として出力
     * 
     * @param int $id 
     * @return array
     */
    public function fetch_one_row($id)
    {
        return $this->db->where('id', $id)
            ->select('id, limit_date, kadai_name')
            ->get('kadai_kanri')
            ->row_array();
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
            ->get('kadai_kanri')
            ->result_array();
    }

    /**
     * 課題を登録
     * 
     * @param array $data
     * @return bool
     */
    public function insert_row($data)
    {
        return $this->db->insert('kadai_kanri', $data);
    }

    /**
     * idを指定して課題を更新
     * 
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update_row($id, $data)
    {
        return $this->db->where('id', $id)
            ->update('kadai_kanri', $data);
    }

    /**
     * idを指定して課題を削除
     * 
     * @param int $id
     * @return bool
     */
    public function delete_row($id)
    {
        return $this->db->where('id', $id)
            ->delete('kadai_kanri');
    }
}
