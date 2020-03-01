<?php


function viewcus($view, $data = '')
{
    $ci = get_instance();
    //memanggil data user key=namaUser
    $data['session'] = $ci->db->get_where('admin', ['nama_user' => $ci->session->userdata('namaUser')])->row_array();

    return [
        $ci->load->view('template/header', $data),
        $ci->load->view('template/sidebar', $data),
        $ci->load->view('template/top', $data),
        $ci->load->view($view,  $data),
        $ci->load->view('template/footer')
    ];
}

function htotop($data)
{
    $ci = get_instance();

    return [
        $ci->load->view('template/header', $data),
        $ci->load->view('template/sidebar', $data),
        $ci->load->view('template/top', $data)
    ];
}

function fbresult($result, $menu, $tipe, $redirect)
{
    $ci = get_instance();
    if ($result) {
        $ci->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . strtoupper(substr($menu, 0, 1)) . substr($menu, 1, 32) . ' berhasil di' . $tipe . '.</div>');
        if ($redirect !== '') {
            redirect($redirect);
        }
    } else {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . strtoupper(substr($menu, 0, 1)) . substr($menu, 1, 32) . ' gagal di' . $tipe . '.</div>');
        if ($redirect !== '') {
            redirect($redirect);
        }
    }
}

function fbresultcus($result, $berhasil, $gagal, $redirect)
{
    $ci = get_instance();
    if ($result) {
        $ci->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $berhasil . '.</div>');
        redirect($redirect);
    } else {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $gagal . '.</div>');
        redirect($redirect);
    }
}
