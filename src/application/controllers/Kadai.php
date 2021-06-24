<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kadai extends CI_Controller
{

    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Kadai_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Tokyo');
    }

    /**
     * CodeIgniterではコントローラーにindexメソッドを指定すると自動でそのメソッドを実行します
     *
     * urlにindexメソッドを指定するかコントローラー名だけを記述した場合に実行されます
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     *
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     */

     /**
      * 課題一覧ページを出力
      *
      * @return void
      */
    public function index()
    {
        $data = null;
        $data['message_array'] = $this->Kadai_model->fetch_all_rows();

        if (!empty($_SESSION['success_message'])) {
            $data['success_message'] = $_SESSION['success_message'];
            unset($_SESSION['success_message']);
        }
        if (!empty($_SESSION['error_message'])) {
            $data['error_message'] = $_SESSION['error_message'];
            unset($_SESSION['error_message']);
        }

        $this->load->view('kadai_view', $data);
    }

     /**
     * httpリクエストのパラメータの正当性を検証
     * 
     * @return void
     */
    private function request_validation() {
        $config = [
            [
                'field' => 'kadai_name',
                'label' => '課題名',
                'rules' => 'required',
                'errors' => [
                    'required' => '%sを入力してください。'
                ]
            ],
            [
                'field' => 'limit_date',
                'label' => '期限',
                'rules' => 'required',
                'errors' => [
                    'required' => '%sを選択してください。',
                ]
            ]
        ];
        $this->form_validation->set_rules($config);
        return $this->form_validation->run();
    }

    /**
     * POSTされてきたデータをDBにinsert
     *
     * @return void
     */
    public function add_kadai()
    {
        if (!$this->request_validation()) {
            $errors = $this->form_validation->error_array();
            $_SESSION['error_message'] = $errors;
            redirect();
        }

        $k_name = $this->input->post('kadai_name', true);  
        $limit = $this->input->post('limit_date', true);  

        $data = [
            'user_id' => null,
            'kadai_name' => $k_name,
            'limit_date' => $limit
        ];

        if ($this->Kadai_model->insert_row($data)) {
            $_SESSION['success_message'] = '課題を登録しました。';
        } else {
            $_SESSION['error_message'] = '登録に失敗しました。';
        }
        redirect();
    }
    
    /**
     * 掲示板の書き込みデータを削除する
     *
     * @return void
     */
    public function delete_bbs()
    {
        if (!($id = $this->input->post('kadai_id', true))) {
            $_SESSION['error_message'][] = '削除に必要なパラメータが含まれていません';
        }

        if ($this->Kadai_model->delete_row($id)) {
            $_SESSION['success_message'] = 'メッセージを削除しました。';
            redirect();
        } else {
            $_SESSION['error_message'][] = '削除に失敗しました。';
            redirect();
        }
    }

     /**
     * 編集画面を出力
     * 
     * @return void
     */
    public function revise()
    {
        $data = null;
        //$this->isSession();

        if (!($id = $this->input->post('kadai_id', true)) || !is_numeric($id)) {
            $_SESSION['error_message'][] = '更新に必要なパラメータが含まれていません';
            redirect();
        }

        if (empty($data['message_data'] = $this->Kadai_model->fetch_one_row($id))) {
            $_SESSION['error_message'][] = '存在しないレコードです。';
            redirect();
        }

        if (!empty($_SESSION['error_message'])) {
            $data['error_message'] = $_SESSION['error_message'];
            unset($_SESSION['error_message']);
        }

        $this->load->view('revise', $data);
    }

    /**
     * 掲示板の書き込みデータを更新する
     *
     * @return void
     */
    public function update()
    {
        $data = null;
        var_dump($this->input->post('kadai_id', true));
        // log_message('info', print_r($_POST, true));
        // log_message('info', print_r($_POST, true));
        

        if (!($id = $this->input->post('kadai_id', true))) {
            $_SESSION['error_message'][] = '更新に必要なパラメータが含まれていません';
            redirect();
        }

        if (!$this->request_validation()) {
            $error_message = $this->form_validation->error_array();
            $_SESSION['error_message'] = $error_message;
            redirect();
        }

        // log_message(‘debug’, ‘test’);

        $k_name = $this->input->post('kadai_name', true);  
        $limit = $this->input->post('limit_date', true);  
       
        $data = [
            'user_id' => null,
            'kadai_name' => $k_name,
            'limit_date' => $limit
        ];
            
        if ($this->Kadai_model->update_row($id, $data)) {
            $_SESSION['success_message'] = '課題を更新しました。';
            redirect();
        } else {
            $_SESSION['error_message'][] = '更新に失敗しました。';
            redirect();
        }   
    }

}
