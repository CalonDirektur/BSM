<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Karyawan extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/karyawan_model', 'karyawan');

    }

    public function index($id = 1)
    {
        $data['users'] = $this->ion_auth->user()->row();

        $cond = "";

        $data['searchBy'] = '';

        $data['searchValue'] = '';

        $v_fields = $this->karyawan->v_fields;

        $per_page_arr = array('5', '10', '20', '50', '100');

        if (isset($_GET['searchValue']) && isset($_GET['searchBy'])) {

            $data['searchBy'] = $_GET['searchBy'];

            $data['searchValue'] = $_GET['searchValue'];

            if (!empty($_GET['searchValue']) && $_GET['searchValue'] != "" && !empty($_GET['searchBy']) && $_GET['searchBy'] != "") {

                $cond = "true";

            }

        }

        $data['sortBy'] = '';

        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

        $order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

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

        $data['csvlink'] = base_url() . 'admin/karyawan/export/csv';

        $data['pdflink'] = base_url() . 'admin/karyawan/export/pdf';

        $data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

        // PAGINATION

        $config = array();

        $config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

        $config["base_url"] = base_url() . "admin/karyawan/index";

        $total_row = $this->karyawan->getCount('karyawan', $searchBy, $searchValue);

        $config["first_url"] = base_url() . "admin/karyawan/index" . '?' . $_SERVER['QUERY_STRING'];

        $config["total_rows"] = $total_row;

        $config["per_page"] = $per_page = $data['per_page'];

        $config["uri_segment"] = $this->uri->total_segments();

        $config['use_page_numbers'] = true;

        $config['num_links'] = 3; //$total_row

        $config['cur_tag_open'] = '&nbsp;<a class="current">';

        $config['cur_tag_close'] = '</a>';

        $config['full_tag_open'] = "<ul class='pagination'>";

        $config['full_tag_close'] = "</ul>";

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";

        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

        $config['next_tag_open'] = "<li>";

        $config['next_tagl_close'] = "</li>";

        $config['prev_tag_open'] = "<li>";

        $config['prev_tagl_close'] = "</li>";

        $config['first_link'] = 'First';

        $config['first_tag_open'] = "<li>";

        $config['first_tagl_close'] = "</li>";

        $config['last_link'] = 'Last';

        $config['last_tag_open'] = "<li>";

        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        if ($this->uri->segment(2)) {

            $cur_page = $id;

            $pagi = array("cur_page" => ($cur_page - 1) * $per_page, "per_page" => $per_page, 'order' => $order, 'order_by' => $order_by);

        } else {

            $pagi = array("cur_page" => 0, "per_page" => $per_page);

        }

        $data["results"] = $result = $this->karyawan->getList("karyawan", $pagi);

        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;

        // ./ PAGINATION /.

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        } else {

            $data['karyawan'] = $this->karyawan->getList('karyawan');
            $data['pengguna'] = $this->ion_auth->user()->row();

            $this->load->view('admin/karyawan/manage', $data);

        }

    }

    public function add()
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        $data = null;

        $this->form_validation->set_rules('nama', 'Nama Name', 'required');
        $this->form_validation->set_rules('nik', 'Nik Name', 'required');
        $this->form_validation->set_rules('status', 'Status Name', 'required');
        $this->form_validation->set_rules('unit', 'Unit Name', 'required');
        $this->form_validation->set_rules('sub_unit', 'Sub_unit Name', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan Name', 'required');
        $this->form_validation->set_rules('entry_by', 'Entry_by Name', 'trim');

        $data['errors'] = array();

        if ($this->form_validation->run() == false) {

            $data["status_karyawan"] = $this->karyawan->getListTable("status_karyawan");
            $data["users"] = $this->karyawan->getListTable("users");
            $data['pengguna'] = $this->ion_auth->user()->row();
            $this->load->view('admin/karyawan/add', $data);

        } else {

            $saveData['nama'] = set_value('nama');
            $saveData['nik'] = set_value('nik');
            $saveData['status'] = set_value('status');
            $saveData['unit'] = set_value('unit');
            $saveData['sub_unit'] = set_value('sub_unit');
            $saveData['jabatan'] = set_value('jabatan');
            $saveData['entry_by'] = set_value('entry_by');

            $insert_id = $this->karyawan->insert('karyawan', $saveData);

            $this->session->set_flashdata('message', 'Karyawan Added Successfully!');

            redirect('admin/karyawan');

        }

    }

    public function view($id)
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $data = null;

            $this->form_validation->set_rules('nama', 'Nama Name', 'required');
            $this->form_validation->set_rules('nik', 'Nik Name', 'required');
            $this->form_validation->set_rules('status', 'Status Name', 'required');
            $this->form_validation->set_rules('unit', 'Unit Name', 'required');
            $this->form_validation->set_rules('sub_unit', 'Sub_unit Name', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan Name', 'required');
            $this->form_validation->set_rules('entry_by', 'Entry_by Name', 'trim');

            $data['errors'] = array();

            if ($this->form_validation->run() == false) {

                $data["status_karyawan"] = $this->karyawan->getListTable("status_karyawan");
                $data["users"] = $this->karyawan->getListTable("users");

                $data['karyawan'] = $this->karyawan->getRow('karyawan', $id);
                $data['pengguna'] = $this->ion_auth->user()->row();
                $this->load->view('admin/karyawan/view', $data);

            } else {

                redirect('admin/karyawan/view');

            }

        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/karyawan/view');

        }

    }

    public function edit($id)
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $data = null;

            $this->form_validation->set_rules('nama', 'Nama Name', 'required');
            $this->form_validation->set_rules('nik', 'Nik Name', 'required');
            $this->form_validation->set_rules('status', 'Status Name', 'required');
            $this->form_validation->set_rules('unit', 'Unit Name', 'required');
            $this->form_validation->set_rules('sub_unit', 'Sub_unit Name', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan Name', 'required');
            $this->form_validation->set_rules('entry_by', 'Entry_by Name', 'trim');

            $data['errors'] = array();

            if ($this->form_validation->run() == false) {

                $data['karyawan'] = $this->karyawan->getRow('karyawan', $id);

                $data["status_karyawan"] = $this->karyawan->getListTable("status_karyawan");
                $data["users"] = $this->karyawan->getListTable("users");
                $data['pengguna'] = $this->ion_auth->user()->row();

                $this->load->view('admin/karyawan/edit', $data);

            } else {

                $saveData['nama'] = set_value('nama');
                $saveData['nik'] = set_value('nik');
                $saveData['status'] = set_value('status');
                $saveData['unit'] = set_value('unit');
                $saveData['sub_unit'] = set_value('sub_unit');
                $saveData['jabatan'] = set_value('jabatan');
                $saveData['entry_by'] = set_value('entry_by');

                $this->karyawan->updateData('karyawan', $saveData, $id);

                $this->session->set_flashdata('message', 'Karyawan Updated Successfully!');

                redirect('admin/karyawan');

            }

        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/karyawan');

        }

    }

    public function delete($id = '')
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $count = $this->karyawan->getCount('karyawan', 'karyawan.id', $id);

            if (isset($count) and !empty($count)) {

                $this->karyawan->delete('karyawan', 'id', $id);

                $this->session->set_flashdata('message', ' Karyawan Deleted Successfully !');

                echo "success";

                exit;

            } else {

                $this->session->set_flashdata('message', ' Invalid Id !');

            }

        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

        }

    }

    public function deleteAll($id = '')
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        $all_ids = $_POST["allIds"];

        if (isset($all_ids) and !empty($all_ids)) {

            //$count=$this->karyawan->getCount('karyawan','karyawan.id',$id);

            for ($a = 0; $a < count($all_ids); $a++) {

                if ($all_ids[$a] != "") {

                    $this->karyawan->delete('karyawan', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' Karyawan(s) Deleted Successfully !');

                }

            }

            echo "success";

            exit;

        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

        }

    }

    public function export($filetype = 'csv')
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        $searchBy = '';

        $searchValue = '';

        $v_fields = array('nama', 'nik', 'status', 'unit', 'sub_unit', 'jabatan', 'entry_by');

        $data['sortBy'] = '';

        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

        $order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

        $searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

        $searchValue = addslashes($searchValue);

        $pagi = array('order' => $order, 'order_by' => $order_by);

        $result = $this->karyawan->getList("karyawan");

        if ($filetype == 'csv') {

            header('Content-Type: application/csv');

            header('Content-Disposition: attachment; filename=karyawan.csv');

            header('Pragma: no-cache');

            $csv = 'Sr. No,' . implode(',', $v_fields) . "\n";

            foreach ($result as $key => $value) {

                $line = ($key + 1) . ',';

                foreach ($v_fields as $field) {

                    $line .= '"' . addslashes($value->$field) . '"' . ',';

                }

                $csv .= ltrim($line, ',') . "\n";

            }

            echo $csv;exit;

        } elseif ($filetype == 'pdf') {

            error_reporting(0);

            ob_start();

            $this->load->library('m_pdf');

            $table = '

			<html>

			<head><title></title>

			<style>

			table{

				border:1px solid;

			}

			tr:nth-child(even)

			{

			    background-color: rgba(158, 158, 158, 0.82);

			}

			</style>

			</head>

			<body>

			<h1 align="center">Karyawan</h1>

			<table><tr>';

            $table .= '<th>Sr. No</th>';

            foreach ($v_fields as $value) {

                $table .= '<th>' . $value . '</th>';

            }

            $table .= '</tr>';

            foreach ($result as $key => $value) {

                $table .= '<tr><td>' . ($key + 1) . '</td>';

                foreach ($v_fields as $field) {

                    $table .= '<td>' . $value->$field . '</td>';

                }

                $table .= '</tr>';

            }

            $table .= '</table></body></html>';

            ob_clean();

            $pdf = $this->m_pdf->load();

            $pdf->WriteHTML($table);

            $pdf->Output('karyawan.pdf', "D");

            exit;

        } else {

            echo 'Invalid option';exit;

        }

    }

    public function status($field, $id)
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (in_array($field, array())) {

            if (isset($id) && !empty($id)) {

                if (!is_null($karyawan = $this->karyawan->getRow('karyawan', $id))) {

                    $status = $karyawan->$field;

                    if ($status == 1) {

                        $status = 0;

                    } else {

                        $status = 1;

                    }

                    $statusData[$field] = $status;

                    $this->karyawan->updateData('karyawan', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {

                        redirect($_GET['redirect']);

                    } else {

                        redirect('admin/karyawan');

                    }

                } else {

                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/karyawan');

                }

            } else {

                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/karyawan');

            }

        }

    }

}