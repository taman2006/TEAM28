<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kadai extends CI_Controller
{


    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        // $this->load->library('session');
        $this->load->model('Kadai_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Tokyo');
        session_start();
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
        
        $this->Kadai_model->login_check();

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
                'label' => '期日',
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

        $this->Kadai_model->login_check();    

        // POSTでcsrf_tokenの項目名でパラメーターが送信されていること且つ、
        // セッションに保存された値と一致する場合は正常なリクエストとして処理を行います
        if (isset($_POST["csrf_token"]) 
         && $_POST["csrf_token"] === $_SESSION['csrf_token']) {
        
            if (!$this->request_validation()) {
                $errors = $this->form_validation->error_array();
                $_SESSION['error_message'] = $errors;
                redirect("index.php");
            }

            // POSTで送信されたlimit_dateのデータ型が日付であるかどうかのチェック
            list($Y, $m, $d) = explode('-', $this->input->post('limit_date', true));
            if (checkdate($m, $d, $Y) === true) {
                
                $k_name = $this->input->post('kadai_name', true);  
                $limit = $this->input->post('limit_date', true);  

                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'kadai_name' => $k_name,
                    'limit_date' => $limit
                ];

                if ($this->Kadai_model->insert_row($data)) {
                    $_SESSION['success_message'] = '課題を登録しました。';
                } else {
                    $_SESSION['error_message'] = '登録に失敗しました。';
                }
                redirect("index.php");

            } else {
                $_SESSION['error_message'][] = '日付（yyyy-mm-dd）を入力してください';    
                redirect("index.php");
            }

        } else {
            $_SESSION['error_message'][] = '不正なリクエストです。';
            redirect("index.php");
        }
    }
    
    /**
     * 掲示板の書き込みデータを削除する
     *
     * @return void
     */
    public function delete_bbs()
    {

        $this->Kadai_model->login_check();

        // POSTでcsrf_tokenの項目名でパラメーターが送信されていること且つ、
        // セッションに保存された値と一致する場合は正常なリクエストとして処理を行います
        if (isset($_POST["csrf_token"]) 
         && $_POST["csrf_token"] === $_SESSION['csrf_token']) {        
    
            if (!($id = $this->input->post('kadai_id', true))) {
                $_SESSION['error_message'][] = '削除に必要なパラメータが含まれていません';
            }

            if (!($_SESSION['user_id'] === $this->Kadai_model->fetch_one_row($this->input->post('kadai_id', true))['user_id'])) {
                $_SESSION['error_message'][] = '不正なリクエストです。';
                redirect("index.php");
            }

            if ($this->Kadai_model->delete_row($id)) {
                $_SESSION['success_message'] = 'メッセージを削除しました。';
                redirect("index.php");
            } else {
                $_SESSION['error_message'][] = '削除に失敗しました。';
                redirect("index.php");
            }

        } else {
            $_SESSION['error_message'][] = '不正なリクエストです。';
            redirect("index.php");
        }
    }

     /**
     * 編集画面を出力
     * 
     * @return void
     */
    public function revise()
    {

        $this->Kadai_model->login_check();

        $data = null;
        //$this->isSession();
        // var_dump($this->input->post('kadai_id', true));
        // var_dump($_SESSION['user_id']);
        // var_dump($this->Kadai_model->fetch_one_row($this->input->post('kadai_id', true)));
        // exit;


        
        if (!($id = $this->input->post('kadai_id', true)) || !is_numeric($id)) {
            $_SESSION['error_message'][] = '更新に必要なパラメータが含まれていません';
            redirect("index.php");
        }

        if (empty($data['message_data'] = $this->Kadai_model->fetch_one_row($id))) {
            $_SESSION['error_message'][] = '存在しないレコードです。';
            redirect("index.php");
        }

        if (!($_SESSION['user_id'] === $this->Kadai_model->fetch_one_row($this->input->post('kadai_id', true))['user_id'])) {
            $_SESSION['error_message'][] = '不正なリクエストです。';
            redirect("index.php");
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

        $this->Kadai_model->login_check();

        // POSTでcsrf_tokenの項目名でパラメーターが送信されていること且つ、
        // セッションに保存された値と一致する場合は正常なリクエストとして処理を行います
        if (isset($_POST["csrf_token"]) 
         && $_POST["csrf_token"] === $_SESSION['csrf_token']) {        

            $data = null;
            // var_dump($this->input->post('kadai_id', true));
            
            if (!($id = $this->input->post('kadai_id', true))) {
                $_SESSION['error_message'][] = '更新に必要なパラメータが含まれていません';
                redirect("index.php");
            }

            if (!($_SESSION['user_id'] === $this->Kadai_model->fetch_one_row($this->input->post('kadai_id', true))['user_id'])) {
                $_SESSION['error_message'][] = '不正なリクエストです。';
                redirect("index.php");
            }

            if (!$this->request_validation()) {
                $error_message = $this->form_validation->error_array();
                $_SESSION['error_message'] = $error_message;
                redirect("index.php");
            }

            // POSTで送信されたlimit_dateのデータ型が日付であるかどうかのチェック
            list($Y, $m, $d) = explode('-', $this->input->post('limit_date', true));
            if (checkdate($m, $d, $Y) === true) {            

                $k_name = $this->input->post('kadai_name', true);  
                $limit = $this->input->post('limit_date', true);  
            
                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'kadai_name' => $k_name,
                    'limit_date' => $limit
                ];
                    
                if ($this->Kadai_model->update_row($id, $data)) {
                    $_SESSION['success_message'] = '課題を更新しました。';
                    redirect("index.php");
                } else {
                    $_SESSION['error_message'][] = '更新に失敗しました。';
                    redirect("index.php");
                }  
            } else {
                $_SESSION['error_message'][] = '日付（yyyy-mm-dd）を入力してください';    
                redirect("index.php");
            }
        } else {
            $_SESSION['error_message'][] = '不正なリクエストです。';
            redirect("index.php");
        }
    }
}