<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdata');
        $this->load->model('mmenu');
        $this->load->model('madmin');

        is_logged_in();
    }


    public function index()
    {
        $data['title'] = "Menu";
        viewcus('vmenu/index', $data);
    }

    public function menuTambah()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim|min_length[3]|is_unique[menu.nama_menu]', [
            'required' => '%s tidak boleh kosong',
            'min_length' => '%s minimal 3 karakter',
            'is_unique' => $this->input->post('menu') . ' sudah ada.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Menu";
            viewcus('vmenu/index', $data);
        } else {
            $result = $this->mmenu->tambahM();
            fbresult($result, 'menu', 'tambah', 'menu');
        }
    }

    public function editMenu($id)
    {
        if ($this->input->post('id') !== $id) {
            $data['menuId'] = $this->mdata->get('menu', 'id', $id);
            $data['title'] = "Menu";
            viewcus('vmenu/edit_menu', $data);
        } else {
            $this->form_validation->set_rules('menu', 'Menu', 'required|trim|min_length[3]|is_unique[menu.nama_menu]', [
                'required' => '%s tidak boleh kosong',
                'min_length' => '%s minimal 3 karakter',
                'is_unique' => $this->input->post('menu') . ' sudah ada.'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $data['menuId'] = $this->mdata->get('menu', 'id', $id);
                $data['title'] = "Menu";
                viewcus('vmenu/edit_menu', $data);
            } else {
                $result = $this->mmenu->updateMenu($id);
                fbresult($result, 'menu', 'update', 'menu');
            }
        }
    }
    public function deleteMenu($id)
    {
        $result = $this->mmenu->delM($id, 'menu');
        fbresult($result, 'menu', 'hapus', 'menu');
    }

    //batas akhir menu

    public function submenu()
    {
        $this->form_validation->set_rules('submenu', 'Sub Menu', 'required|trim|min_length[3]|is_unique[sub_menu.nama_sub]');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('url', 'Url', 'required|trim|min_length[3]');

        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('min_length', '%s harus lebih dari 3 karakter');
        $this->form_validation->set_message('is_unique', '%s sudah ada');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['submenu'] = $this->mdata->getAll('sub_menu');
            $data['title'] = "Sub Menu";
            viewcus('vmenu/sub_menu', $data);
        } else {
            $result = $this->mmenu->tambahsub();
            fbresult($result, 'sub menu', 'tambah', 'menu/submenu');
        }
    }

    public function editAct()
    {
        $result = $this->madmin->editact('sub_menu');
        fbresult($result, 'Active', 'update', '');
    }

    public function editSubmenu($id)
    {
        $this->form_validation->set_rules('submenu', 'Sub Menu', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('url', 'Url', 'required|trim|min_length[3]');

        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('min_length', '%s harus lebih dari 3 karakter');
        if ($this->form_validation->run() == FALSE) {
            $data['submenuJ'] = $this->mmenu->submenuJ($id);
            $data['title'] = "Sub Menu";
            viewcus('vmenu/edit_sub_menu', $data);
        } else {
            $result = $this->mmenu->editSubmenu($id);
            fbresult($result, 'sub menu', 'update', 'menu/submenu');
        }
    }
    public function deleteSubmenu($id)
    {
        $result = $this->mmenu->delM($id, 'sub_menu');
        fbresult($result, 'sub menu', 'hapus', 'menu/submenu');
    }

    //batas akhir submenu

    public function extrasm()
    {
        $this->form_validation->set_rules('extrasm', 'Extra Sub Menu', 'required|trim|min_length[3]|is_unique[extra_sub_menu.nama_extra]');
        $this->form_validation->set_rules('url', 'Url', 'required|trim|min_length[3]');

        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('min_length', '%s harus lebih dari 3 karakter');
        $this->form_validation->set_message('is_unique', '%s sudah ada');

        if ($this->form_validation->run() == FALSE) {
            $data['joinesm'] = $this->mmenu->joinesm();
            $data['submenu'] = $this->mdata->get2('sub_menu', 'is_active', 1);
            $data['title'] = "Extra Sub Menu";
            viewcus('vmenu/extra_sm', $data);
        } else {
            $result = $this->mmenu->tambahexsub();
            fbresult($result, 'extra submenu', 'tambah', 'menu/extrasm');
        }
    }

    public function editexAct()
    {
        $result = $this->madmin->editact('extra_sub_menu');
        fbresult($result, 'Active', 'update', '');
    }

    public function editExtrasm($id)
    {
        $this->form_validation->set_rules('extrasm', 'Extra Sub Menu', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('url', 'Url', 'required|trim|min_length[3]');

        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('min_length', '%s harus lebih dari 3 karakter');
        if ($this->form_validation->run() == FALSE) {
            $data['exsubmenuJ'] = $this->mmenu->exsubmenuJ($id);
            $data['submenu'] = $this->mdata->getAll('sub_menu');
            $data['title'] = "Extra Sub Menu";
            viewcus('vmenu/edit_ex_sub_menu', $data);
        } else {
            $result = $this->mmenu->editexSubmenu($id);
            fbresult($result, 'extra submenu', 'update', 'menu/extrasm');
        }
    }

    public function deleteExtrasm($id)
    {
        $result = $this->mmenu->delM($id, 'extra_sub_menu');
        fbresult($result, 'extrasub menu', 'hapus', 'menu/extrasm');
    }
}
