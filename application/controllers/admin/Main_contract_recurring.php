<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Main_contract_recurring extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model(
            'admin/main_contract_recurring_model',
            'main_contract_recurring'
        );
        $this->load->model(
            'admin/nilai_pengelolaan_model',
            'nilai_pengelolaan'
        );
    }

    function index($id = 1)
    {
        $cond = '';

        $data['searchBy'] = '';

        $data['searchValue'] = '';

        $v_fields = $this->main_contract_recurring->v_fields;

        $per_page_arr = ['5', '10', '20', '50', '100'];

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

        $data['csvlink'] =
            base_url() . 'admin/main_contract_recurring/export/csv';

        $data['pdflink'] =
            base_url() . 'admin/main_contract_recurring/export/pdf';

        $data['per_page'] =
            isset($_GET['per_page']) &&
            in_array($_GET['per_page'], $per_page_arr)
                ? $_GET['per_page']
                : '5';

        // PAGINATION

        $config = [];

        $config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

        $config['base_url'] =
            base_url() . 'admin/main_contract_recurring/index';

        $total_row = $this->main_contract_recurring->getCount(
            'main_contract_recurring',
            $searchBy,
            $searchValue
        );

        $config['first_url'] =
            base_url() .
            'admin/main_contract_recurring/index' .
            '?' .
            $_SERVER['QUERY_STRING'];

        $config['total_rows'] = $total_row;

        $config['per_page'] = $per_page = $data['per_page'];

        $config['uri_segment'] = $this->uri->total_segments();

        $config['use_page_numbers'] = true;

        $config['num_links'] = 3; //$total_row

        $config['cur_tag_open'] = '&nbsp;<a class="current">';

        $config['cur_tag_close'] = '</a>';

        $config['full_tag_open'] = "<ul class='pagination'>";

        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] =
            "<li class='disabled'><li class='active'><a href='#'>";

        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

        $config['next_tag_open'] = '<li>';

        $config['next_tagl_close'] = '</li>';

        $config['prev_tag_open'] = '<li>';

        $config['prev_tagl_close'] = '</li>';

        $config['first_link'] = 'First';

        $config['first_tag_open'] = '<li>';

        $config['first_tagl_close'] = '</li>';

        $config['last_link'] = 'Last';

        $config['last_tag_open'] = '<li>';

        $config['last_tagl_close'] = '</li>';

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

        $data['results'] = $result = $this->main_contract_recurring->getList(
            'main_contract_recurring',
            $pagi
        );

        $str_links = $this->pagination->create_links();

        $data['links'] = $str_links;

        // ./ PAGINATION /.

        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $data[
                'main_contract_recurring'
            ] = $this->main_contract_recurring->getList(
                'main_contract_recurring'
            );
            $data['pengguna'] = $this->ion_auth->user()->row();
            $this->load->view('admin/main_contract_recurring/manage', $data);
        }
    }

    public function add()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        $data = null;

        $this->form_validation->set_rules(
            'nomor_kontrak',
            'Nomor_kontrak Name',
            'required'
        );
        $this->form_validation->set_rules(
            'secondary_nomor_kontrak',
            'Secondary_nomor_kontrak Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'kategori_kontrak',
            'Kategori_kontrak Name',
            'required'
        );
        $this->form_validation->set_rules(
            'nama_kontrak',
            'Nama_kontrak Name',
            'required'
        );
        $this->form_validation->set_rules(
            'customer_mitra',
            'Customer_mitra Name',
            'required'
        );
        $this->form_validation->set_rules(
            'wilayah_mitra',
            'Wilayah_mitra Name',
            'required'
        );
        $this->form_validation->set_rules(
            'objek_kontrak',
            'Objek_kontrak Name',
            'required'
        );
        $this->form_validation->set_rules(
            'tanggal_kontrak',
            'Tanggal_kontrak Name',
            'required'
        );
        $this->form_validation->set_rules(
            'masa_awal',
            'Masa_awal Name',
            'required'
        );
        $this->form_validation->set_rules(
            'masa_akhir',
            'Masa_akhir Name',
            'required'
        );
        $this->form_validation->set_rules(
            'lama_kontrak_bulan',
            'Lama_kontrak_bulan Name',
            'required'
        );
        $this->form_validation->set_rules(
            'luasan_m2',
            'Luasan_m2 Name',
            'numeric'
        );
        $this->form_validation->set_rules(
            'nama_file',
            'Nama_file',
            'trim|xss_clean'
        );

        $this->main_contract_recurring->uploadData(
            $photo_data,
            'nama_file',
            'photo_path',
            '',
            'gif|jpg|png|jpeg|pdf'
        );

        if (
            isset($photo_data['photo_err']) and !empty($photo_data['photo_err'])
        ) {
            $data['errors'] = $photo_data['photo_err'];

            $this->form_validation->set_rules(
                'nama_file',
                'Nama_file',
                'required'
            );
        }

        $this->form_validation->set_rules(
            'ket_kontrak_induk',
            'Ket_kontrak_induk Name',
            'trim'
        );

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {
            $data[
                'kategori_kontrak'
            ] = $this->main_contract_recurring->getListTable(
                'kategori_kontrak'
            );
            $data['pengguna'] = $this->ion_auth->user()->row();
            $data['portofolio'] = $this->nilai_pengelolaan->getListTable(
                'portofolio'
            );
            $data['unit_fm_bm'] = $this->nilai_pengelolaan->getListTable(
                'unit_fm_bm'
            );

            $this->load->view('admin/main_contract_recurring/add', $data);
        } else {
            $saveData['nomor_kontrak'] = set_value('nomor_kontrak');
            $saveData['secondary_nomor_kontrak'] = set_value(
                'secondary_nomor_kontrak'
            );
            $saveData['kategori_kontrak'] = set_value('kategori_kontrak');
            $saveData['nama_kontrak'] = set_value('nama_kontrak');
            $saveData['customer_mitra'] = set_value('customer_mitra');
            $saveData['wilayah_mitra'] = set_value('wilayah_mitra');
            $saveData['objek_kontrak'] = set_value('objek_kontrak');
            $saveData['tanggal_kontrak'] = set_value('tanggal_kontrak');
            $saveData['masa_awal'] = set_value('masa_awal');
            $saveData['masa_akhir'] = set_value('masa_akhir');
            $saveData['lama_kontrak_bulan'] = set_value('lama_kontrak_bulan');
            $saveData['luasan_m2'] = set_value('luasan_m2');
            if (
                isset($photo_data['nama_file']) &&
                !empty($photo_data['nama_file'])
            ) {
                $saveData['nama_file'] = $photo_data['nama_file'];
            }

            $saveData['ket_kontrak_induk'] = set_value('ket_kontrak_induk');

            // $nilai_pengelolaan = [
            // 	//'id_kontrak' => $last_id_kontrak,
            // 	'portofolio' => $this->input->post('portofolio'),
            // 	'nilai_bulan' => $this->input->post('nilai_bulan'),
            // 	'fm' => $this->input->post('fm')
            // ];

            $portofolio = $this->input->post('portofolio');
            $nilai_bulan = $this->input->post('nilai_bulan');
            $fm = $this->input->post('fm');

            $portofolio_kedua = $this->input->post('portofolio_kedua');
            $nilai_bulan_sc = $this->input->post('nilai_bulan_sc');
            // $fm = $this->input->post('fm');

            //$last_id_kontrak = $this->db->insert_id();

            $nomor_kontrak = $this->input->post('nomor_kontrak');
            $kategori_kontrak = $this->input->post('kategori_kontrak');
            $nama_kontrak = $this->input->post('nama_kontrak');
            $customer_mitra = $this->input->post('customer_mitra');
            $wilayah_mitra = $this->input->post('wilayah_mitra');
            $tanggal_kontrak = $this->input->post('tanggal_kontrak');
            $masa_awal = $this->input->post('masa_awal');
            $masa_akhir = $this->input->post('masa_akhir');

            $insert_id = $this->main_contract_recurring->insert(
                'main_contract_recurring',
                $saveData,
                $portofolio,
                $nilai_bulan,
                $portofolio_kedua,
                $nilai_bulan_sc,
                $fm,

                $nomor_kontrak,
                $kategori_kontrak,
                $nama_kontrak,
                $customer_mitra,
                $wilayah_mitra,
                $tanggal_kontrak,
                $masa_awal,
                $masa_akhir
            );

            // $nilai_pengelolaan = [
            // 	'id_kontrak' => $last_id_kontrak,
            // 	'portofolio' => $this->input->post('portofolio'),
            // 	'nilai_bulan' => $this->input->post('nilai_bulan'),
            // 	'fm' => $this->input->post('fm')
            // ];

            //$this->db->insert('nilai_pengelolaan', $nilai_pengelolaan);

            //var_dump

            //	$this->session->set_flashdata('message', 'Main_contract_recurring Added Successfully!');

            //	redirect('admin/main_contract_recurring');
        }
    }

    function view($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules(
                'nomor_kontrak',
                'Nomor_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'secondary_nomor_kontrak',
                'Secondary_nomor_kontrak Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'kategori_kontrak',
                'Kategori_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'nama_kontrak',
                'Nama_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'customer_mitra',
                'Customer_mitra Name',
                'required'
            );
            $this->form_validation->set_rules(
                'wilayah_mitra',
                'Wilayah_mitra Name',
                'required'
            );
            $this->form_validation->set_rules(
                'objek_kontrak',
                'Objek_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'tanggal_kontrak',
                'Tanggal_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'masa_awal',
                'Masa_awal Name',
                'required'
            );
            $this->form_validation->set_rules(
                'masa_akhir',
                'Masa_akhir Name',
                'required'
            );
            $this->form_validation->set_rules(
                'lama_kontrak_bulan',
                'Lama_kontrak_bulan Name',
                'required'
            );
            $this->form_validation->set_rules(
                'luasan_m2',
                'Luasan_m2 Name',
                'numeric'
            );
            $this->form_validation->set_rules(
                'nama_file',
                'Nama_file',
                'trim|xss_clean'
            );

            $this->main_contract_recurring->uploadData(
                $photo_data,
                'nama_file',
                'photo_path',
                '',
                'gif|jpg|png|jpeg|pdf'
            );

            if (
                isset($photo_data['photo_err']) and
                !empty($photo_data['photo_err'])
            ) {
                $data['errors'] = $photo_data['photo_err'];

                $this->form_validation->set_rules(
                    'nama_file',
                    'Nama_file',
                    'required'
                );
            }
            $this->form_validation->set_rules(
                'ket_kontrak_induk',
                'Ket_kontrak_induk Name',
                'trim'
            );

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data[
                    'kategori_kontrak'
                ] = $this->main_contract_recurring->getListTable(
                    'kategori_kontrak'
                ); //menampilkan semua isi table

                $data[
                    'main_contract_recurring'
                ] = $this->main_contract_recurring->getRow(
                    'main_contract_recurring',
                    $id
                ); //mencari data spesifik dari tabel
                $data['pengguna'] = $this->ion_auth->user()->row();

                $data[
                    'main_contract_recurrings'
                ] = $this->nilai_pengelolaan->getListTable(
                    'main_contract_recurring'
                );
                $data['portofolio'] = $this->nilai_pengelolaan->getListTable(
                    'portofolio'
                );
                $data['unit_fm_bm'] = $this->nilai_pengelolaan->getListTable(
                    'unit_fm_bm'
                );

                $data[
                    'nilai_pengelolaans'
                ] = $this->nilai_pengelolaan->getRowdariContract(
                    'nilai_pengelolaan',
                    $id
                );
                $this->load->view('admin/main_contract_recurring/view', $data);
            } else {
                redirect('admin/main_contract_recurring/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/main_contract_recurring/view');
        }
    }

    function edit($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules(
                'nomor_kontrak',
                'Nomor_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'secondary_nomor_kontrak',
                'Secondary_nomor_kontrak Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'kategori_kontrak',
                'Kategori_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'nama_kontrak',
                'Nama_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'customer_mitra',
                'Customer_mitra Name',
                'required'
            );
            $this->form_validation->set_rules(
                'wilayah_mitra',
                'Wilayah_mitra Name',
                'required'
            );
            $this->form_validation->set_rules(
                'objek_kontrak',
                'Objek_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'tanggal_kontrak',
                'Tanggal_kontrak Name',
                'required'
            );
            $this->form_validation->set_rules(
                'masa_awal',
                'Masa_awal Name',
                'required'
            );
            $this->form_validation->set_rules(
                'masa_akhir',
                'Masa_akhir Name',
                'required'
            );
            $this->form_validation->set_rules(
                'lama_kontrak_bulan',
                'Lama_kontrak_bulan Name',
                'required'
            );
            $this->form_validation->set_rules(
                'luasan_m2',
                'Luasan_m2 Name',
                'numeric'
            );
            $this->form_validation->set_rules(
                'nama_file',
                'Nama_file',
                'trim|xss_clean'
            );

            $this->main_contract_recurring->uploadData(
                $photo_data,
                'nama_file',
                'photo_path',
                '',
                'gif|jpg|png|jpeg|pdf'
            );

            if (
                isset($photo_data['photo_err']) and
                !empty($photo_data['photo_err'])
            ) {
                $data['errors'] = $photo_data['photo_err'];

                $this->form_validation->set_rules(
                    'nama_file',
                    'Nama_file',
                    'required'
                );
            }
            $this->form_validation->set_rules(
                'ket_kontrak_induk',
                'Ket_kontrak_induk Name',
                'trim'
            );

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data[
                    'main_contract_recurring'
                ] = $this->main_contract_recurring->getRow(
                    'main_contract_recurring',
                    $id
                );

                $data[
                    'kategori_kontrak'
                ] = $this->main_contract_recurring->getListTable(
                    'kategori_kontrak'
                );
                $data['pengguna'] = $this->ion_auth->user()->row();
                $this->load->view('admin/main_contract_recurring/edit', $data);
            } else {
                $saveData['nomor_kontrak'] = set_value('nomor_kontrak');
                $saveData['secondary_nomor_kontrak'] = set_value(
                    'secondary_nomor_kontrak'
                );
                $saveData['kategori_kontrak'] = set_value('kategori_kontrak');
                $saveData['nama_kontrak'] = set_value('nama_kontrak');
                $saveData['customer_mitra'] = set_value('customer_mitra');
                $saveData['wilayah_mitra'] = set_value('wilayah_mitra');
                $saveData['objek_kontrak'] = set_value('objek_kontrak');
                $saveData['tanggal_kontrak'] = set_value('tanggal_kontrak');
                $saveData['masa_awal'] = set_value('masa_awal');
                $saveData['masa_akhir'] = set_value('masa_akhir');
                $saveData['lama_kontrak_bulan'] = set_value(
                    'lama_kontrak_bulan'
                );
                $saveData['luasan_m2'] = set_value('luasan_m2');
                if (
                    isset($photo_data['nama_file']) &&
                    !empty($photo_data['nama_file'])
                ) {
                    $saveData['nama_file'] = $photo_data['nama_file'];
                }
                $saveData['ket_kontrak_induk'] = set_value('ket_kontrak_induk');

                $this->main_contract_recurring->updateData(
                    'main_contract_recurring',
                    $saveData,
                    $id
                );

                $this->session->set_flashdata(
                    'message',
                    'Main_contract_recurring Updated Successfully!'
                );

                redirect('admin/main_contract_recurring');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/main_contract_recurring');
        }
    }

    function delete($id = '')
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        if (isset($id) and !empty($id)) {
            $count = $this->main_contract_recurring->getCount(
                'main_contract_recurring',
                'main_contract_recurring.id_kontrak',
                $id
            );

            if (isset($count) and !empty($count)) {
                $this->main_contract_recurring->delete(
                    'main_contract_recurring',
                    'id_kontrak',
                    $id
                );

                $this->session->set_flashdata(
                    'message',
                    ' Main_contract_recurring Deleted Successfully !'
                );

                echo 'success';

                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }

    function deleteAll($id = '')
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        $all_ids = $_POST['allIds'];

        if (isset($all_ids) and !empty($all_ids)) {
            //$count=$this->main_contract_recurring->getCount('main_contract_recurring','main_contract_recurring.id',$id);

            for ($a = 0; $a < count($all_ids); $a++) {
                if ($all_ids[$a] != '') {
                    $this->main_contract_recurring->delete(
                        'main_contract_recurring',
                        'id_kontrak',
                        $all_ids[$a]
                    );

                    $this->session->set_flashdata(
                        'message',
                        ' Main_contract_recurring(s) Deleted Successfully !'
                    );
                }
            }

            echo 'success';

            exit();
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }

    function export($filetype = 'csv')
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        $searchBy = '';

        $searchValue = '';

        $v_fields = [
            'nomor_kontrak',
            'secondary_nomor_kontrak',
            'kategori_kontrak',
            'nama_kontrak',
            'customer_mitra',
            'wilayah_mitra',
            'objek_kontrak',
            'tanggal_kontrak',
            'masa_awal',
            'masa_akhir',
            'lama_kontrak_bulan',
            'luasan_m2',
            'nama_file',
            'ket_kontrak_induk',
        ];

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

        $pagi = ['order' => $order, 'order_by' => $order_by];

        $result = $this->main_contract_recurring->getList(
            'main_contract_recurring'
        );

        if ($filetype == 'csv') {
            header('Content-Type: application/csv');

            header(
                'Content-Disposition: attachment; filename=main_contract_recurring.csv'
            );

            header('Pragma: no-cache');

            $csv = 'Sr. No,' . implode(',', $v_fields) . "\n";

            foreach ($result as $key => $value) {
                $line = $key + 1 . ',';

                foreach ($v_fields as $field) {
                    $line .= '"' . addslashes($value->$field) . '"' . ',';
                }

                $csv .= ltrim($line, ',') . "\n";
            }

            echo $csv;
            exit();
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

			<h1 align="center">Main_contract_recurring</h1>

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

            $pdf->Output('main_contract_recurring.pdf', 'D');

            exit();
        } else {
            echo 'Invalid option';
            exit();
        }
    }

    function status($field, $id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        if (in_array($field, [])) {
            if (isset($id) && !empty($id)) {
                if (
                    !is_null(
                        $main_contract_recurring = $this->main_contract_recurring->getRow(
                            'main_contract_recurring',
                            $id
                        )
                    )
                ) {
                    $status = $main_contract_recurring->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->main_contract_recurring->updateData(
                        'main_contract_recurring',
                        $statusData,
                        $id
                    );

                    $this->session->set_flashdata(
                        'message',
                        ucfirst($field) . ' Updated Successfully'
                    );

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/main_contract_recurring');
                    }
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Invalid Record Id!'
                    );

                    redirect('admin/main_contract_recurring');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/main_contract_recurring');
            }
        }
    }
}
