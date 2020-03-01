<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mauth');
    }

    public function index()
    {
        if ($this->session->has_userdata('namaUser')) {
            redirect('admin');
        } else {
            $this->form_validation->set_rules('namauser', 'User Name', 'required|trim|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_message('required', "%s harus diisi.");
            $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 3 huruf.");

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Halaman Login";
                $this->load->view('vauth/index', $data);
            } else {
                $this->mauth->login();
            }
        }
    }

    public function blocked($id)
    {
        $data['id'] = $id;

        $data['title'] = "403 Page";
        $this->load->view('vauth/blocked', $data);
    }
    public function logout()
    {
        $this->session->unset_userdata('namaUser');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda telah keluar dari akun</div>');
        redirect('auth');
    }
}
