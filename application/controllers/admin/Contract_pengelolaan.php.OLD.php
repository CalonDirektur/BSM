<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Contract_pengelolaan extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/contract_pengelolaan_model', 'contract_pengelolaan');

    }

    public function index($id = 1)
    {

        $cond = "";

        $data['searchBy'] = '';

        $data['searchValue'] = '';

        $v_fields = $this->contract_pengelolaan->v_fields;

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

        $data['csvlink'] = base_url() . 'admin/contract_pengelolaan/export/csv';

        $data['pdflink'] = base_url() . 'admin/contract_pengelolaan/export/pdf';

        $data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

        // PAGINATION

        $config = array();

        $config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

        $config["base_url"] = base_url() . "admin/contract_pengelolaan/index";

        $total_row = $this->contract_pengelolaan->getCount('contract_pengelolaan', $searchBy, $searchValue);

        $config["first_url"] = base_url() . "admin/contract_pengelolaan/index" . '?' . $_SERVER['QUERY_STRING'];

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

        $data["results"] = $result = $this->contract_pengelolaan->getList("contract_pengelolaan", $pagi);

        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;

        // ./ PAGINATION /.

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        } else {

            $data['contract_pengelolaan'] = $this->contract_pengelolaan->getList('contract_pengelolaan');
            $data['pengguna'] = $this->ion_auth->user()->row();
            $this->load->view('admin/contract_pengelolaan/manage', $data);

        }

    }

    public function add()
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        $data = null;

        $this->form_validation->set_rules('customer', 'Customer Name', 'required');
        $this->form_validation->set_rules('wilayah', 'Wilayah Name', 'required');
        $this->form_validation->set_rules('uraian_pekerjaan', 'Uraian_pekerjaan Name', 'required');
        $this->form_validation->set_rules('jenis_pengelolaan', 'Jenis_pengelolaan Name', 'required');
        $this->form_validation->set_rules('nomor_kontrak', 'Nomor_kontrak Name', 'required');
        $this->form_validation->set_rules('tgl_kontrak', 'Tgl_kontrak Name', 'required');
        $this->form_validation->set_rules('masa_awal_kontrak', 'Masa_awal_kontrak Name', 'trim');
        $this->form_validation->set_rules('masa_akhir_kontrak', 'Masa_akhir_kontrak Name', 'trim');
        $this->form_validation->set_rules('durasi_kontrak_bulan', 'Durasi_kontrak_bulan Name', 'integer');
        $this->form_validation->set_rules('luasan_m2', 'Luasan_m2 Name', 'integer');
        $this->form_validation->set_rules('hrg_base_rent_m2', 'Hrg_base_rent_m2 Name', 'numeric');
        $this->form_validation->set_rules('hrg_srvc_chrg_m2', 'Hrg_srvc_chrg_m2 Name', 'numeric');
        $this->form_validation->set_rules('alamat_lokasi_kontrak', 'Alamat_lokasi_kontrak Name', 'trim');
        $this->form_validation->set_rules('hrg_br_per_bulan_rp', 'Hrg_br_per_bulan_rp Name', 'numeric');
        $this->form_validation->set_rules('hrg_sc_per_bulan_rp', 'Hrg_sc_per_bulan_rp Name', 'numeric');
        $this->form_validation->set_rules('hrg_br_per_periodkontrak_rp', 'Hrg_br_per_periodkontrak_rp Name', 'numeric');
        $this->form_validation->set_rules('hrg_sc_per_periodkontrak_rp', 'Hrg_sc_per_periodkontrak_rp Name', 'numeric');
        $this->form_validation->set_rules('satuan_period_kontrak', 'Satuan_period_kontrak Name', 'trim');
        $this->form_validation->set_rules('captive_or_notcaptive', 'Captive_or_notcaptive Name', 'required');
        $this->form_validation->set_rules('profit_center', 'Profit_center Name', 'trim');
        $this->form_validation->set_rules('status_kontrak', 'Status_kontrak Name', 'trim');
        $this->form_validation->set_rules('tax_remark', 'Tax_remark Name', 'trim');
        $this->form_validation->set_rules("id_file", "Id_file", "trim|xss_clean");

        $this->contract_pengelolaan->uploadData($photo_data, "id_file", "photo_path", "", "gif|jpg|png|jpeg");

        if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

            $data["errors"] = $photo_data["photo_err"];

            $this->form_validation->set_rules("id_file", "Id_file", "trim");

        }$this->form_validation->set_rules('updater_by', 'Updater_by Name', 'trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal Name', 'trim');

        $data['errors'] = array();

        if ($this->form_validation->run() == false) {

            $data["jenis_pengelolaan"] = $this->contract_pengelolaan->getListTable("jenis_pengelolaan");
            $data["satuan_period_kontrak"] = $this->contract_pengelolaan->getListTable("satuan_period_kontrak");
            $data["captive_or_non"] = $this->contract_pengelolaan->getListTable("captive_or_non");
            $data["unit_fm_bm"] = $this->contract_pengelolaan->getListTable("unit_fm_bm");
            $data["status_kontrak"] = $this->contract_pengelolaan->getListTable("status_kontrak");
            $data["users"] = $this->contract_pengelolaan->getListTable("users");
            $data['pengguna'] = $this->ion_auth->user()->row();
            $this->load->view('admin/contract_pengelolaan/add', $data);

        } else {

            $saveData['customer'] = set_value('customer');
            $saveData['wilayah'] = set_value('wilayah');
            $saveData['uraian_pekerjaan'] = set_value('uraian_pekerjaan');
            $saveData['jenis_pengelolaan'] = set_value('jenis_pengelolaan');
            $saveData['nomor_kontrak'] = set_value('nomor_kontrak');
            $saveData['tgl_kontrak'] = set_value('tgl_kontrak');
            $saveData['masa_awal_kontrak'] = set_value('masa_awal_kontrak');
            $saveData['masa_akhir_kontrak'] = set_value('masa_akhir_kontrak');
            $saveData['durasi_kontrak_bulan'] = set_value('durasi_kontrak_bulan');
            $saveData['luasan_m2'] = set_value('luasan_m2');
            $saveData['hrg_base_rent_m2'] = set_value('hrg_base_rent_m2');
            $saveData['hrg_srvc_chrg_m2'] = set_value('hrg_srvc_chrg_m2');
            $saveData['alamat_lokasi_kontrak'] = set_value('alamat_lokasi_kontrak');
            $saveData['hrg_br_per_bulan_rp'] = set_value('hrg_br_per_bulan_rp');
            $saveData['hrg_sc_per_bulan_rp'] = set_value('hrg_sc_per_bulan_rp');
            $saveData['hrg_br_per_periodkontrak_rp'] = set_value('hrg_br_per_periodkontrak_rp');
            $saveData['hrg_sc_per_periodkontrak_rp'] = set_value('hrg_sc_per_periodkontrak_rp');
            $saveData['satuan_period_kontrak'] = set_value('satuan_period_kontrak');
            $saveData['captive_or_notcaptive'] = set_value('captive_or_notcaptive');
            $saveData['profit_center'] = set_value('profit_center');
            $saveData['status_kontrak'] = set_value('status_kontrak');
            $saveData['tax_remark'] = set_value('tax_remark');
            if (isset($photo_data["id_file"]) && !empty($photo_data["id_file"])) {

                $saveData["id_file"] = $photo_data["id_file"];

            }$saveData['updater_by'] = set_value('updater_by');
            $saveData['tanggal'] = set_value('tanggal');

            $insert_id = $this->contract_pengelolaan->insert('contract_pengelolaan', $saveData);

            $this->session->set_flashdata('message', 'Contract_pengelolaan Added Successfully!');

            redirect('admin/contract_pengelolaan');

        }

    }

    public function view($id)
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $data = null;

            $this->form_validation->set_rules('customer', 'Customer Name', 'required');
            $this->form_validation->set_rules('wilayah', 'Wilayah Name', 'required');
            $this->form_validation->set_rules('uraian_pekerjaan', 'Uraian_pekerjaan Name', 'required');
            $this->form_validation->set_rules('jenis_pengelolaan', 'Jenis_pengelolaan Name', 'required');
            $this->form_validation->set_rules('nomor_kontrak', 'Nomor_kontrak Name', 'required');
            $this->form_validation->set_rules('tgl_kontrak', 'Tgl_kontrak Name', 'required');
            $this->form_validation->set_rules('masa_awal_kontrak', 'Masa_awal_kontrak Name', 'trim');
            $this->form_validation->set_rules('masa_akhir_kontrak', 'Masa_akhir_kontrak Name', 'trim');
            $this->form_validation->set_rules('durasi_kontrak_bulan', 'Durasi_kontrak_bulan Name', 'integer');
            $this->form_validation->set_rules('luasan_m2', 'Luasan_m2 Name', 'integer');
            $this->form_validation->set_rules('hrg_base_rent_m2', 'Hrg_base_rent_m2 Name', 'numeric');
            $this->form_validation->set_rules('hrg_srvc_chrg_m2', 'Hrg_srvc_chrg_m2 Name', 'numeric');
            $this->form_validation->set_rules('alamat_lokasi_kontrak', 'Alamat_lokasi_kontrak Name', 'trim');
            $this->form_validation->set_rules('hrg_br_per_bulan_rp', 'Hrg_br_per_bulan_rp Name', 'numeric');
            $this->form_validation->set_rules('hrg_sc_per_bulan_rp', 'Hrg_sc_per_bulan_rp Name', 'numeric');
            $this->form_validation->set_rules('hrg_br_per_periodkontrak_rp', 'Hrg_br_per_periodkontrak_rp Name', 'numeric');
            $this->form_validation->set_rules('hrg_sc_per_periodkontrak_rp', 'Hrg_sc_per_periodkontrak_rp Name', 'numeric');
            $this->form_validation->set_rules('satuan_period_kontrak', 'Satuan_period_kontrak Name', 'trim');
            $this->form_validation->set_rules('captive_or_notcaptive', 'Captive_or_notcaptive Name', 'required');
            $this->form_validation->set_rules('profit_center', 'Profit_center Name', 'trim');
            $this->form_validation->set_rules('status_kontrak', 'Status_kontrak Name', 'trim');
            $this->form_validation->set_rules('tax_remark', 'Tax_remark Name', 'trim');
            $this->form_validation->set_rules("id_file", "Id_file", "trim|xss_clean");

            $this->contract_pengelolaan->uploadData($photo_data, "id_file", "photo_path", "", "gif|jpg|png|jpeg");

            if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

                $data["errors"] = $photo_data["photo_err"];

                $this->form_validation->set_rules("id_file", "Id_file", "trim");

            }$this->form_validation->set_rules('updater_by', 'Updater_by Name', 'trim');
            $this->form_validation->set_rules('tanggal', 'Tanggal Name', 'trim');

            $data['errors'] = array();

            if ($this->form_validation->run() == false) {

                $data["jenis_pengelolaan"] = $this->contract_pengelolaan->getListTable("jenis_pengelolaan");
                $data["satuan_period_kontrak"] = $this->contract_pengelolaan->getListTable("satuan_period_kontrak");
                $data["captive_or_non"] = $this->contract_pengelolaan->getListTable("captive_or_non");
                $data["unit_fm_bm"] = $this->contract_pengelolaan->getListTable("unit_fm_bm");
                $data["status_kontrak"] = $this->contract_pengelolaan->getListTable("status_kontrak");
                $data["users"] = $this->contract_pengelolaan->getListTable("users");

                $data['contract_pengelolaan'] = $this->contract_pengelolaan->getRow('contract_pengelolaan', $id);
                $data['pengguna'] = $this->ion_auth->user()->row();
                $this->load->view('admin/contract_pengelolaan/view', $data);

            } else {

                redirect('admin/contract_pengelolaan/view');

            }

        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/contract_pengelolaan/view');

        }

    }

    public function edit($id)
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $data = null;

            $this->form_validation->set_rules('customer', 'Customer Name', 'required');
            $this->form_validation->set_rules('wilayah', 'Wilayah Name', 'required');
            $this->form_validation->set_rules('uraian_pekerjaan', 'Uraian_pekerjaan Name', 'required');
            $this->form_validation->set_rules('jenis_pengelolaan', 'Jenis_pengelolaan Name', 'required');
            $this->form_validation->set_rules('nomor_kontrak', 'Nomor_kontrak Name', 'required');
            $this->form_validation->set_rules('tgl_kontrak', 'Tgl_kontrak Name', 'required');
            $this->form_validation->set_rules('masa_awal_kontrak', 'Masa_awal_kontrak Name', 'trim');
            $this->form_validation->set_rules('masa_akhir_kontrak', 'Masa_akhir_kontrak Name', 'trim');
            $this->form_validation->set_rules('durasi_kontrak_bulan', 'Durasi_kontrak_bulan Name', 'integer');
            $this->form_validation->set_rules('luasan_m2', 'Luasan_m2 Name', 'integer');
            $this->form_validation->set_rules('hrg_base_rent_m2', 'Hrg_base_rent_m2 Name', 'numeric');
            $this->form_validation->set_rules('hrg_srvc_chrg_m2', 'Hrg_srvc_chrg_m2 Name', 'numeric');
            $this->form_validation->set_rules('alamat_lokasi_kontrak', 'Alamat_lokasi_kontrak Name', 'trim');
            $this->form_validation->set_rules('hrg_br_per_bulan_rp', 'Hrg_br_per_bulan_rp Name', 'numeric');
            $this->form_validation->set_rules('hrg_sc_per_bulan_rp', 'Hrg_sc_per_bulan_rp Name', 'numeric');
            $this->form_validation->set_rules('hrg_br_per_periodkontrak_rp', 'Hrg_br_per_periodkontrak_rp Name', 'numeric');
            $this->form_validation->set_rules('hrg_sc_per_periodkontrak_rp', 'Hrg_sc_per_periodkontrak_rp Name', 'numeric');
            $this->form_validation->set_rules('satuan_period_kontrak', 'Satuan_period_kontrak Name', 'trim');
            $this->form_validation->set_rules('captive_or_notcaptive', 'Captive_or_notcaptive Name', 'required');
            $this->form_validation->set_rules('profit_center', 'Profit_center Name', 'trim');
            $this->form_validation->set_rules('status_kontrak', 'Status_kontrak Name', 'trim');
            $this->form_validation->set_rules('tax_remark', 'Tax_remark Name', 'trim');
            $this->form_validation->set_rules("id_file", "Id_file", "trim|xss_clean");

            $this->contract_pengelolaan->uploadData($photo_data, "id_file", "photo_path", "", "gif|jpg|png|jpeg");

            if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

                $data["errors"] = $photo_data["photo_err"];

                $this->form_validation->set_rules("id_file", "Id_file", "trim");

            }$this->form_validation->set_rules('updater_by', 'Updater_by Name', 'trim');
            $this->form_validation->set_rules('tanggal', 'Tanggal Name', 'trim');

            $data['errors'] = array();

            if ($this->form_validation->run() == false) {

                $data['contract_pengelolaan'] = $this->contract_pengelolaan->getRow('contract_pengelolaan', $id);

                $data["jenis_pengelolaan"] = $this->contract_pengelolaan->getListTable("jenis_pengelolaan");
                $data["satuan_period_kontrak"] = $this->contract_pengelolaan->getListTable("satuan_period_kontrak");
                $data["captive_or_non"] = $this->contract_pengelolaan->getListTable("captive_or_non");
                $data["unit_fm_bm"] = $this->contract_pengelolaan->getListTable("unit_fm_bm");
                $data["status_kontrak"] = $this->contract_pengelolaan->getListTable("status_kontrak");
                $data["users"] = $this->contract_pengelolaan->getListTable("users");
                $data['pengguna'] = $this->ion_auth->user()->row();
                $this->load->view('admin/contract_pengelolaan/edit', $data);

            } else {

                $saveData['customer'] = set_value('customer');
                $saveData['wilayah'] = set_value('wilayah');
                $saveData['uraian_pekerjaan'] = set_value('uraian_pekerjaan');
                $saveData['jenis_pengelolaan'] = set_value('jenis_pengelolaan');
                $saveData['nomor_kontrak'] = set_value('nomor_kontrak');
                $saveData['tgl_kontrak'] = set_value('tgl_kontrak');
                $saveData['masa_awal_kontrak'] = set_value('masa_awal_kontrak');
                $saveData['masa_akhir_kontrak'] = set_value('masa_akhir_kontrak');
                $saveData['durasi_kontrak_bulan'] = set_value('durasi_kontrak_bulan');
                $saveData['luasan_m2'] = set_value('luasan_m2');
                $saveData['hrg_base_rent_m2'] = set_value('hrg_base_rent_m2');
                $saveData['hrg_srvc_chrg_m2'] = set_value('hrg_srvc_chrg_m2');
                $saveData['alamat_lokasi_kontrak'] = set_value('alamat_lokasi_kontrak');
                $saveData['hrg_br_per_bulan_rp'] = set_value('hrg_br_per_bulan_rp');
                $saveData['hrg_sc_per_bulan_rp'] = set_value('hrg_sc_per_bulan_rp');
                $saveData['hrg_br_per_periodkontrak_rp'] = set_value('hrg_br_per_periodkontrak_rp');
                $saveData['hrg_sc_per_periodkontrak_rp'] = set_value('hrg_sc_per_periodkontrak_rp');
                $saveData['satuan_period_kontrak'] = set_value('satuan_period_kontrak');
                $saveData['captive_or_notcaptive'] = set_value('captive_or_notcaptive');
                $saveData['profit_center'] = set_value('profit_center');
                $saveData['status_kontrak'] = set_value('status_kontrak');
                $saveData['tax_remark'] = set_value('tax_remark');
                if (isset($photo_data["id_file"]) && !empty($photo_data["id_file"])) {

                    $saveData["id_file"] = $photo_data["id_file"];

                }$saveData['updater_by'] = set_value('updater_by');
                $saveData['tanggal'] = set_value('tanggal');

                $this->contract_pengelolaan->updateData('contract_pengelolaan', $saveData, $id);

                $this->session->set_flashdata('message', 'Contract_pengelolaan Updated Successfully!');

                redirect('admin/contract_pengelolaan');

            }

        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/contract_pengelolaan');

        }

    }

    public function delete($id = '')
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('/auth/login/');

        }

        if (isset($id) and !empty($id)) {

            $count = $this->contract_pengelolaan->getCount('contract_pengelolaan', 'contract_pengelolaan.id', $id);

            if (isset($count) and !empty($count)) {

                $this->contract_pengelolaan->delete('contract_pengelolaan', 'id', $id);

                $this->session->set_flashdata('message', ' Contract_pengelolaan Deleted Successfully !');

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

            //$count=$this->contract_pengelolaan->getCount('contract_pengelolaan','contract_pengelolaan.id',$id);

            for ($a = 0; $a < count($all_ids); $a++) {

                if ($all_ids[$a] != "") {

                    $this->contract_pengelolaan->delete('contract_pengelolaan', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' Contract_pengelolaan(s) Deleted Successfully !');

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

        $v_fields = array('customer', 'wilayah', 'uraian_pekerjaan', 'jenis_pengelolaan', 'nomor_kontrak', 'tgl_kontrak', 'masa_awal_kontrak', 'masa_akhir_kontrak', 'durasi_kontrak_bulan', 'luasan_m2', 'hrg_base_rent_m2', 'hrg_srvc_chrg_m2', 'alamat_lokasi_kontrak', 'hrg_br_per_bulan_rp', 'hrg_sc_per_bulan_rp', 'hrg_br_per_periodkontrak_rp', 'hrg_sc_per_periodkontrak_rp', 'satuan_period_kontrak', 'captive_or_notcaptive', 'profit_center', 'status_kontrak', 'tax_remark', 'id_file', 'updater_by', 'tanggal');

        $data['sortBy'] = '';

        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

        $order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

        $searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

        $searchValue = addslashes($searchValue);

        $pagi = array('order' => $order, 'order_by' => $order_by);

        $result = $this->contract_pengelolaan->getList("contract_pengelolaan");

        if ($filetype == 'csv') {

            header('Content-Type: application/csv');

            header('Content-Disposition: attachment; filename=contract_pengelolaan.csv');

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

			<h1 align="center">Contract_pengelolaan</h1>

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

            $pdf->Output('contract_pengelolaan.pdf', "D");

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

                if (!is_null($contract_pengelolaan = $this->contract_pengelolaan->getRow('contract_pengelolaan', $id))) {

                    $status = $contract_pengelolaan->$field;

                    if ($status == 1) {

                        $status = 0;

                    } else {

                        $status = 1;

                    }

                    $statusData[$field] = $status;

                    $this->contract_pengelolaan->updateData('contract_pengelolaan', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {

                        redirect($_GET['redirect']);

                    } else {

                        redirect('admin/contract_pengelolaan');

                    }

                } else {

                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/contract_pengelolaan');

                }

            } else {

                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/contract_pengelolaan');

            }

        }

    }

}