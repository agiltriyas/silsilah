<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdata');
        $this->load->model('madmin');
        $this->load->model('mmenu');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        viewcus('vadmin/index', $data);
    }

    public function dataAdmin()
    {
        $this->form_validation->set_rules('namauser', 'Nama User', 'required|trim|min_length[3]|is_unique[user.nama_user]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('kpassword', 'Kpassword', 'matches[password]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 3 huruf.");
        $this->form_validation->set_message('matches', "%s harus sama.");
        $this->form_validation->set_message('is_unique', "%s sudah ada.");

        if ($this->form_validation->run() == FALSE) {
            $data['joinm'] = $this->madmin->joinM();
            $data['title'] = "Data Admin";
            viewcus('vadmin/user', $data);
        } else {
            $result = $this->madmin->newUser();
            fbresult($result, 'admin', 'tambah', 'SuperAdmin/dataAdmin');
        }
    }

    public function editUser($userId)
    {
        if ($userId !== $this->input->post('userid')) {
            // data mengambil user
            $data['user'] = $this->mdata->get('user', 'id', $userId);
            $data['joinm'] = $this->madmin->joinM();
            $data['title'] = "Data Admin";
            viewcus('vadmin/edit_user', $data);
        } else {
            $result = $this->madmin->edit_user();
            fbresult($result, 'admin', 'update', 'SuperAdmin/dataAdmin');
        }
    }
    public function editAccess($userId)
    {
        $data['levelid'] = $this->mdata->get('level', 'id', $userId);
        $data['joinm'] = $this->madmin->joinM();
        $data['title'] = "Data Master";
        $data['extitle'] = "Level";
        viewcus('vadmin/edit_access', $data);
    }

    public function deleteUser($data)
    {
        $result = $this->madmin->delUser($data);
        fbresult($result, 'admin', 'hapus', 'SuperAdmin/dataAdmin');
    }

    public function editAct()
    {
        $result = $this->madmin->editact('user');
        fbresult($result, 'active', 'update', '');
    }

    // MASTER CODE

    public function mastercode()
    {
        $data['title'] = "Data Master";
        $data['extitle'] = "Master Code";
        $data['master'] = $this->mdata->getAll('master');
        $data['daerah'] = $this->mdata->getAll('daerah');
        $data['desa'] = $this->mdata->getAll('desa');
        $data['kelompok'] = $this->mdata->getAll('kelompok');
        $data['joinM'] = $this->madmin->joinM();

        $this->form_validation->set_rules('dareahId', 'Daerah Id', 'min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            viewcus('vadmin/master_code', $data);
        } else {
            $result = $this->madmin->tambahMaster();
            fbresult($result, 'master', 'tambah', 'SuperAdmin/mastercode');
        }
    }

    public function deleteMaster($id)
    {
        $result = $this->madmin->hapusMaster($id);
        fbresult($result, 'master', 'hapus', 'SuperAdmin/mastercode');
    }

    public function editMaster($id)
    {
        $data['master'] = $this->mdata->getAll('master');
        $data['daerah'] = $this->mdata->getAll('daerah');
        $data['desa'] = $this->mdata->getAll('desa');
        $data['kelompok'] = $this->mdata->getAll('kelompok');
        $data['joinM'] = $this->madmin->joinM();
        $data['idmas'] = $id;


        $data['edmas'] = $this->mdata->get('master', 'id', $id);

        $this->form_validation->set_rules('dareahId', 'Daerah Id', 'min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Data Master";
            $data['extitle'] = "Master Code";
            viewcus('vadmin/edit_master_code', $data);
        } else {
            $result = $this->madmin->ubahMaster($id);
            fbresultcus($result, 'Master berhasil diupdate', 'Master sudah ada', 'SuperAdmin/mastercode');
        }
    }

    // DATA DAERAH
    public function datadaerah()
    {
        $data['daerah'] = $this->mdata->getAll('daerah');
        $data['desa'] = $this->mdata->getAll('desa');
        $data['kelompok'] = $this->mdata->getAll('kelompok');

        $data['title'] = "Data Master";
        $data['extitle'] = "Data Daerah";
        viewcus('vadmin/data_daerah', $data);
    }

    public function tambahDaerah()
    {
        $this->form_validation->set_rules('namadaerah', 'Nama Daerah', 'required|trim|min_length[3]|is_unique[daerah.nama]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 3 huruf.");
        $this->form_validation->set_message('is_unique', "%s sudah ada.");

        if ($this->form_validation->run() == FALSE) {
            $this->datadaerah();
        } else {
            $result = $this->madmin->tambDar('daerah', 'namadaerah');
            fbresult($result, 'daerah', 'tambah', 'SuperAdmin/datadaerah');
        }
    }

    public function deleteDaerah($id)
    {
        $result = $this->madmin->hapDar($id, 'daerah');
        fbresult($result, 'daerah', 'hapus', 'SuperAdmin/datadaerah');
    }

    public function tambahDesa()
    {
        $this->form_validation->set_rules('namadesa', 'Nama Desa', 'required|trim|min_length[2]|is_unique[desa.nama]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 2 huruf.");
        $this->form_validation->set_message('is_unique', "%s sudah ada.");

        if ($this->form_validation->run() == FALSE) {
            $this->datadaerah();
        } else {
            $result = $this->madmin->tambDar('desa', 'namadesa');
            fbresult($result, 'desa', 'tambah', 'SuperAdmin/datadaerah');
        }
    }

    public function deleteDesa($id)
    {
        $result = $this->madmin->hapDar($id, 'desa');
        fbresult($result, 'desa', 'hapus', 'SuperAdmin/datadaerah');
    }

    public function tambahKel()
    {
        $this->form_validation->set_rules('namakel', 'Nama Kelompok', 'required|trim|is_unique[kelompok.nama]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('is_unique', "%s sudah ada.");

        if ($this->form_validation->run() == FALSE) {
            $this->datadaerah();
        } else {
            $result = $this->madmin->tambDar('kelompok', 'namakel');
            fbresult($result, 'kelompok', 'tambah', 'SuperAdmin/datadaerah');
        }
    }

    public function deleteKel($id)
    {
        $result = $this->madmin->hapDar($id, 'kelompok');
        fbresult($result, 'kelompok', 'hapus', 'SuperAdmin/datadaerah');
    }

    public function sentid()
    {
        $id = $this->input->post('id');
        $table = $this->input->post('t');
        $result = $this->mdata->get($table, 'id', $id);
        echo json_encode($result);
    }

    public function editid()
    {
        $this->form_validation->set_rules('namadaerah', 'Nama Daerah', 'required|trim|min_length[3]|is_unique[daerah.nama]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 3 huruf.");
        $this->form_validation->set_message('is_unique', "%s tidak ada perubahan.");

        if ($this->form_validation->run() == FALSE) {
            $this->datadaerah();
        } else {

            $result = $this->madmin->edid('namadaerah', 'daerah');
            fbresult($result, 'daerah', 'update', 'SuperAdmin/datadaerah');
        }
    }

    public function editiddes()
    {
        $this->form_validation->set_rules('namadesa', 'Nama Desa', 'required|trim|min_length[2]|is_unique[desa.nama]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 2 huruf.");
        $this->form_validation->set_message('is_unique', "%s tidak ada perubahan.");

        if ($this->form_validation->run() == FALSE) {
            $this->datadaerah();
        } else {

            $result = $this->madmin->edid('namadesa', 'desa');
            fbresult($result, 'desa', 'update', 'SuperAdmin/datadaerah');
        }
    }

    public function editidkel()
    {
        $this->form_validation->set_rules('namakel', 'Nama Kelompok', 'required|trim|is_unique[kelompok.nama]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('is_unique', "%s tidak ada perubahan.");

        if ($this->form_validation->run() == FALSE) {
            $this->datadaerah();
        } else {

            $result = $this->madmin->edid('namakel', 'kelompok');
            fbresult($result, 'kelompok', 'update', 'SuperAdmin/datadaerah');
        }
    }

    public function level()
    {
        $this->form_validation->set_rules('level', 'Level', 'required|trim|min_length[3]|is_unique[level.nama_level]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 3 huruf.");
        $this->form_validation->set_message('is_unique', "%s sudah ada.");

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Data Master";
            $data['extitle'] = "Level";
            viewcus('vadmin/level', $data);
        } else {
            $result = $this->madmin->tamblv();
            fbresult($result, 'level', 'tambah', 'SuperAdmin/level');
        }
    }

    public function editlev()
    {
        $this->form_validation->set_rules('level', 'Level', 'required|trim|min_length[3]|is_unique[level.nama_level]');
        $this->form_validation->set_message('required', "%s harus diisi.");
        $this->form_validation->set_message('min_length', "Karakter %s harus lebih dari 3 huruf.");
        $this->form_validation->set_message('is_unique', "%s tidak ada perubahan.");

        if ($this->form_validation->run() == FALSE) {
            $this->level();
        } else {
            $result = $this->madmin->edilv();
            fbresult($result, 'level', 'update', 'SuperAdmin/level');
        }
    }

    public function deleteLev($id)
    {
        $result = $this->madmin->hapDar($id, 'level');
        fbresult($result, 'level', 'hapus', 'SuperAdmin/level');
    }

    public function editAccs()
    {
        $menuid = $this->input->post('menuid');
        $levelid = $this->input->post('levelid');
        $cekacc = $this->db->get_where('access_menu', ['menu_id' => $menuid, 'level_id' => $levelid]);
        if ($cekacc->num_rows() >= 1) {
            $result = $this->madmin->deleteacs();
        } else {
            $result = $this->madmin->tambahacs();
        }
        fbresult($result, 'Access', 'update', '');
    }
}
