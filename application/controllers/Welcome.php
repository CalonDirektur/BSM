<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('url');

        $this->load->database();
        $this->load->library('ion_auth');
        $this->load->library('session', 'pagination');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pengguna'] = $this->ion_auth->user()->row();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        //$data['data_kartap'] = $this->db->query(" SELECT * FROM karyawan where Status = 2 OR Status = 1 ");
        //  $data['kontrak_active'] = $this->db->query(" SELECT * FROM contract_pengelolaan WHERE `status_kontrak` = 'ACTIVE' ");
        //  $data['kontrak_expire']=$this->db->query("SELECT * FROM `contract_pengelolaan` WHERE `status_kontrak` = 'EXPIRE'");
        $this->load->view('welcome', $data);
    }

    public function delete_notification($id = '')
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }

        $id = $_POST['note_id'];

        $data['user_id'] = $userid = $this->tank_auth->get_user_id();

        $data['username'] = $this->tank_auth->get_username();

        $data['email'] = $this->tank_auth->get_email();

        $data['groupid'] = $this->tank_auth->get_group();

        if (isset($id) and !empty($id)) {
            $count = $this->generic->getList(
                'notification',
                'c',
                '',
                '',
                'user_id',
                $userid,
                'id',
                $id
            );

            if (isset($count) and !empty($count)) {
                $this->generic->crud('notification', '', 'id', $id, 'delete');

                $this->session->set_flashdata(
                    'message',
                    ' Notification Deleted Successfully !'
                );

                redirect('welcome');
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');

                redirect('welcome');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('welcome');
        }
    }

    public function common_delete($id = '', $table)
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }

        $id = $_POST['id'];

        $data['user_id'] = $userid = $this->tank_auth->get_user_id();

        if (isset($id) and !empty($id)) {
            $count = $this->generic->getList(
                $table,
                'c',
                '',
                '',
                '',
                '',
                'id',
                $id
            );

            if (isset($count) and !empty($count)) {
                $this->generic->crud($table, '', 'id', $id, 'delete');
            }
        }
    }
}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
