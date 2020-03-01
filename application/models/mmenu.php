<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mmenu extends CI_Model
{
    public function tambahM()
    {
        $menu = htmlspecialchars($this->input->post('menu', TRUE));
        return $this->db->insert('menu', ['nama_menu' => $menu]);
    }
    public function updateMenu($id)
    {
        $menu = htmlspecialchars($this->input->post('menu', TRUE));
        $this->db->set('nama_menu', $menu);
        $this->db->where('id', $id);
        return $this->db->update('menu');
    }
    public function delM($id, $table)
    {
        return $this->db->delete($table, ['id' => $id]);
    }

    public function tambahsub()
    {
        $submenu = htmlspecialchars($this->input->post('submenu', TRUE));
        $icon = htmlspecialchars($this->input->post('icon', TRUE));
        $url = htmlspecialchars($this->input->post('url', TRUE));
        $menuId = $this->input->post('menu');
        $data = [
            'menu_id' => $menuId,
            'nama_sub' => $submenu,
            'icon' => $icon,
            'url' => $url,
            'is_active' => 0
        ];
        return $this->db->insert('sub_menu', $data);
    }

    public function editSubmenu($id)
    {
        $submenu = htmlspecialchars($this->input->post('submenu', TRUE));
        $icon = htmlspecialchars($this->input->post('icon', TRUE));
        $url = htmlspecialchars($this->input->post('url', TRUE));
        $submenuId = $this->input->post('submenuId');
        $menuId = $this->input->post('menu');

        $this->db->set('menu_id', $menuId);
        $this->db->set('nama_sub', $submenu);
        $this->db->set('icon', $icon);
        $this->db->set('url', $url);
        $this->db->where('id', $submenuId);
        return $this->db->update('sub_menu');
    }

    public function submenuJ($id)
    {
        $query = " SELECT * FROM menu JOIN sub_menu ON menu.id = sub_menu.menu_id WHERE sub_menu.id = $id";
        return $this->db->query($query)->row_array();
    }
    public function joinSubmenu()
    {
        $query = " SELECT * FROM menu JOIN sub_menu ON menu.id = sub_menu.menu_id ORDER BY menu.id,sub_menu.id";
        return $this->db->query($query)->result_array();
    }

    public function joinesm()
    {
        $this->db->select('*');
        $this->db->from('sub_menu');
        $this->db->join('extra_sub_menu', 'sub_menu_id = sub_menu.id');
        $this->db->order_by('sub_menu_id', 'ASC');
        return $this->db->get()->result_array();
    }

    public function tambahexsub()
    {
        $exsubmenu = htmlspecialchars($this->input->post('extrasm', TRUE));
        $url = htmlspecialchars($this->input->post('url', TRUE));
        $submenuId = $this->input->post('submenu');
        $data = [
            'sub_menu_id' => $submenuId,
            'nama_extra' => $exsubmenu,
            'url' => $url,
            'is_active' => 0
        ];
        return $this->db->insert('extra_sub_menu', $data);
    }

    public function exsubmenuJ($id)
    {
        $this->db->select('*');
        $this->db->from('sub_menu');
        $this->db->join('extra_sub_menu', 'sub_menu_id = sub_menu.id');
        $this->db->order_by('extra_sub_menu.id', 'ASC');
        $this->db->where('extra_sub_menu.id', $id);
        return $this->db->get()->row_array();
    }

    public function editExsubmenu($id)
    {
        $exsubmenu = htmlspecialchars($this->input->post('extrasm', TRUE));
        $url = htmlspecialchars($this->input->post('url', TRUE));
        $exsubmenuId = $id;
        $submenuId = $this->input->post('submenuId');

        $this->db->set('sub_menu_id', $submenuId);
        $this->db->set('nama_extra', $exsubmenu);
        $this->db->set('url', $url);
        $this->db->where('id', $exsubmenuId);
        return $this->db->update('extra_sub_menu');
    }
}
