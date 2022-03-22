<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Document_tender extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');
        $this->load->helper('download');

        $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/document_tender_model', 'document_tender');
    }

    public function download($id)
    {
    }

    function index($id = 1)
    {
        $cond = '';

        $data['searchBy'] = '';

        $data['searchValue'] = '';

        $v_fields = $this->document_tender->v_fields;

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

        $data['csvlink'] = base_url() . 'admin/document_tender/export/csv';

        $data['pdflink'] = base_url() . 'admin/document_tender/export/pdf';

        $data['per_page'] =
            isset($_GET['per_page']) &&
            in_array($_GET['per_page'], $per_page_arr)
                ? $_GET['per_page']
                : '5';

        // PAGINATION

        $config = [];

        $config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

        $config['base_url'] = base_url() . 'admin/document_tender/index';

        $total_row = $this->document_tender->getCount(
            'document_tender',
            $searchBy,
            $searchValue
        );

        $config['first_url'] =
            base_url() .
            'admin/document_tender/index' .
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

        $data['results'] = $result = $this->document_tender->getList(
            'document_tender',
            $pagi
        );

        $str_links = $this->pagination->create_links();

        $data['links'] = $str_links;

        // ./ PAGINATION /.

        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['document_tender'] = $this->document_tender->getList(
                'document_tender'
            );
            $data['pengguna'] = $this->ion_auth->user()->row();

            $this->load->view('admin/document_tender/manage', $data);
        }
    }

    public function add()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        $data = null;

        $this->form_validation->set_rules(
            'nama_document',
            'Nama_document Name',
            'required'
        );
        $this->form_validation->set_rules(
            'link_document',
            'Link_document',
            'trim|xss_clean'
        );

        $this->document_tender->uploadData(
            $photo_data,
            'link_document',
            'photo_path',
            '',
            'gif|jpg|png|jpeg|pdf'
        );

        if (
            isset($photo_data['photo_err']) and !empty($photo_data['photo_err'])
        ) {
            $data['errors'] = $photo_data['photo_err'];

            $this->form_validation->set_rules(
                'link_document',
                'Link_document',
                'required'
            );
        }
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan Name',
            'trim'
        );
        $this->form_validation->set_rules(
            'tanggal_update',
            'Tanggal_update Name',
            'trim'
        );

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {
            $data['pengguna'] = $this->ion_auth->user()->row();
            $this->load->view('admin/document_tender/add', $data);
        } else {
            $saveData['nama_document'] = set_value('nama_document');
            if (
                isset($photo_data['link_document']) &&
                !empty($photo_data['link_document'])
            ) {
                $saveData['link_document'] = $photo_data['link_document'];
            }
            $saveData['keterangan'] = set_value('keterangan');

            //$saveData['tanggal_update'] = set_value('tanggal_update');

            $now = new DateTime();
            $now->setTimezone(new DateTimezone('Asia/Makassar'));
            $now->format('Y-m-d');

            //$saveData['date_time'] = date('Y-m-d H:i:s');
            $saveData['tanggal_update'] = $now->format('Y-m-d');

            $insert_id = $this->document_tender->insert(
                'document_tender',
                $saveData
            );

            $this->session->set_flashdata(
                'message',
                'Document_tender Added Successfully!'
            );

            redirect('admin/document_tender');
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
                'nama_document',
                'Nama_document Name',
                'required'
            );
            $this->form_validation->set_rules(
                'link_document',
                'Link_document',
                'trim|xss_clean'
            );

            $this->document_tender->uploadData(
                $photo_data,
                'link_document',
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
                    'link_document',
                    'Link_document',
                    'required'
                );
            }
            $this->form_validation->set_rules(
                'keterangan',
                'Keterangan Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'tanggal_update',
                'Tanggal_update Name',
                'trim'
            );

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data['document_tender'] = $this->document_tender->getRow(
                    'document_tender',
                    $id
                );
                $data['pengguna'] = $this->ion_auth->user()->row();

                $this->load->view('admin/document_tender/view', $data);
            } else {
                redirect('admin/document_tender/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/document_tender/view');
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
                'nama_document',
                'Nama_document Name',
                'required'
            );
            $this->form_validation->set_rules(
                'link_document',
                'Link_document',
                'trim|xss_clean'
            );

            $this->document_tender->uploadData(
                $photo_data,
                'link_document',
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
                    'link_document',
                    'Link_document',
                    'required'
                );
            }
            $this->form_validation->set_rules(
                'keterangan',
                'Keterangan Name',
                'trim'
            );
            $this->form_validation->set_rules(
                'tanggal_update',
                'Tanggal_update Name',
                'trim'
            );

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data['document_tender'] = $this->document_tender->getRow(
                    'document_tender',
                    $id
                );
                $data['pengguna'] = $this->ion_auth->user()->row();

                $this->load->view('admin/document_tender/edit', $data);
            } else {
                $saveData['nama_document'] = set_value('nama_document');
                if (
                    isset($photo_data['link_document']) &&
                    !empty($photo_data['link_document'])
                ) {
                    $saveData['link_document'] = $photo_data['link_document'];
                }
                $saveData['keterangan'] = set_value('keterangan');
                $saveData['tanggal_update'] = set_value('tanggal_update');

                $this->document_tender->updateData(
                    'document_tender',
                    $saveData,
                    $id
                );

                $this->session->set_flashdata(
                    'message',
                    'Document_tender Updated Successfully!'
                );

                redirect('admin/document_tender');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/document_tender');
        }
    }

    function delete($id = '')
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        if (isset($id) and !empty($id)) {
            $count = $this->document_tender->getCount(
                'document_tender',
                'document_tender.id',
                $id
            );

            if (isset($count) and !empty($count)) {
                $this->document_tender->delete('document_tender', 'id', $id);

                $this->session->set_flashdata(
                    'message',
                    ' Document_tender Deleted Successfully !'
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
            //$count=$this->document_tender->getCount('document_tender','document_tender.id',$id);

            for ($a = 0; $a < count($all_ids); $a++) {
                if ($all_ids[$a] != '') {
                    $this->document_tender->delete(
                        'document_tender',
                        'id',
                        $all_ids[$a]
                    );

                    $this->session->set_flashdata(
                        'message',
                        ' Document_tender(s) Deleted Successfully !'
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
            'nama_document',
            'link_document',
            'keterangan',
            'tanggal_update',
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

        $result = $this->document_tender->getList('document_tender');

        if ($filetype == 'csv') {
            header('Content-Type: application/csv');

            header(
                'Content-Disposition: attachment; filename=document_tender.csv'
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

			<h1 align="center">Document_tender</h1>

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

            $pdf->Output('document_tender.pdf', 'D');

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
                        $document_tender = $this->document_tender->getRow(
                            'document_tender',
                            $id
                        )
                    )
                ) {
                    $status = $document_tender->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->document_tender->updateData(
                        'document_tender',
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
                        redirect('admin/document_tender');
                    }
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Invalid Record Id!'
                    );

                    redirect('admin/document_tender');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/document_tender');
            }
        }
    }
}
