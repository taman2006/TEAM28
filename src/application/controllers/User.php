<?php 

class User extends CI_Controller
{
    public function profile($id=null)
    {
        echo $id;
    }

    public function detail()
    {
        $this->load->view("kadai");
    }
    public function edit()
    {
        $this->load->view("revise");
    }
}
?>