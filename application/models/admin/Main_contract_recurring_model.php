<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Main_contract_recurring_model extends CI_Model
{
    public $v_fields = [
        'nomor_kontrak',
        'secondary_nomor_kontrak',
        'kategori_kontrak.ket_kategori_kontrak',
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
            "$table.*  , kategori_kontrak.ket_kategori_kontrak as kategori_kontrak "
        );

        $this->db->from($table);

        $this->db->join(
            'kategori_kontrak',
            'main_contract_recurring.kategori_kontrak = kategori_kontrak.ket_kategori_kontrak',
            'left'
        );

        $this->db->order_by('id_kontrak', 'desc');

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

        $query = $this->db->get_where($table, ['id_kontrak' => $id]);

        $data = $query->result();

        return $data[0];
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
            'kategori_kontrak',
            'main_contract_recurring.kategori_kontrak = kategori_kontrak.ket_kategori_kontrak',
            'left'
        );

        $query = $this->db->get();

        return $query->num_rows();
    }

    function insert(
        $table,
        $data,
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
    ) {
        $this->db->trans_start();
        //var_dump($table);
        $this->db->insert($table, $data);
        $last_id = $this->db->insert_id();

        //$tangkap = $nilai_pengelolaan['0'];

        //$nilai_pengelolaan[1];
        //$nilai_pengelolaan[2];

        //  $query_id_terakhir = $this->db->select_max('id')
        //               ->from('nilai_pengelolaan')
        //               ->get();

        //$query_id_terakhir = $this->db->query('SELECT MAX (id) FROM nilai_pengelolaan')->row();

        $query = $this->db->query('SELECT id FROM nilai_pengelolaan');

        $row = $query->last_row();
        // $query_id_terakhir = $query_id_terakhir->row();

        //$row = $query_id_terakhir->last_row();
        //$id = $row+1;

        //var_dump($row->id + 1);

        $table_two = 'nilai_pengelolaan';

        $nilai_pengelolaans = [
            //'id_kontrak' => $last_id_kontrak,
            'id' => $row->id + 1,
            'id_kontrak' => $last_id,
            'portofolio' => $portofolio,
            'nilai_bulan' => $nilai_bulan,
            'fm' => $fm,

            'nomor_kontrak' => $nomor_kontrak,
            'kategori_kontrak' => $kategori_kontrak,
            'nama_kontrak' => $nama_kontrak,
            'customer_mitra' => $customer_mitra,
            'wilayah_mitra' => $wilayah_mitra,
            'tanggal_kontrak' => $tanggal_kontrak,
            'masa_awal' => $masa_awal,
            'masa_akhir' => $masa_akhir,
        ];
        //var_dump($table_two);
        $this->db->insert($table_two, $nilai_pengelolaans);
        //var_dump($nilai_pengelolaans);

        $nilai_pengelolaans_kedua = [
            // 'id' => $row->id + 1,
            'id_kontrak' => $last_id,
            'portofolio' => $portofolio_kedua,
            'nilai_bulan' => $nilai_bulan_sc,
            'fm' => $fm,

            'nomor_kontrak' => $nomor_kontrak,
            'kategori_kontrak' => $kategori_kontrak,
            'nama_kontrak' => $nama_kontrak,
            'customer_mitra' => $customer_mitra,
            'wilayah_mitra' => $wilayah_mitra,
            'tanggal_kontrak' => $tanggal_kontrak,
            'masa_awal' => $masa_awal,
            'masa_akhir' => $masa_akhir,
        ];
        $this->db->insert($table_two, $nilai_pengelolaans_kedua);
        //var_dump($nilai_pengelolaans_kedua);

        // var_dump ($last_id); //berhasil
        // var_dump ($portofolio);
        // var_dump ($nilai_bulan);
        // var_dump ($fm);

        //  return $this->db->insert_id();

        $this->db->trans_complete();
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
        $this->db->where('id_kontrak', $id);

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
