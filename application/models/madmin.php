<?php
defined('BASEPATH') or exit('No direct script access allowed');

class madmin extends CI_Model
{

    public function newUser()
    {
        $namauser = htmlspecialchars($this->input->post('namauser', TRUE));
        $password = password_hash($this->input->post('kpassword'), PASSWORD_DEFAULT);
        $isact = (int) $this->input->post('isact');

        $data = [
            'nama_user' => $namauser,
            'password' => $password,
            'is_active' => 1
        ];
        return $this->db->insert('admin', $data);
    }

    public function edit_user()
    {
        $userid = (int) $this->input->post('userid');
        $masterid = (int) $this->input->post('masterid');
        $levelid = (int) $this->input->post('levelid');

        $this->db->set('master_id', $masterid);
        $this->db->set('level_id', $levelid);
        $this->db->where('id', $userid);
        return ($this->db->update('admin'));
    }

    public function delUser($userId)
    {
        $user = $this->db->get_where('admin', ['id' => $userId])->row_array();
        if ($this->session->userdata('namaUser') == $user['nama_user']) {
            return false;
        } else {
            return $this->db->delete('admin', ['id' => (int) $userId]);
        }
    }

    public function editact($table)
    {
        $isact = $this->input->post('isact');
        $userId = $this->input->post('userId');
        if ($isact == 1) {
            $this->db->set('is_active', 0);
            $this->db->where('id', $userId);
            return $this->db->update($table);
        } else {
            $this->db->set('is_active', 1);
            $this->db->where('id', $userId);
            return $this->db->update($table);
        }
    }

    public function insertPar()
    {
        $this->form_validation->set_rules('nama1', 'Nama 1', 'min_length[3]');


        $id = $this->input->post('id');
        $nama1 = $this->input->post('nama1');
        $nama2 = $this->input->post('nama2');

        $dataPar = [
            'name' => $nama1,
            'title' => $nama2,
            'parent_id' => $id
        ];

        if ($this->form_validation->run() == TRUE) {
            $this->db->insert('parent', $dataPar);

            $this->db->order_by('id DESC');
            return $this->db->get('parent', 1)->row_array();
        } else {
            $error = validation_errors('<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button></div>');
            $this->session->set_flashdata('message', $error);
            redirect('silsilah');
        }
    }

    public function insertDetPar($idPar, $pict1 = "", $pict2 = "")
    {
        $tempat1 = $this->input->post('tempat1');
        $tempat2 = $this->input->post('tempat2');
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
        $alamat1 = $this->input->post('alamat1');
        $alamat2 = $this->input->post('alamat2');
        $no1 = $this->input->post('no1');
        $no2 = $this->input->post('no2');

        if ($pict1 == "" || $pict2 = "") {
            $pictdefault1 = 'default.jpg';
            $pictdefault2 = 'default.jpg';
        } else {
            $pictdefault1 = $pict1;
            $pictdefault2 = $pict2;
        }

        $dataDetailPar = [
            'id_nama' => $idPar,
            'tempat_lahir_1' => $tempat1,
            'tempat_lahir_2' => $tempat2,
            'tgl_lahir_1' => $tgl1,
            'tgl_lahir_2' => $tgl2,
            'alamat_1' => $alamat1,
            'alamat_2' => $alamat2,
            'no_hp_1' => $no1,
            'no_hp_2' => $no2,
            'pict_1' => $pictdefault1,
            'pict_2' => $pictdefault2
        ];

        // $this->form_validation->set_rules('tempat1', 'Tempat Lahir 1', 'required');
        // $this->form_validation->set_rules('tempat2', 'Tempat Lahir 2', 'required');
        // $this->form_validation->set_rules('tgl1', 'Tanggal Lahir 1', 'required');
        // $this->form_validation->set_rules('tgl2', 'Tanggal Lahir 2', 'required');
        // $this->form_validation->set_rules('alamat1', 'Alamat 1', 'required');
        // $this->form_validation->set_rules('alamat2', 'Alamat 2', 'required');
        // $this->form_validation->set_rules('no1', 'No Hp 1', 'required');
        // $this->form_validation->set_rules('no2', 'No Hp 2', 'required');

        if ($this->form_validation->run() == TRUE) {
            return $this->db->insert('detail_parent', $dataDetailPar);
        } else {
            $error = validation_errors('<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button></div>');
            $this->session->set_flashdata('message', $error);
            redirect('silsilah');
        }
    }

    public function editPar()
    {
        $this->form_validation->set_rules('nama1', 'Nama 1', 'min_length[3]');


        $id = $this->input->post('id');
        $idpar = $this->input->post('idpar');
        $nama1 = $this->input->post('nama1');
        $nama2 = $this->input->post('nama2');

        $dataPar = [
            'name' => $nama1,
            'title' => $nama2,
            'parent_id' => $idpar
        ];

        if ($this->form_validation->run() == TRUE) {
            $this->db->set($dataPar);
            $this->db->where('id', $id);
            $this->db->update('parent', $dataPar);

            return $this->db->get_where('parent', ['id' => $id])->row_array();
        } else {
            $error = validation_errors('<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button></div>');
            $this->session->set_flashdata('message', $error);
            redirect('silsilah');
        }
    }

    public function editDetPar($id, $pict1 = "", $pict2 = "")
    {
        $tempat1 = $this->input->post('tempat1');
        $tempat2 = $this->input->post('tempat2');
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
        $alamat1 = $this->input->post('alamat1');
        $alamat2 = $this->input->post('alamat2');
        $no1 = $this->input->post('no1');
        $no2 = $this->input->post('no2');

        $this->db->select('pict_1');
        $this->db->select('pict_2');
        $cekpict = $this->db->get_where('detail_parent', ['id_nama' => $id])->row_array();

        if ($cekpict['pict_1'] == 'default.jpg') {
            if (strlen($pict1) < 1) {
                $pictdefault1 = 'default.jpg';
            } else {
                $pictdefault1 = $pict1;
            }
        } else {
            $pictdefault1 = $cekpict['pict_1'];
        }


        if ($cekpict['pict_2'] == 'default.jpg') {
            if (strlen($pict2) < 1) {
                $pictdefault2 = 'default.jpg';
            } else {
                $pictdefault2 = $pict2;
            }
        } else {
            $pictdefault2 = $cekpict['pict_2'];
        }
        // var_dump($pictdefault1);
        // var_dump($pictdefault2);

        // die;


        $dataDetailPar = [
            'id_nama' => $id,
            'tempat_lahir_1' => $tempat1,
            'tempat_lahir_2' => $tempat2,
            'tgl_lahir_1' => $tgl1,
            'tgl_lahir_2' => $tgl2,
            'alamat_1' => $alamat1,
            'alamat_2' => $alamat2,
            'no_hp_1' => $no1,
            'no_hp_2' => $no2,
            'pict_1' => $pictdefault1,
            'pict_2' => $pictdefault2
        ];

        if ($this->form_validation->run() == TRUE) {
            $this->db->set($dataDetailPar);
            $this->db->where('id_nama', $id);
            return $this->db->update('detail_parent');
        } else {
            $error = validation_errors('<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button></div>');
            $this->session->set_flashdata('message', $error);
            redirect('silsilah');
        }
    }
}
