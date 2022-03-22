<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project_contract_model extends CI_Model
{
    public $v_fields = [
        'project_segmen.segment_customer',
        'uraian_pekerjaan',
        'lokasi',
        'customer',
        'unit_fm_bm.nama_unit',
        'owner_group',
        'detil_projek',
        'project_kontrak_handle.handling',
        'nomor_kontrak',
        'nilai_kontrak',
        'jangka_waktu_hari',
        'tanggal_mulai_kontrak',
        'tanggal_akhir_kontrak',
        'tahun_projek',
        'project_progress_saat_ini.progress_opsi',
        'dok_bapp',
        'dok_baut',
        'dok_bast',
    ];

    function __construct()
    {
        parent::__construct();
    }

    function getList($table, $pagination = [])
    {
        //  PAGINATION START

        if (
            isset($pagination['cur_page']) and !empty($pagination['per_page'])
        ) {
            $this->db->limit($pagination['per_page'], $pagination['cur_page']);
        }

        //  PAGINATION END

        // sort

        $order_by =
            isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)
                ? $_GET['sortBy']
                : '';

        $order =
            isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

        if ($order_by != '') {
            $this->db->order_by($order_by, $order);
        }

        // end sort

        // SEARCH START

        if (
            !empty($_GET['searchValue']) &&
            $_GET['searchValue'] != '' &&
            !empty($_GET['searchBy']) &&
            $_GET['searchBy'] != '' &&
            in_array($_GET['searchBy'], $this->v_fields)
        ) {
            $this->db->like($_GET['searchBy'], $_GET['searchValue']);
        }

        // SEARCH END

        $this->db->select(
            "$table.*  , project_segmen.segment_customer as segmen  , unit_fm_bm.nama_unit as fm  , project_kontrak_handle.handling as kontrak_handle  , project_progress_saat_ini.progress_opsi as progress_saat_ini "
        );

        $this->db->from($table);

        $this->db->join(
            'project_segmen',
            'project_contract.segmen = project_segmen.segment_customer',
            'left'
        );
        $this->db->join(
            'unit_fm_bm',
            'project_contract.fm = unit_fm_bm.nama_unit',
            'left'
        );
        $this->db->join(
            'project_kontrak_handle',
            'project_contract.kontrak_handle = project_kontrak_handle.handling',
            'left'
        );
        $this->db->join(
            'project_progress_saat_ini',
            'project_contract.progress_saat_ini = project_progress_saat_ini.progress_opsi',
            'left'
        );

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getListTable($table)
    {
        $this->db->select('*');

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getRow($table, $id)
    {
        $this->db->select('*');

        $query = $this->db->get_where($table, ['id' => $id]);

        $data = $query->result();

        return $data[0];
    }

    // function last_data_row($table, $id)
    // {
    //     $this->db->select('*');
    //     $query = $this->db->get_where($table, ['id_kontrak' => $id]);

    //     select * from project_persentase_now where id_kontrak = 125 ORDER BY id DESC LIMIT 1
    // }

    function last_data_row($table, $id)
    {
        //select * from project_persentase_now where id_kontrak = 125 ORDER BY id DESC LIMIT 1
        //$this->db->select('persentase_progress');

        // $query = $this->db->query(
        //     "SELECT * FROM '$table' where id_kontrak = '$id' order by id Desc limit 1"
        // );

        // return $query->result;

        $query = $this->db->query(
            'SELECT * FROM ' .
                $table .
                ' where id_kontrak = ' .
                $id .
                ' order by id Desc limit 1'
        );
        return $query = $query->result();
    }

    function getSelectedData($table, $field, $idArr)
    {
        $this->db->select('*');

        $this->db->from($table);

        $this->db->where_in('id', $idArr);

        $query = $this->db->get();

        $data = $query->result();

        foreach ($data as $key => $value) {
            $arr[] = $value->$field;
        }

        return $arr;
    }

    function getCount($table, $key = '', $value = '')
    {
        $this->db->select("$table.*");

        if (isset($key) && isset($value) && !empty($key) && !empty($value)) {
            $this->db->where($key, $value);
        }

        $this->db->from($table);

        $this->db->join(
            'project_segmen',
            'project_contract.segmen = project_segmen.segment_customer',
            'left'
        );
        $this->db->join(
            'unit_fm_bm',
            'project_contract.fm = unit_fm_bm.nama_unit',
            'left'
        );
        $this->db->join(
            'project_kontrak_handle',
            'project_contract.kontrak_handle = project_kontrak_handle.handling',
            'left'
        );
        $this->db->join(
            'project_progress_saat_ini',
            'project_contract.progress_saat_ini = project_progress_saat_ini.progress_opsi',
            'left'
        );

        $query = $this->db->get();

        return $query->num_rows();
    }

    function insert($table, $data)
    {
        $this->db->insert($table, $data);

        return $this->db->insert_id();
    }

    function multiSelectInsert(
        $r_table,
        $field1,
        $value1,
        $field2,
        $value2 = []
    ) {
        $this->db->query("delete from $r_table where $field1='$value1'");

        if (
            $r_table != '' &&
            $field1 != '' &&
            $value1 != '' &&
            $field2 != '' &&
            count($value2) > 0
        ) {
            for ($i = 0; $i < count($value2); $i++) {
                $data[] = [
                    $field1 => $value1,

                    $field2 => $value2[$i],
                ];
            }

            $this->db->insert_batch($r_table, $data);
        }
    }

    function getSelectedIds($table, $id, $select_field, $where_field)
    {
        $arr = [];

        $this->db->select("$select_field");

        $this->db->from($table);

        $this->db->where("$where_field", $id);

        $query = $this->db->get();

        $data = $query->result();

        foreach ($data as $key => $value) {
            $arr[] = $value->$select_field;
        }

        return $arr;
    }

    function updateData($table, $data, $id)
    {
        $this->db->where('id', $id);

        $this->db->update($table, $data);
    }

    function delete($table, $key = '', $value = '')
    {
        if (isset($key) && isset($value) && !empty($key) && !empty($value)) {
            $this->db->where($key, $value);
        }

        $this->db->delete($table);
    }

    public function uploadData(
        &$data,
        $file_name,
        $file_path,
        $postfix = '',
        $allowedTypes
    ) {
        $config = null;

        $config['upload_path'] = $this->config->item($file_path);

        $config['allowed_types'] = $allowedTypes;

        if (
            isset($_FILES[$file_name]['name']) &&
            !empty($_FILES[$file_name]['name'])
        ) {
            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            $exts = explode('.', $_FILES[$file_name]['name']);

            $_FILES[$file_name]['name'] =
                $exts[0] . $postfix . '.' . end($exts);

            if (!$this->upload->do_upload($file_name)) {
                $data[$file_name . '_err'] = [
                    'error' => $this->upload->display_errors(),
                ];
            } else {
                $uploadImg = $this->upload->data();

                if ($uploadImg['file_name'] != '') {
                    if (
                        isset($_POST['old_' . $file_name]) &&
                        !empty($_POST['old_' . $file_name])
                    ) {
                        @unlink(
                            $this->config->item($file_path) .
                                $_POST['old_' . $file_name]
                        );
                    }

                    $data[$file_name] = $uploadImg['file_name'];
                }
            }
        } elseif (
            isset($_POST['old_' . $file_name]) &&
            !empty($_POST['old_' . $file_name])
        ) {
            $data[$file_name] = $_POST['old_' . $file_name];
        }
    }
}
