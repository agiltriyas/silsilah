<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Silsilah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('madmin');

        // if (!$this->session->has_userdata('namaUser')) {
        //     redirect('auth');
        // }
    }

    public function index()
    {
        $data['title'] = "Silsilah";
        $this->load->view('template/header', $data);
        $this->load->view('silsilah/index', $data);
        $this->load->view('template/footer');
    }

    public function ajx_parent()
    {
        $rows =  $this->db->get('parent')->result_array();
        function buildTree(array $elements, $parentId = 0)
        {
            $branch = array();
            foreach ($elements as $element) {
                if ($element['parent_id'] == $parentId) {
                    $children = buildTree($elements, $element['id']);
                    if ($children) {
                        $element['children'] = $children;
                    }
                    $branch[] = $element;
                }
            }

            return $branch;
        }
        $tree = buildTree($rows);
        echo json_encode($tree);
    }

    public function datapar()
    {
        $id = $this->input->post('id');

        $this->db->select('*');
        $this->db->select('parent.id as idp');
        $this->db->from('parent');
        $this->db->join('detail_parent', 'parent.id = id_nama');
        $this->db->where('parent.id', $id);
        $joinPar = $this->db->get()->row_array();

        echo json_encode($joinPar, TRUE);
    }

    public function pardel()
    {
        $id = $this->input->get('id');
        $tables = ['parent', 'detail_parent'];
        $test = $this->db->get_where('parent', ['parent_id' => $id])->result_array();
        if (!$test) {
            $this->db->where('id', $id);
            $this->db->delete($tables);
            redirect('silsilah');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Gagal dihapus!</strong>, Pastikan tidak ada node dibawahnya</div>');
            redirect('silsilah');
        }
    }

    public function tambahpar()
    {
        $resultParent = $this->madmin->insertPar();
        if ($resultParent) {
            $file = $_FILES['pict1'];
            if ($file['name']) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $resultParent['id'];
                $config['overwrite'] = TRUE;
                $config['max_size'] = '2048';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('pict1')) {
                    $newImage1 = $resultParent['id'] . ".jpg";
                    $oldImage1 = $resultParent['id'];
                    $this->db->set('pict_1', $newImage1);

                    if ($oldImage1 != "default.jpg") {
                        unlink(FCPATH . 'assets/img/profile/' . $oldImage1);
                    }
                } else {
                    $error = $this->upload->display_errors('<div class="alert alert-danger role="alert">', '</div>');
                    $this->session->set_flashdata('message', $error);
                    redirect('silsilah');
                };
            }


            $file = $_FILES['pict2'];
            if ($file['name']) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $resultParent['id'];
                $config['overwrite'] = TRUE;
                $config['max_size'] = '2048';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('pict2')) {
                    $newImage2 = $resultParent['id'] . "-2" . ".jpg";
                    $oldImage2 = $resultParent['id'] . "-2";
                    $this->db->set('pict_2', $newImage2);

                    if ($oldImage2 != "default.jpg") {
                        unlink(FCPATH . 'assets/img/profile/' . $oldImage2);
                    }
                } else {
                    $error = $this->upload->display_errors('<div class="alert alert-danger role="alert">', '</div>');
                    $this->session->set_flashdata('message', $error);
                    redirect('silsilah');
                };
            }

            $resultDetail = $this->madmin->insertDetPar($resultParent['id'], $newImage1, $newImage2);
            if ($resultDetail) {
                redirect('silsilah');
            }
        }
    }

    public function editpar()
    {
        $resultEditParent = $this->madmin->editPar();
        if ($resultEditParent) {
            $file = $_FILES['pict1'];
            if ($file['name']) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $resultEditParent['id'];
                $config['overwrite'] = TRUE;
                $config['max_size'] = '2048';
                $this->load->library('upload', $config, 'pict1');
                $this->pict1->initialize($config);
                $pict1upload = $this->pict1->do_upload('pict1');

                if ($pict1upload) {
                    $newImage1 = $resultEditParent['id'] . ".jpg";
                    $oldImage1 = $resultEditParent['id'];
                    // $this->db->set('pict_1', $newImage1);

                    if ($oldImage1 != "default.jpg") {
                        unlink(FCPATH . 'assets/img/profile/' . $oldImage1);
                    }
                } else {
                    $error = $this->pict1->display_errors('<div class="alert alert-danger role="alert">', '</div>');
                    $this->session->set_flashdata('message', $error);
                    redirect('silsilah');
                };
            }


            $file2 = $_FILES['pict2'];
            if ($file2['name']) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $resultEditParent['id'] . "-2" . ".jpg";
                $config['overwrite'] = TRUE;
                $config['max_size'] = '2048';
                $this->load->library('upload', $config, 'pict2');
                $this->pict2->initialize($config);
                $pict2upload = $this->pict2->do_upload('pict2');

                if ($pict2upload) {
                    $newImage2 = $resultEditParent['id'] . "-2" . ".jpg";
                    $oldImage2 = $resultEditParent['id'] . "-2";
                    // $this->db->set('pict_2', $newImage2);

                    if ($oldImage2 != "default.jpg") {
                        unlink(FCPATH . 'assets/img/profile/' . $oldImage2);
                    }
                } else {
                    $error = $this->pict2->display_errors('<div class="alert alert-danger role="alert">', '</div>');
                    $this->session->set_flashdata('message', $error);
                    redirect('silsilah');
                };
            }

            $resultEditDetail = $this->madmin->editDetPar($resultEditParent['id'], $newImage1, $newImage2);
            if ($resultEditDetail) {
                redirect('silsilah');
            }
        }
    }
}
