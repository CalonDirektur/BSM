<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Insight extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('url');

        $this->load->database();
        $this->load->library('ion_auth');
        $this->load->library('session');
        $this->load->library('pagination');

        $this->load->library('form_validation');
        $this->load->model('admin/director_insight_model', 'director_insight');
        $this->load->model(
            'admin/director_insight_category_model',
            'director_insight_category'
        );
    }

    public function index($id = 1)
    {
        // $data['pengguna'] = $this->ion_auth->user()->row();
        // if (!$this->ion_auth->logged_in()) {
        //     redirect('auth/login');
        // }

        // $this->load->view('insight', $data);
        $cond = '';

        $data['searchBy'] = '';

        $data['searchValue'] = '';

        $v_fields = $this->director_insight->v_fields;

        $per_page_arr = ['6', '12', '18', '50', '100'];

        if (isset($_GET['searchValue']) && isset($_GET['searchBy'])) {
            $data['searchBy'] = $_GET['searchBy'];

            $data['searchValue'] = $_GET['searchValue'];

            if (
                !empty($_GET['searchValue']) &&
                $_GET['searchValue'] != '' &&
                !empty($_GET['searchBy']) &&
                $_GET['searchBy'] != ''
            ) {
                $cond = 'true';
            }
        }

        $data['sortBy'] = '';

        $order_by =
            isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)
                ? $_GET['sortBy']
                : '';

        $order =
            isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

        $searchBy =
            isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)
                ? $_GET['searchBy']
                : null;

        $searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

        $searchValue = addslashes($searchValue);

        if (isset($_GET['sortBy']) && $_GET['sortBy'] != '') {
            $data['sortBy'] = $_GET['sortBy'];

            if (isset($_GET['order']) && $_GET['order'] != '') {
                $_GET['order'] = $_GET['order'] == 'asc' ? 'desc' : 'asc';
            } else {
                $_GET['order'] = 'desc';
            }
        }

        $get_q = $_GET;

        foreach ($v_fields as $key => $value) {
            $get_q['sortBy'] = $value;

            $query_result = http_build_query($get_q);

            $data['fields_links'][$value] = current_url() . '?' . $query_result;
        }

        $data['csvlink'] = base_url() . 'admin/director_insight/export/csv';

        $data['pdflink'] = base_url() . 'admin/director_insight/export/pdf';

        $data['per_page'] =
            isset($_GET['per_page']) &&
            in_array($_GET['per_page'], $per_page_arr)
                ? $_GET['per_page']
                : '20';

        // PAGINATION

        $config = [];

        $config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

        $config['base_url'] = base_url() . 'insight/index';

        $total_row = $this->director_insight->getCount(
            'director_insight',
            $searchBy,
            $searchValue
        );

        $config['first_url'] =
            base_url() . 'insight/index' . '?' . $_SERVER['QUERY_STRING'];

        $config['total_rows'] = $total_row;

        $config['per_page'] = $per_page = $data['per_page'];

        $config['uri_segment'] = $this->uri->total_segments();

        $config['use_page_numbers'] = true;

        $config['num_links'] = 3; //$total_row

        $config['cur_tag_open'] =
            '<li class="page-item"><a class="page-link" >';
        // '&nbsp;<a class="current">';

        $config['cur_tag_close'] = '</a></li>';

        $config['full_tag_open'] =
            '<ul class="pagination justify-content-end pagination-rounded mt-0">';

        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li class="page-item"><a class="page-link">'; // ada efek

        $config['num_tag_close'] = '</a></li>';

        $config['cur_tag_open'] =
            "<li class='page-item active'> <a class='page-link'>";

        // "<li class='disabled'><li class='active'><a href='#'>";
        // "<li class='page-item active'><a class='page-link' href='#'>";

        $config['cur_tag_close'] = '</a> </li>';

        // "<span class='sr-only'></span></a></li>";

        $config['next_tag_open'] =
            '<li class="page-item"><a class="page-link">'; // ada efek hapus <li></li>

        $config['next_tagl_close'] = '</a></li>';

        $config['prev_tag_open'] =
            '<li class="page-item"> <a class="page-link">';

        $config['prev_tagl_close'] = '</a></li>';

        $config['first_link'] = 'First';

        $config['first_tag_open'] =
            '<li class="page-item"><a class="page-link">';

        $config['first_tagl_close'] = '</a></li>';

        $config['last_link'] = 'Last';

        $config['last_tag_open'] =
            '<li class="page-item"><a class="page-link">';

        $config['last_tagl_close'] = '</a></li>';

        $this->pagination->initialize($config);

        if ($this->uri->segment(2)) {
            $cur_page = $id;

            $pagi = [
                'cur_page' => ($cur_page - 1) * $per_page,
                'per_page' => $per_page,
                'order' => $order,
                'order_by' => $order_by,
            ];
        } else {
            $pagi = ['cur_page' => 0, 'per_page' => $per_page];
        }

        $data['results'] = $result = $this->director_insight->getList(
            'director_insight',
            $pagi
        );

        $str_links = $this->pagination->create_links();

        $data['links'] = $str_links;

        // ./ PAGINATION /.

        // if (!$this->ion_auth->logged_in()) {
        //     redirect('/auth/login/');
        // } else {
        $data['director_insight'] = $this->director_insight->getList(
            'director_insight'
        );

        $data[
            'director_insight_category'
        ] = $this->director_insight_category->getList(
            'director_insight_category'
        );

        $data['pengguna'] = $this->ion_auth->user()->row();

        //$this->load->view('admin/director_insight/manage', $data);
        $this->load->view('insight', $data);
        // }

        // if (!$this->ion_auth->logged_in()) {
        //     redirect('/auth/login/');
        // } else {
        //     $data['director_insight'] = $this->director_insight->getList(
        //         'director_insight'
        //     );
        //     $data['pengguna'] = $this->ion_auth->user()->row();

        //     //$this->load->view('admin/director_insight/manage', $data);
        //     $this->load->view('insight', $data);
        // }
    }

    public function detail($id)
    {
        // if (!$this->ion_auth->logged_in()) {
        //     redirect('/auth/login/');
        // }

        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules(
                'pesan',
                'Pesan Name',
                'required'
            );
            $this->form_validation->set_rules(
                'director',
                'Director Name',
                'required'
            );
            $this->form_validation->set_rules('date', 'Date Name', 'required');

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data['director_list'] = $this->director_insight->getListTable(
                    'director_list'
                );

                $data['director_insight'] = $this->director_insight->getRow(
                    'director_insight',
                    $id
                );
                $data['pengguna'] = $this->ion_auth->user()->row();

                $data[
                    'director_insights'
                ] = $this->director_insight->getListTableside(
                    'director_insight'
                );

                $data[
                    'director_insight_category'
                ] = $this->director_insight->getListTable(
                    'director_insight_category'
                );

                // $this->load->view('admin/director_insight/view', $data);
                $this->load->view('insight_detail', $data);
            } else {
                redirect('admin/director_insight/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/director_insight/view');
        }
    }

    // public function delete_notification($id = '')
    // {

    //     if (!$this->tank_auth->is_logged_in()) {

    //         redirect('/auth/login/');
    //     }

    //     $id = $_POST['note_id'];

    //     $data['user_id'] = $userid = $this->tank_auth->get_user_id();

    //     $data['username'] = $this->tank_auth->get_username();

    //     $data['email'] = $this->tank_auth->get_email();

    //     $data['groupid'] = $this->tank_auth->get_group();

    //     if (isset($id) and !empty($id)) {

    //         $count = $this->generic->getList('notification', 'c', '', '', 'user_id', $userid, 'id', $id);

    //         if (isset($count) and !empty($count)) {

    //             $this->generic->crud('notification', '', 'id', $id, 'delete');

    //             $this->session->set_flashdata('message', ' Notification Deleted Successfully !');

    //             redirect('welcome');
    //         } else {

    //             $this->session->set_flashdata('message', ' Invalid Id !');

    //             redirect('welcome');
    //         }
    //     } else {

    //         $this->session->set_flashdata('message', ' Invalid Id !');

    //         redirect('welcome');
    //     }
    // }

    // public function common_delete($id = '', $table)
    // {

    //     if (!$this->tank_auth->is_logged_in()) {

    //         redirect('/auth/login/');
    //     }

    //     $id = $_POST['id'];

    //     $data['user_id'] = $userid = $this->tank_auth->get_user_id();

    //     if (isset($id) and !empty($id)) {

    //         $count = $this->generic->getList($table, 'c', '', '', '', '', 'id', $id);

    //         if (isset($count) and !empty($count)) {

    //             $this->generic->crud($table, '', 'id', $id, 'delete');
    //         }
    //     }
    // }
}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
