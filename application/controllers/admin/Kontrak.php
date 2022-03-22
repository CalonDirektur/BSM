<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Kontrak extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/kontrak_model', 'kontrak');

    }

    public function index($id = 1)
    {

        $cond = "";

        $data['searchBy'] = '';

        $data['searchValue'] = '';

        $v_fields = $this->kontrak->v_fields;

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

        $data['csvlink'] = base_url() . 'admin/kontrak/export/csv';

        $data['pdflink'] = base_url() . 'admin/kontrak/export/pdf';

        $data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

        // PAGINATION

        $config = array();

        $config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

        $config["base_url"] = base_url() . "admin/kontrak/index";

        $total_row = $this->kontrak->getCount('kontrak', $searchBy, $searchValue);

        $config["first_url"] = base_url() . "admin/kontrak/index" . '?' . $_SERVER['QUERY_STRING'];

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

        $data["results"] = $result = $this->kontrak->getList("kontrak", $pagi);

        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;

        // ./ PAGINATION /.

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        } else {

            $data['kontrak'] = $this->kontrak->getList('kontrak');
            $data['pengguna'] = $this->ion_auth->user()->row();

            $this->load->view('admin/kontrak/manage', $data);

        }

    }

    public function add()
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        $data = null;

        $this->form_validation->set_rules('nama_pengadaan', 'Nama_pengadaan Name', 'required');
        $this->form_validation->set_rules('vendor', 'Vendor Name', 'required');
        $this->form_validation->set_rules('nilai_kontrak_customer', 'Nilai_kontrak_customer Name', 'required');
        $this->form_validation->set_rules('nilai_juskeb', 'Nilai_juskeb Name', 'required');
        $this->form_validation->set_rules('nilai_kontrak_mitra', 'Nilai_kontrak_mitra Name', 'required');
        $this->form_validation->set_rules('tanggal_kontrak_pengadaan', 'Tanggal_kontrak_pengadaan Name', 'required');
        $this->form_validation->set_rules('tanggal_kontrak_berakhir', 'Tanggal_kontrak_berakhir Name', 'required');
        $this->form_validation->set_rules('tanggal_bast', 'Tanggal_bast Name', 'required');
        $this->form_validation->set_rules('tanggal_invoice', 'Tanggal_invoice Name', 'required');
        $this->form_validation->set_rules('tanggal_payment', 'Tanggal_payment Name', 'required');
        $this->form_validation->set_rules('opex_capex', 'Opex_capex Name', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Name', 'required');
        $this->form_validation->set_rules('portofolio', 'Portofolio Name', 'required');
        $this->form_validation->set_rules('metode_pengadaan', 'Metode_pengadaan Name', 'required');
        $this->form_validation->set_rules('tanggal_penerimaan_juskeb', 'Tanggal_penerimaan_juskeb Name', 'trim');
        $this->form_validation->set_rules('tanggal_pr', 'Tanggal_pr Name', 'trim');
        $this->form_validation->set_rules('tanggal_po', 'Tanggal_po Name', 'trim');
        $this->form_validation->set_rules('tanggal_insert', 'Tanggal_insert Name', 'trim');
        $this->form_validation->set_rules('username', 'Username Name', 'trim');

        $data['errors'] = array();

        if ($this->form_validation->run() == false) {

            $data["opex_capex"] = $this->kontrak->getListTable("opex_capex");
            $data["portofolio"] = $this->kontrak->getListTable("portofolio");
            $data["metode_pengadaan"] = $this->kontrak->getListTable("metode_pengadaan");
            $data["users"] = $this->kontrak->getListTable("users");
            $data['pengguna'] = $this->ion_auth->user()->row();

            $this->load->view('admin/kontrak/add', $data);

        } else {

            $saveData['nama_pengadaan'] = set_value('nama_pengadaan');
            $saveData['vendor'] = set_value('vendor');
            $saveData['nilai_kontrak_customer'] = set_value('nilai_kontrak_customer');
            $saveData['nilai_juskeb'] = set_value('nilai_juskeb');
            $saveData['nilai_kontrak_mitra'] = set_value('nilai_kontrak_mitra');
            $saveData['tanggal_kontrak_pengadaan'] = set_value('tanggal_kontrak_pengadaan');
            $saveData['tanggal_kontrak_berakhir'] = set_value('tanggal_kontrak_berakhir');
            $saveData['tanggal_bast'] = set_value('tanggal_bast');
            $saveData['tanggal_invoice'] = set_value('tanggal_invoice');
            $saveData['tanggal_payment'] = set_value('tanggal_payment');
            $saveData['opex_capex'] = set_value('opex_capex');
            $saveData['lokasi'] = set_value('lokasi');
            $saveData['portofolio'] = set_value('portofolio');
            $saveData['metode_pengadaan'] = set_value('metode_pengadaan');
            $saveData['tanggal_penerimaan_juskeb'] = set_value('tanggal_penerimaan_juskeb');
            $saveData['tanggal_pr'] = set_value('tanggal_pr');
            $saveData['tanggal_po'] = set_value('tanggal_po');
            $saveData['tanggal_insert'] = set_value('tanggal_insert');
            $saveData['username'] = set_value('username');

            $insert_id = $this->kontrak->insert('kontrak', $saveData);

            $this->session->set_flashdata('message', 'Kontrak Added Successfully!');

            redirect('admin/kontrak');

        }

    }

    public function view($id)
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $data = null;

            $this->form_validation->set_rules('nama_pengadaan', 'Nama_pengadaan Name', 'required');
            $this->form_validation->set_rules('vendor', 'Vendor Name', 'required');
            $this->form_validation->set_rules('nilai_kontrak_customer', 'Nilai_kontrak_customer Name', 'required');
            $this->form_validation->set_rules('nilai_juskeb', 'Nilai_juskeb Name', 'required');
            $this->form_validation->set_rules('nilai_kontrak_mitra', 'Nilai_kontrak_mitra Name', 'required');
            $this->form_validation->set_rules('tanggal_kontrak_pengadaan', 'Tanggal_kontrak_pengadaan Name', 'required');
            $this->form_validation->set_rules('tanggal_kontrak_berakhir', 'Tanggal_kontrak_berakhir Name', 'required');
            $this->form_validation->set_rules('tanggal_bast', 'Tanggal_bast Name', 'required');
            $this->form_validation->set_rules('tanggal_invoice', 'Tanggal_invoice Name', 'required');
            $this->form_validation->set_rules('tanggal_payment', 'Tanggal_payment Name', 'required');
            $this->form_validation->set_rules('opex_capex', 'Opex_capex Name', 'required');
            $this->form_validation->set_rules('lokasi', 'Lokasi Name', 'required');
            $this->form_validation->set_rules('portofolio', 'Portofolio Name', 'required');
            $this->form_validation->set_rules('metode_pengadaan', 'Metode_pengadaan Name', 'required');
            $this->form_validation->set_rules('tanggal_penerimaan_juskeb', 'Tanggal_penerimaan_juskeb Name', 'trim');
            $this->form_validation->set_rules('tanggal_pr', 'Tanggal_pr Name', 'trim');
            $this->form_validation->set_rules('tanggal_po', 'Tanggal_po Name', 'trim');
            $this->form_validation->set_rules('tanggal_insert', 'Tanggal_insert Name', 'trim');
            $this->form_validation->set_rules('username', 'Username Name', 'trim');

            $data['errors'] = array();

            if ($this->form_validation->run() == false) {

                $data["opex_capex"] = $this->kontrak->getListTable("opex_capex");
                $data["portofolio"] = $this->kontrak->getListTable("portofolio");
                $data["metode_pengadaan"] = $this->kontrak->getListTable("metode_pengadaan");
                $data["users"] = $this->kontrak->getListTable("users");

                $data['kontrak'] = $this->kontrak->getRow('kontrak', $id);
                $data['pengguna'] = $this->ion_auth->user()->row();

                $this->load->view('admin/kontrak/view', $data);

            } else {

                redirect('admin/kontrak/view');

            }

        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/kontrak/view');

        }

    }

    public function edit($id)
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $data = null;

            $this->form_validation->set_rules('nama_pengadaan', 'Nama_pengadaan Name', 'required');
            $this->form_validation->set_rules('vendor', 'Vendor Name', 'required');
            $this->form_validation->set_rules('nilai_kontrak_customer', 'Nilai_kontrak_customer Name', 'required');
            $this->form_validation->set_rules('nilai_juskeb', 'Nilai_juskeb Name', 'required');
            $this->form_validation->set_rules('nilai_kontrak_mitra', 'Nilai_kontrak_mitra Name', 'required');
            $this->form_validation->set_rules('tanggal_kontrak_pengadaan', 'Tanggal_kontrak_pengadaan Name', 'required');
            $this->form_validation->set_rules('tanggal_kontrak_berakhir', 'Tanggal_kontrak_berakhir Name', 'required');
            $this->form_validation->set_rules('tanggal_bast', 'Tanggal_bast Name', 'required');
            $this->form_validation->set_rules('tanggal_invoice', 'Tanggal_invoice Name', 'required');
            $this->form_validation->set_rules('tanggal_payment', 'Tanggal_payment Name', 'required');
            $this->form_validation->set_rules('opex_capex', 'Opex_capex Name', 'required');
            $this->form_validation->set_rules('lokasi', 'Lokasi Name', 'required');
            $this->form_validation->set_rules('portofolio', 'Portofolio Name', 'required');
            $this->form_validation->set_rules('metode_pengadaan', 'Metode_pengadaan Name', 'required');
            $this->form_validation->set_rules('tanggal_penerimaan_juskeb', 'Tanggal_penerimaan_juskeb Name', 'trim');
            $this->form_validation->set_rules('tanggal_pr', 'Tanggal_pr Name', 'trim');
            $this->form_validation->set_rules('tanggal_po', 'Tanggal_po Name', 'trim');
            $this->form_validation->set_rules('tanggal_insert', 'Tanggal_insert Name', 'trim');
            $this->form_validation->set_rules('username', 'Username Name', 'trim');

            $data['errors'] = array();

            if ($this->form_validation->run() == false) {

                $data['kontrak'] = $this->kontrak->getRow('kontrak', $id);

                $data["opex_capex"] = $this->kontrak->getListTable("opex_capex");
                $data["portofolio"] = $this->kontrak->getListTable("portofolio");
                $data["metode_pengadaan"] = $this->kontrak->getListTable("metode_pengadaan");
                $data["users"] = $this->kontrak->getListTable("users");
                $data['pengguna'] = $this->ion_auth->user()->row();
                $this->load->view('admin/kontrak/edit', $data);

            } else {

                $saveData['nama_pengadaan'] = set_value('nama_pengadaan');
                $saveData['vendor'] = set_value('vendor');
                $saveData['nilai_kontrak_customer'] = set_value('nilai_kontrak_customer');
                $saveData['nilai_juskeb'] = set_value('nilai_juskeb');
                $saveData['nilai_kontrak_mitra'] = set_value('nilai_kontrak_mitra');
                $saveData['tanggal_kontrak_pengadaan'] = set_value('tanggal_kontrak_pengadaan');
                $saveData['tanggal_kontrak_berakhir'] = set_value('tanggal_kontrak_berakhir');
                $saveData['tanggal_bast'] = set_value('tanggal_bast');
                $saveData['tanggal_invoice'] = set_value('tanggal_invoice');
                $saveData['tanggal_payment'] = set_value('tanggal_payment');
                $saveData['opex_capex'] = set_value('opex_capex');
                $saveData['lokasi'] = set_value('lokasi');
                $saveData['portofolio'] = set_value('portofolio');
                $saveData['metode_pengadaan'] = set_value('metode_pengadaan');
                $saveData['tanggal_penerimaan_juskeb'] = set_value('tanggal_penerimaan_juskeb');
                $saveData['tanggal_pr'] = set_value('tanggal_pr');
                $saveData['tanggal_po'] = set_value('tanggal_po');
                $saveData['tanggal_insert'] = set_value('tanggal_insert');
                $saveData['username'] = set_value('username');

                $this->kontrak->updateData('kontrak', $saveData, $id);

                $this->session->set_flashdata('message', 'Kontrak Updated Successfully!');

                redirect('admin/kontrak');

            }

        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/kontrak');

        }

    }

    public function delete($id = '')
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $count = $this->kontrak->getCount('kontrak', 'kontrak.id', $id);

            if (isset($count) and !empty($count)) {

                $this->kontrak->delete('kontrak', 'id', $id);

                $this->session->set_flashdata('message', ' Kontrak Deleted Successfully !');

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

            //$count=$this->kontrak->getCount('kontrak','kontrak.id',$id);

            for ($a = 0; $a < count($all_ids); $a++) {

                if ($all_ids[$a] != "") {

                    $this->kontrak->delete('kontrak', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' Kontrak(s) Deleted Successfully !');

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

        $v_fields = array('nama_pengadaan', 'vendor', 'nilai_kontrak_customer', 'nilai_juskeb', 'nilai_kontrak_mitra', 'tanggal_kontrak_pengadaan', 'tanggal_kontrak_berakhir', 'tanggal_bast', 'tanggal_invoice', 'tanggal_payment', 'opex_capex', 'lokasi', 'portofolio', 'metode_pengadaan', 'tanggal_penerimaan_juskeb', 'tanggal_pr', 'tanggal_po', 'tanggal_insert', 'username');

        $data['sortBy'] = '';

        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

        $order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

        $searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

        $searchValue = addslashes($searchValue);

        $pagi = array('order' => $order, 'order_by' => $order_by);

        $result = $this->kontrak->getList("kontrak");

        if ($filetype == 'csv') {

            header('Content-Type: application/csv');

            header('Content-Disposition: attachment; filename=kontrak.csv');

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

			<h1 align="center">Kontrak</h1>

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

            $pdf->Output('kontrak.pdf', "D");

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

                if (!is_null($kontrak = $this->kontrak->getRow('kontrak', $id))) {

                    $status = $kontrak->$field;

                    if ($status == 1) {

                        $status = 0;

                    } else {

                        $status = 1;

                    }

                    $statusData[$field] = $status;

                    $this->kontrak->updateData('kontrak', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {

                        redirect($_GET['redirect']);

                    } else {

                        redirect('admin/kontrak');

                    }

                } else {

                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/kontrak');

                }

            } else {

                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/kontrak');

            }

        }

    }

}