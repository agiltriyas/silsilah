<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mauth extends CI_Model
{

    public function login()
    {
        $namauser = htmlspecialchars($this->input->post('namauser', true));
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('admin', ['nama_user' => $namauser])->row_array();

        if ($user['nama_user'] == $namauser && password_verify($password, $user['password'])) {
            if ($user['is_active'] == 1) {
                $data = [
                    'namaUser' => $user['nama_user'],
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum active</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau password tidak sesuai</div>');
            redirect('auth');
        }
    }
}
