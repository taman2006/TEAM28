<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadai_model extends CI_Model {

    public function __construct()
    {
        // parent::__construct();
        $this->load->database();
    }

    public function login_check()
    {
        // ログインしていない場合は、認可URLにリダイレクト
        if(!isset($_SESSION['user_id'])) {

            // ユーザーに認証と認可を要求する(PKCEにも対応)
            // See. https://developers.line.biz/ja/docs/line-login/integrate-line-login/#making-an-authorization-request
        
            $_SESSION['oauth_state'] = bin2hex(random_bytes(16));
            $_SESSION['oauth_nonce'] = bin2hex(random_bytes(16));
            $_SESSION['oauth_code_verifier'] = $this->Kadai_model->base64url_encode(random_bytes(32));
                    
        
            $url = LINE_LOGIN_AUTHORIZE_URL . '?' . http_build_query([
                'response_type' => 'code',
                'client_id' => LINE_LOGIN_CHANNEL_ID,
                'redirect_uri' => LINE_LOGIN_CALLBACK_URL,
                'state' => $_SESSION['oauth_state'],
                'scope' => LINE_LOGIN_SCOPE,
                'nonce' => $_SESSION['oauth_nonce'],
                'code_challenge' => $this->Kadai_model->base64url_encode(hash('sha256', $_SESSION['oauth_code_verifier'], true)),
                'code_challenge_method' => 'S256'
            ]);
        
            // 認可URLにリダイレクト
            header("Location: $url");
        
            // ユーザーによる認証と認可のプロセスが始まる
            // 完了すると、LINE_LOGIN_CALLBACK_URLにリダイレクトされる
            exit;
        }
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
            ->select('id, user_id, limit_date, kadai_name')
            ->get('kadai_kanri')
            ->row_array();
    }

    /**
     * ユーザー毎の全課題を取得して配列として出力
     * 
     * @param int $limit=null
     * @return array
     */
    public function fetch_all_rows($limit=null)
    {
        $user_id = $_SESSION['user_id'];
        if ($limit) { $this->db->limit($limit); }
        return $this->db->where('user_id', $user_id)
            ->select('id, user_id, limit_date, kadai_name')
            ->order_by('limit_date', 'ASC')
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

    // Base64URLエンコードするための関数
    public function base64url_encode($data) 
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}