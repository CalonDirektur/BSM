<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Director_insight_category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model(
            'admin/director_insight_category_model',
            'director_insight_category'
        );
    }

    function index($id = 1)
    {
        $cond = '';

        $data['searchBy'] = '';

        $data['searchValue'] = '';

        $v_fields = $this->director_insight_category->v_fields;

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
            base_url() . 'admin/director_insight_category/export/csv';

        $data['pdflink'] =
            base_url() . 'admin/director_insight_category/export/pdf';

        $data['per_page'] =
            isset($_GET['per_page']) &&
            in_array($_GET['per_page'], $per_page_arr)
                ? $_GET['per_page']
                : '5';

        // PAGINATION

        $config = [];

        $config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

        $config['base_url'] =
            base_url() . 'admin/director_insight_category/index';

        $total_row = $this->director_insight_category->getCount(
            'director_insight_category',
            $searchBy,
            $searchValue
        );

        $config['first_url'] =
            base_url() .
            'admin/director_insight_category/index' .
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

        $data['results'] = $result = $this->director_insight_category->getList(
            'director_insight_category',
            $pagi
        );

        $str_links = $this->pagination->create_links();

        $data['links'] = $str_links;

        // ./ PAGINATION /.

        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $data[
                'director_insight_category'
            ] = $this->director_insight_category->getList(
                'director_insight_category'
            );
            $data['pengguna'] = $this->ion_auth->user()->row();

            $this->load->view('admin/director_insight_category/manage', $data);
        }
    }

    public function add()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        $data = null;

        $this->form_validation->set_rules(
            'kategori_name',
            'Kategori_name Name',
            'required'
        );

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {
            $data['pengguna'] = $this->ion_auth->user()->row();
            $this->load->view('admin/director_insight_category/add', $data);
        } else {
            $saveData['kategori_name'] = set_value('kategori_name');

            $insert_id = $this->director_insight_category->insert(
                'director_insight_category',
                $saveData
            );

            $this->session->set_flashdata(
                'message',
                'Director_insight_category Added Successfully!'
            );

            redirect('admin/director_insight_category');
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
                'kategori_name',
                'Kategori_name Name',
                'required'
            );

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data[
                    'director_insight_category'
                ] = $this->director_insight_category->getRow(
                    'director_insight_category',
                    $id
                );
                $data['pengguna'] = $this->ion_auth->user()->row();

                $this->load->view(
                    'admin/director_insight_category/view',
                    $data
                );
            } else {
                redirect('admin/director_insight_category/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/director_insight_category/view');
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
                'kategori_name',
                'Kategori_name Name',
                'required'
            );

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $data[
                    'director_insight_category'
                ] = $this->director_insight_category->getRow(
                    'director_insight_category',
                    $id
                );
                $data['pengguna'] = $this->ion_auth->user()->row();

                $this->load->view(
                    'admin/director_insight_category/edit',
                    $data
                );
            } else {
                $saveData['kategori_name'] = set_value('kategori_name');

                $this->director_insight_category->updateData(
                    'director_insight_category',
                    $saveData,
                    $id
                );

                $this->session->set_flashdata(
                    'message',
                    'Director_insight_category Updated Successfully!'
                );

                redirect('admin/director_insight_category');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/director_insight_category');
        }
    }

    function delete($id = '')
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        }

        if (isset($id) and !empty($id)) {
            $count = $this->director_insight_category->getCount(
                'director_insight_category',
                'director_insight_category.id',
                $id
            );

            if (isset($count) and !empty($count)) {
                $this->director_insight_category->delete(
                    'director_insight_category',
                    'id',
                    $id
                );

                $this->session->set_flashdata(
                    'message',
                    ' Director_insight_category Deleted Successfully !'
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
            //$count=$this->director_insight_category->getCount('director_insight_category','director_insight_category.id',$id);

            for ($a = 0; $a < count($all_ids); $a++) {
                if ($all_ids[$a] != '') {
                    $this->director_insight_category->delete(
                        'director_insight_category',
                        'id',
                        $all_ids[$a]
                    );

                    $this->session->set_flashdata(
                        'message',
                        ' Director_insight_category(s) Deleted Successfully !'
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

        $v_fields = ['kategori_name'];

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

        $result = $this->director_insight_category->getList(
            'director_insight_category'
        );

        if ($filetype == 'csv') {
            header('Content-Type: application/csv');

            header(
                'Content-Disposition: attachment; filename=director_insight_category.csv'
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

			<h1 align="center">Director_insight_category</h1>

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

            $pdf->Output('director_insight_category.pdf', 'D');

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
                        $director_insight_category = $this->director_insight_category->getRow(
                            'director_insight_category',
                            $id
                        )
                    )
                ) {
                    $status = $director_insight_category->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->director_insight_category->updateData(
                        'director_insight_category',
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
                        redirect('admin/director_insight_category');
                    }
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Invalid Record Id!'
                    );

                    redirect('admin/director_insight_category');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/director_insight_category');
            }
        }
    }
}
