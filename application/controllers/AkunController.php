<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AkunController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('LoginView');
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim'); //is_unique[akun.username]
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont Match!',
            'min_length' => 'Password too Short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('RegistrasiView');
        } else {
            echo 'data berhasil ditambahkan';
            // $data = [
            //     'nip' => $this->input->post('nip'),
            //     'name' => $this->input->post('name'),
            //     'username' => $this->input->post('username'),
            //     'password' => password_hash($this->input->post('password'),
            //     PASSWORD_DEFAULT),
            //     'hak_akses' => 3
            // ];

            // $this->db->insert('akun',$data);
        }
    }
}
