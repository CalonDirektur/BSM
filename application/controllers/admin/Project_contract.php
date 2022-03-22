<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project_contract extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/project_contract_model', 'project_contract');

        $this->load->model(
            'admin/project_persentase_now_model',
            'project_persentase_now'
        );
    }

    function index($id = 1)
    {
        $cond = '';

        $data['searchBy'] = '';

        $data['searchValue'] = '';

        $v_fields = $this->project_contract->v_fields;

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

        $data['csvlink'] = base_url() . 'admin/project_contract/export/csv';

        $data['pdflink'] = base_url() . 'admin/project_contract/export/pdf';

        $data['per_page'] =
            isset($_GET['per_page']) &&
            in_array($_GET['per_page'], $per_page_arr)
                ? $_GET['per_page']
                : '5';

        // PAGINATION

        $config = [];

        $config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

        $config['base_url'] = base_url() . 'admin/project_contract/index';

        $total_row = $this->project_contract->getCount(
            'project_contract',
            $searchBy,
            $searchValue
        );

        $config['first_url'] =
            base_url() .
            'admin/project_contract/index' .
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

        $data['results'] = $result = $this->project_contract->getList(
            'project_contract',
            $pagi
        );

        $str_links = $this->pagination->create_links();

        $data['links'] = $str_links;

        // ./ PAGINATION /.

        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['project_contract'] = $this->project_contract->getList(
                'project_contract'
            );
            $data['pengguna'] = $this->ion_auth->user()->row();

            $this->load->view('admin/project_contract/manage', $data);
        }
    }

    public function add()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        $data = null;

        $this->form_validation->set_rules('segmen', 'Segmen Name', 'required');
        $this->form_validation->set_rules(
            'uraian_pekerjaan',
            'Uraian_pekerjaan Name',
            'required'
        );
        $this->form_validation->set_rules('lokasi', 'Lokasi Name', 'required');
        $this->form_validation->set_rules(
            'customer',
            'Customer Name',
            'required'
        );
        $this->form_validation->set_rules('fm', 'Fm Name', 'required');
        $this->form_validation->set_rules(
            'owner_group',
            'Owner_group Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'detil_projek',
            'Detil_projek Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'kontrak_handle',
            'Kontrak_handle Name',
            'required'
        );
        $this->form_validation->set_rules(
            'nomor_kontrak',
            'Nomor_kontrak Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'nilai_kontrak',
            'Nilai_kontrak Name',
            'numeric'
        );
        $this->form_validation->set_rules(
            'jangka_waktu_hari',
            'Jangka_waktu_hari Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'tanggal_mulai_kontrak',
            'Tanggal_mulai_kontrak Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'tanggal_akhir_kontrak',
            'Tanggal_akhir_kontrak Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'tahun_projek',
            'Tahun_projek Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'progress_saat_ini',
            'Progress_saat_ini Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'dok_bapp',
            'Dok_bapp',
            'trim|xss_clean'
        );

        $this->project_contract->uploadData(
            $photo_data,
            'dok_bapp',
            'photo_path',
            '',
            'gif|jpg|png|jpeg|pdf'
        );

        if (
            isset($photo_data['photo_err']) and !empty($photo_data['photo_err'])
        ) {
            $data['errors'] = $photo_data['photo_err'];

            $this->form_validation->set_rules('dok_bapp', 'Dok_bapp', 'trim');
        }
        $this->form_validation->set_rules(
            'dok_baut',
            'Dok_baut',
            'trim|xss_clean'
        );

        $this->project_contract->uploadData(
            $photo_data,
            'dok_baut',
            'photo_path',
            '',
            'gif|jpg|png|jpeg'
        );

        if (
            isset($photo_data['photo_err']) and !empty($photo_data['photo_err'])
        ) {
            $data['errors'] = $photo_data['photo_err'];

            $this->form_validation->set_rules('dok_baut', 'Dok_baut', 'trim');
        }
        $this->form_validation->set_rules(
            'dok_bast',
            'Dok_bast',
            'trim|xss_clean'
        );

        $this->project_contract->uploadData(
            $photo_data,
            'dok_bast',
            'photo_path',
            '',
            'gif|jpg|png|jpeg'
        );

        if (
            isset($photo_data['photo_err']) and !empty($photo_data['photo_err'])
        ) {
            $data['errors'] = $photo_data['photo_err'];

            $this->form_validation->set_rules('dok_bast', 'Dok_bast', 'trim');
        }

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {
            $data['project_segmen'] = $this->project_contract->getListTable(
                'project_segmen'
            );
            $data['unit_fm_bm'] = $this->project_contract->getListTable(
                'unit_fm_bm'
            );
            $data[
                'project_kontrak_handle'
            ] = $this->project_contract->getListTable('project_kontrak_handle');
            $data[
                'project_progress_saat_ini'
            ] = $this->project_contract->getListTable(
                'project_progress_saat_ini'
            );

            $data['pengguna'] = $this->ion_auth->user()->row();

            $this->load->view('admin/project_contract/add', $data);
        } else {
            $saveData['segmen'] = set_value('segmen');
            $saveData['uraian_pekerjaan'] = set_value('uraian_pekerjaan');
            $saveData['lokasi'] = set_value('lokasi');
            $saveData['customer'] = set_value('customer');
            $saveData['fm'] = set_value('fm');
            $saveData['owner_group'] = set_value('owner_group');
            $saveData['detil_projek'] = set_value('detil_projek');
            $saveData['kontrak_handle'] = set_value('kontrak_handle');
            $saveData['nomor_kontrak'] = set_value('nomor_kontrak');
            $saveData['nilai_kontrak'] = set_value('nilai_kontrak');
            $saveData['jangka_waktu_hari'] = set_value('jangka_waktu_hari');
            $saveData['tanggal_mulai_kontrak'] = set_value(
                'tanggal_mulai_kontrak'
            );
            $saveData['tanggal_akhir_kontrak'] = set_value(
                'tanggal_akhir_kontrak'
            );
            $saveData['tahun_projek'] = set_value('tahun_projek');
            $saveData['progress_saat_ini'] = set_value('progress_saat_ini');
            if (
                isset($photo_data['dok_bapp']) &&
                !empty($photo_data['dok_bapp'])
            ) {
                $saveData['dok_bapp'] = $photo_data['dok_bapp'];
            }
            if (
                isset($photo_data['dok_baut']) &&
                !empty($photo_data['dok_baut'])
            ) {
                $saveData['dok_baut'] = $photo_data['dok_baut'];
            }
            if (
                isset($photo_data['dok_bast']) &&
                !empty($photo_data['dok_bast'])
            ) {
                $saveData['dok_bast'] = $photo_data['dok_bast'];
            }

            $insert_id = $this->project_contract->insert(
                'project_contract',
                $saveData
            );

            $this->session->set_flashdata(
                'message',
                'Project_contract Added Successfully!'
            );

            redirect('admin/project_contract');
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
                'segmen',
                'Segmen Name',
                'required'
            );
            $this->form_validation->set_rules(
                'uraian_pekerjaan',
                'Uraian_pekerjaan Name',
                'required'
            );
            $this->form_validation->set_rules(
                'lokasi',
                'Lokasi Name',
                'required'
            );
            $this->form_validation->set_rules(
                'customer',
                'Customer Name',
                'required'
            );
            $this->form_validation->set_rules('fm', 'Fm Name', 'required');
            $this->form_validation->set_rules(
                'owner_group',
                'Owner_group Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'detil_projek',
                'Detil_projek Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'kontrak_handle',
                'Kontrak_handle Name',
                'required'
            );
            $this->form_validation->set_rules(
                'nomor_kontrak',
                'Nomor_kontrak Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'nilai_kontrak',
                'Nilai_kontrak Name',
                'numeric'
            );
            $this->form_validation->set_rules(
                'jangka_waktu_hari',
                'Jangka_waktu_hari Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'tanggal_mulai_kontrak',
                'Tanggal_mulai_kontrak Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'tanggal_akhir_kontrak',
                'Tanggal_akhir_kontrak Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'tahun_projek',
                'Tahun_projek Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'progress_saat_ini',
                'Progress_saat_ini Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'dok_bapp',
                'Dok_bapp',
                'trim|xss_clean'
            );

            $this->project_contract->uploadData(
                $photo_data,
                'dok_bapp',
                'photo_path',
                '',
                'gif|jpg|png|jpeg'
            );

            if (
                isset($photo_data['photo_err']) and
                !empty($photo_data['photo_err'])
            ) {
                $data['errors'] = $photo_data['photo_err'];

                $this->form_validation->set_rules(
                    'dok_bapp',
                    'Dok_bapp',
                    'trim'
                );
            }
            $this->form_validation->set_rules(
                'dok_baut',
                'Dok_baut',
                'trim|xss_clean'
            );

            $this->project_contract->uploadData(
                $photo_data,
                'dok_baut',
                'photo_path',
                '',
                'gif|jpg|png|jpeg'
            );

            if (
                isset($photo_data['photo_err']) and
                !empty($photo_data['photo_err'])
            ) {
                $data['errors'] = $photo_data['photo_err'];

                $this->form_validation->set_rules(
                    'dok_baut',
                    'Dok_baut',
                    'trim'
                );
            }
            $this->form_validation->set_rules(
                'dok_bast',
                'Dok_bast',
                'trim|xss_clean'
            );

            $this->project_contract->uploadData(
                $photo_data,
                'dok_bast',
                'photo_path',
                '',
                'gif|jpg|png|jpeg'
            );

            if (
                isset($photo_data['photo_err']) and
                !empty($photo_data['photo_err'])
            ) {
                $data['errors'] = $photo_data['photo_err'];

                $this->form_validation->set_rules(
                    'dok_bast',
                    'Dok_bast',
                    'trim'
                );
            }

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data['project_segmen'] = $this->project_contract->getListTable(
                    'project_segmen'
                );
                $data['unit_fm_bm'] = $this->project_contract->getListTable(
                    'unit_fm_bm'
                );
                $data[
                    'project_kontrak_handle'
                ] = $this->project_contract->getListTable(
                    'project_kontrak_handle'
                );
                $data[
                    'project_progress_saat_ini'
                ] = $this->project_contract->getListTable(
                    'project_progress_saat_ini'
                );

                $data['project_contract'] = $this->project_contract->getRow(
                    'project_contract',
                    $id
                );

                // $data[
                //     'project_contract'
                // ] = $this->project_persentase_now->getListTable(
                //     'project_contract'
                // );

                $data[
                    'project_persentase_now'
                ] = $this->project_persentase_now->getRowfromContractProject(
                    'project_persentase_now',
                    $id
                );

                $data['pengguna'] = $this->ion_auth->user()->row();

                $data['last_data_row'] = $this->project_contract->last_data_row(
                    'project_persentase_now',
                    $id
                );

                //var_dump($data['last_data_row']);

                //select * from project_persentase_now where id_kontrak = 125 ORDER BY id DESC LIMIT 1

                $this->load->view('admin/project_contract/view', $data);
            } else {
                redirect('admin/project_contract/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/project_contract/view');
        }
    }

    function add_progress($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        $data = null;

        $this->form_validation->set_rules(
            'id_kontrak',
            'Id_kontrak Name',
            'required'
        );
        $this->form_validation->set_rules(
            'persentase_progress',
            'Persentase_progress Name',
            'required|numeric'
        );
        $this->form_validation->set_rules(
            'tanggal_update',
            'Tanggal_update Name',
            'required'
        );
        $this->form_validation->set_rules('remark', 'Remark Name', 'trim');

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {
            $data['project_segmen'] = $this->project_contract->getListTable(
                'project_segmen'
            );
            $data['unit_fm_bm'] = $this->project_contract->getListTable(
                'unit_fm_bm'
            );
            $data[
                'project_kontrak_handle'
            ] = $this->project_contract->getListTable('project_kontrak_handle');
            $data[
                'project_progress_saat_ini'
            ] = $this->project_contract->getListTable(
                'project_progress_saat_ini'
            );

            $data[
                'project_contract'
            ] = $this->project_persentase_now->getListTable('project_contract');

            // $data['pengguna'] = $this->ion_auth->user()->row();

            $data['project_contract'] = $this->project_contract->getRow(
                'project_contract',
                $id
            );

            $data['pengguna'] = $this->ion_auth->user()->row();

            //$this->load->view('admin/project_contract/add', $data);
            $this->load->view('admin/project_contract/add_progress', $data);
        } else {
            $saveData['id_kontrak'] = set_value('id_kontrak');
            $saveData['persentase_progress'] = set_value('persentase_progress');
            $saveData['tanggal_update'] = set_value('tanggal_update');

            $saveData['remark'] = set_value('remark');

            // $insert_id = $this->project_contract->insert(
            //     'project_persentase_now',
            //     $saveData
            // );

            // $this->session->set_flashdata(
            //     'message',
            //     'Project_contract Added Successfully!'
            // );
            $insert_id = $this->project_persentase_now->insert(
                'project_persentase_now',
                $saveData
            );

            $this->session->set_flashdata(
                'message',
                'Project_persentase_now Added Successfully!'
            );

            redirect('admin/project_contract');
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
                'segmen',
                'Segmen Name',
                'required'
            );
            $this->form_validation->set_rules(
                'uraian_pekerjaan',
                'Uraian_pekerjaan Name',
                'required'
            );
            $this->form_validation->set_rules(
                'lokasi',
                'Lokasi Name',
                'required'
            );
            $this->form_validation->set_rules(
                'customer',
                'Customer Name',
                'required'
            );
            $this->form_validation->set_rules('fm', 'Fm Name', 'required');
            $this->form_validation->set_rules(
                'owner_group',
                'Owner_group Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'detil_projek',
                'Detil_projek Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'kontrak_handle',
                'Kontrak_handle Name',
                'required'
            );
            $this->form_validation->set_rules(
                'nomor_kontrak',
                'Nomor_kontrak Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'nilai_kontrak',
                'Nilai_kontrak Name',
                'numeric'
            );
            $this->form_validation->set_rules(
                'jangka_waktu_hari',
                'Jangka_waktu_hari Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'tanggal_mulai_kontrak',
                'Tanggal_mulai_kontrak Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'tanggal_akhir_kontrak',
                'Tanggal_akhir_kontrak Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'tahun_projek',
                'Tahun_projek Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'progress_saat_ini',
                'Progress_saat_ini Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'dok_bapp',
                'Dok_bapp',
                'trim|xss_clean'
            );

            $this->project_contract->uploadData(
                $photo_data,
                'dok_bapp',
                'photo_path',
                '',
                'gif|jpg|png|jpeg'
            );

            if (
                isset($photo_data['photo_err']) and
                !empty($photo_data['photo_err'])
            ) {
                $data['errors'] = $photo_data['photo_err'];

                $this->form_validation->set_rules(
                    'dok_bapp',
                    'Dok_bapp',
                    'trim'
                );
            }
            $this->form_validation->set_rules(
                'dok_baut',
                'Dok_baut',
                'trim|xss_clean'
            );

            $this->project_contract->uploadData(
                $photo_data,
                'dok_baut',
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
                    'dok_baut',
                    'Dok_baut',
                    'trim'
                );
            }
            $this->form_validation->set_rules(
                'dok_bast',
                'Dok_bast',
                'trim|xss_clean'
            );

            $this->project_contract->uploadData(
                $photo_data,
                'dok_bast',
                'photo_path',
                '',
                'gif|jpg|png|jpeg'
            );

            if (
                isset($photo_data['photo_err']) and
                !empty($photo_data['photo_err'])
            ) {
                $data['errors'] = $photo_data['photo_err'];

                $this->form_validation->set_rules(
                    'dok_bast',
                    'Dok_bast',
                    'trim'
                );
            }

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data['project_contract'] = $this->project_contract->getRow(
                    'project_contract',
                    $id
                );

                $data['project_segmen'] = $this->project_contract->getListTable(
                    'project_segmen'
                );
                $data['unit_fm_bm'] = $this->project_contract->getListTable(
                    'unit_fm_bm'
                );
                $data[
                    'project_kontrak_handle'
                ] = $this->project_contract->getListTable(
                    'project_kontrak_handle'
                );
                $data[
                    'project_progress_saat_ini'
                ] = $this->project_contract->getListTable(
                    'project_progress_saat_ini'
                );
                $data['pengguna'] = $this->ion_auth->user()->row();
                $this->load->view('admin/project_contract/edit', $data);
            } else {
                $saveData['segmen'] = set_value('segmen');
                $saveData['uraian_pekerjaan'] = set_value('uraian_pekerjaan');
                $saveData['lokasi'] = set_value('lokasi');
                $saveData['customer'] = set_value('customer');
                $saveData['fm'] = set_value('fm');
                $saveData['owner_group'] = set_value('owner_group');
                $saveData['detil_projek'] = set_value('detil_projek');
                $saveData['kontrak_handle'] = set_value('kontrak_handle');
                $saveData['nomor_kontrak'] = set_value('nomor_kontrak');
                $saveData['nilai_kontrak'] = set_value('nilai_kontrak');
                $saveData['jangka_waktu_hari'] = set_value('jangka_waktu_hari');
                $saveData['tanggal_mulai_kontrak'] = set_value(
                    'tanggal_mulai_kontrak'
                );
                $saveData['tanggal_akhir_kontrak'] = set_value(
                    'tanggal_akhir_kontrak'
                );
                $saveData['tahun_projek'] = set_value('tahun_projek');
                $saveData['progress_saat_ini'] = set_value('progress_saat_ini');
                if (
                    isset($photo_data['dok_bapp']) &&
                    !empty($photo_data['dok_bapp'])
                ) {
                    $saveData['dok_bapp'] = $photo_data['dok_bapp'];
                }
                if (
                    isset($photo_data['dok_baut']) &&
                    !empty($photo_data['dok_baut'])
                ) {
                    $saveData['dok_baut'] = $photo_data['dok_baut'];
                }
                if (
                    isset($photo_data['dok_bast']) &&
                    !empty($photo_data['dok_bast'])
                ) {
                    $saveData['dok_bast'] = $photo_data['dok_bast'];
                }

                $this->project_contract->updateData(
                    'project_contract',
                    $saveData,
                    $id
                );

                $this->session->set_flashdata(
                    'message',
                    'Project_contract Updated Successfully!'
                );

                redirect('admin/project_contract');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/project_contract');
        }
    }

    function delete($id = '')
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        if (isset($id) and !empty($id)) {
            $count = $this->project_contract->getCount(
                'project_contract',
                'project_contract.id',
                $id
            );

            if (isset($count) and !empty($count)) {
                $this->project_contract->delete('project_contract', 'id', $id);

                $this->session->set_flashdata(
                    'message',
                    ' Project_contract Deleted Successfully !'
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
            //$count=$this->project_contract->getCount('project_contract','project_contract.id',$id);

            for ($a = 0; $a < count($all_ids); $a++) {
                if ($all_ids[$a] != '') {
                    $this->project_contract->delete(
                        'project_contract',
                        'id',
                        $all_ids[$a]
                    );

                    $this->session->set_flashdata(
                        'message',
                        ' Project_contract(s) Deleted Successfully !'
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
            'segmen',
            'uraian_pekerjaan',
            'lokasi',
            'customer',
            'fm',
            'owner_group',
            'detil_projek',
            'kontrak_handle',
            'nomor_kontrak',
            'nilai_kontrak',
            'jangka_waktu_hari',
            'tanggal_mulai_kontrak',
            'tanggal_akhir_kontrak',
            'tahun_projek',
            'progress_saat_ini',
            'dok_bapp',
            'dok_baut',
            'dok_bast',
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

        $result = $this->project_contract->getList('project_contract');

        if ($filetype == 'csv') {
            header('Content-Type: application/csv');

            header(
                'Content-Disposition: attachment; filename=project_contract.csv'
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

			<h1 align="center">Project_contract</h1>

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

            $pdf->Output('project_contract.pdf', 'D');

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
                        $project_contract = $this->project_contract->getRow(
                            'project_contract',
                            $id
                        )
                    )
                ) {
                    $status = $project_contract->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->project_contract->updateData(
                        'project_contract',
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
                        redirect('admin/project_contract');
                    }
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Invalid Record Id!'
                    );

                    redirect('admin/project_contract');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/project_contract');
            }
        }
    }
}
