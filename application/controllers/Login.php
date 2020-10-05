<?php 

class Login extends CI_Controller 
{

    public function index() 
    { 
        // validasi 
        $this->form_validation->set_rules('username', 'Username', 'required',
    ['required' => '%s Harus Diisi !!']);
       
    $this->form_validation->set_rules('password', 'Password', 'required',
    ['required' => '%s Harus Diisi !!']);

    if($this->form_validation->run())
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // proses simple login
        $this->simple_login->login($username,$password);
    }     
      
        $data = ['title' => "Login Admin"];
        $this->load->view('login/list', $data);
    }

    public function logout()
    {
        $this->simple_login->logout();
    }

}