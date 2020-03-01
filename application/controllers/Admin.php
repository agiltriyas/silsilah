<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('madmin');
        if (!$this->session->has_userdata('namaUser')) {
            redirect('auth');
        }
    }


    public function index()
    {
        $this->form_validation->set_rules('namauser', 'Nama User', 'required|trim|min_length[3]|is_unique[admin.nama_user]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('kpassword', 'Kpassword', 'matches[password]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 3 huruf.");
        $this->form_validation->set_message('matches', "%s harus sama.");
        $this->form_validation->set_message('is_unique', "%s sudah ada.");

        if ($this->form_validation->run() == FALSE) {
            $data['admin'] = $this->db->get('admin')->result_array();
            $data['title'] = "Data Admin";
            viewcus('admin/user', $data);
        } else {
            $result = $this->madmin->newUser();
            fbresult($result, 'admin', 'tambah', 'admin');
        }
    }

    public function deleteUser($data)
    {
        $result = $this->madmin->delUser($data);
        fbresult($result, 'admin', 'hapus', 'admin');
    }

    public function edithome()
    {
        $data['home'] = $this->db->get('home')->row_array();
        $data['title'] = "Edit Home";
        viewcus('admin/edithome', $data);
    }
    public function doedithome()
    {
        $datahome = $this->db->get('home')->row_array();

        // $pict3 = 'default.jpg';
        // $pict4 = 'default.jpg';
        // $pict5 = 'default.jpg';
        if ($_FILES['pict1']['name']) {
            $config['upload_path'] = './assets/img/homepict/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'home-pict' . '.jpg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '2048';

            $this->load->library('upload', $config, 'pict1');
            $this->pict1->initialize($config);
            if ($this->pict1->do_upload('pict1')) {
                $pict1 = $config['file_name'];
            } else {
                $error = $this->pict1->display_errors('<div class="alert alert-danger role="alert">Picture 1 ', '</div>');
                $this->session->set_flashdata('message', $error);
                redirect('admin/edithome');;;
            }
        } else {
            $pict1 = $datahome['pict1'];
        }
        if ($_FILES['pict2']['name']) {
            $config['upload_path'] = './assets/img/homepict/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'home-pict2' . '.jpg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '2048';

            $this->load->library('upload', $config, 'pict2');
            $this->pict2->initialize($config);
            if ($this->pict2->do_upload('pict2')) {
                $pict2 = $config['file_name'];
            } else {
                $error = $this->pict2->display_errors('<div class="alert alert-danger role="alert">Picture 2 ', '</div>');
                $this->session->set_flashdata('message', $error);
                redirect('admin/edithome');;;
            }
        } else {
            $pict2 = $datahome['pict2'];
        }
        if ($_FILES['pict3']['name']) {
            $config['upload_path'] = './assets/img/homepict/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'home-pict3' . '.jpg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '2048';

            $this->load->library('upload', $config, 'pict3');
            $this->pict3->initialize($config);
            if ($this->pict3->do_upload('pict3')) {
                $pict3 = $config['file_name'];
            } else {
                $error = $this->pict3->display_errors('<div class="alert alert-danger role="alert">Picture 3 ', '</div>');
                $this->session->set_flashdata('message', $error);
                redirect('admin/edithome');;;
            }
        } else {
            $pict3 = $datahome['pict3'];
        }
        if ($_FILES['pict4']['name']) {
            $config['upload_path'] = './assets/img/homepict/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'home-pict4' . '.jpg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '2048';

            $this->load->library('upload', $config, 'pict4');
            $this->pict4->initialize($config);
            if ($this->pict4->do_upload('pict4')) {
                $pict4 = $config['file_name'];
            } else {
                $error = $this->pict4->display_errors('<div class="alert alert-danger role="alert">Picture 3 ', '</div>');
                $this->session->set_flashdata('message', $error);
                redirect('admin/edithome');;;
            }
        } else {
            $pict4 = $datahome['pict4'];
        }
        if ($_FILES['pict5']['name']) {
            $config['upload_path'] = './assets/img/homepict/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'home-pict5' . '.jpg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '2048';

            $this->load->library('upload', $config, 'pict5');
            $this->pict5->initialize($config);
            if ($this->pict5->do_upload('pict5')) {
                $pict5 = $config['file_name'];
            } else {
                $error = $this->pict5->display_errors('<div class="alert alert-danger role="alert">Picture 3 ', '</div>');
                $this->session->set_flashdata('message', $error);
                redirect('admin/edithome');;;
            }
        } else {
            $pict5 = $datahome['pict5'];
        }
        $data = [
            'title' => $this->input->post('title'),
            'subtitle' => $this->input->post('subtitle'),
            'header1' => $this->input->post('header1'),
            'desk' => $this->input->post('desk'),
            'pict1' => $pict1,
            'pict2' => $pict2,
            'pict3' => $pict3,
            'pict4' => $pict4,
            'pict5' => $pict5,

        ];

        if ($this->db->get('home')->num_rows() == 0) {
            $this->db->insert('home', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data home berhasil di tambah</div>');
        } else {
            $this->db->where('id', 1);
            $this->db->update('home', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data home berhasil di update</div>');
        }
        redirect('admin/edithome');
    }

    public function updateUser($id)
    {
        if (isset($_POST['tambah'])) {
            # code...
            $oldpassword = $this->input->post('oldpassword');
            $password = $this->input->post('password');
            $kpassword = $this->input->post('kpassword');
            $dataAdmin = $this->db->get_where('admin', ['id' => $id])->row_array();
            if ($dataAdmin['nama_user'] == $this->session->userdata('namaUser') && password_verify($oldpassword, $dataAdmin['password'])) {
                if ($kpassword == $password) {
                    $hashpass = password_hash($this->input->post('kpassword'), PASSWORD_DEFAULT);
                    $this->db->set('password', $hashpass);
                    $this->db->where('id', $id);
                    $result = $this->db->update('admin');
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diupdate</div>');
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak sama dengan konfirmasi Password</div>');
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama tidak sesuai</div>');
                redirect('admin');
            }
        }
        $data['title'] = "Data Admin";
        viewcus('admin/gantipassword', $data);
    }
}
