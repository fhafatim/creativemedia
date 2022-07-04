<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends AUTH_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_sidebar');
        $this->load->model('M_cuti');
    }

    public function loadkonten($page, $data)
    {

        $data['userdata']     = $this->userdata;
        $ajax = ($this->input->post('status_link') == "ajax" ? true : false);
        if (!$ajax) {
            $this->load->view('Dashboard/layouts/header', $data);
        }
        $this->load->view($page, $data);
        if (!$ajax) $this->load->view('Dashboard/layouts/footer', $data);
    }

    public function index()
    {
        $data['userdata']     = $this->userdata;
        $data['page']         = "Data Cuti";
        $data['judul']         = "Data Cuti";

        $this->loadkonten('cuti', $data);
    }
    public function ajax_list()
    {
        $list = $this->M_cuti->get_data();
        $no = $_POST['start'];
        // $datacuti = $list->num_rows();
        foreach ($list as $cuti) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $cuti->no_surat;
            $row[] = $cuti->nama;
            $row[] = $cuti->jabatan;
            $row[] = $cuti->divisi;
            $row[] = $cuti->tglcuti;
            $row[] = $cuti->selesai;
            $row[] = $cuti->jeniscuti;
            $row[] = $cuti->jmlh_cuti;
            $row[] = $cuti->sisacuti;
            $row[] = $cuti->keperluan;
            $row[] = '<a href="' . base_url() . '' . $cuti->lampiran . '" target="_blank"><img class="img-thumbnail" src="' . base_url() . '' . $cuti->lampiran . '"   width="90" /></a>';
            if ($cuti->status == "Approved") {
                $Status = '<small class="label pull-center bg-blue">' . $cuti->status . '</small">';
            } else {
                $Status = '<small class="label pull-center bg-red">' . $cuti->status . '</small">';
            }

            $row[] = $Status;
            $row[] =  anchor('edit-cuti/' . $cuti->no_surat, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ') .
                '  <button class="btn btn-sm btn-danger hapus-cuti" data-id=' . "'" . $cuti->no_surat . "'" . '><i class="glyphicon glyphicon-trash"></i></button> ' .
                anchor('edit-cuti/' . $cuti->no_surat, ' <span class="fa fa-book"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ');
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function hapus()
    {
        $token = $this->input->post('no_surat');
        $gambar = $this->db->get_where('cuti', array('no_surat' => $token));
        if ($gambar->num_rows() > 0) {
            $hasil = $gambar->row();
            $judul = $hasil->gambar;
            //hapus unlink foto
            if (file_exists($file = $judul)) {
                unlink($file);
            }
            $this->db->delete('cuti', array('no_surat' => $token));
        }
        echo "{}";
    }
    public function prosesTambah()
    {
        if (isset($_POST["no_surat"])) {

            $config['upload_path'] = "./upload/lampiran/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048'; //maksimum besar file 2M
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("gambar")) {
                $image_data = $this->upload->data();
                $path['link'] = "upload/lampiran/";

                $data = array(
                    //'id_login'			=> $this->db->insert_id(),
                    'no_surat'        => $this->input->post('no_surat'),
                    'nama'        => $this->input->post('nama'),
                    'jabatan'        => $this->input->post('jabatan'),
                    'divisi'        => $this->input->post('divisi'),
                    'tglcuti'     => $this->input->post('tglcuti'),
                    'selesai'     => $this->input->post('selesai'),
                    'jeniscuti'        => $this->input->post('jeniscuti'),
                    'jmlh_cuti'     => $this->input->post('jmlh_cuti'),
                    'sisacuti'        => $this->input->post('sisacuti'),
                    'keperluan'        => $this->input->post('keperluan'),
                    'lampiran'            => $path['link'] . '' . $image_data['file_name'],
                );
                $result = $this->db->insert('cuti', $data);
                if ($result > 0) {
                    $out['status'] = 'berhasil';
                } else {
                    $out['status'] = 'gagal';
                }
            } else {
                $out['error'] = $this->upload->display_errors();
                $data = array(
                    'no_surat'        => $this->input->post('no_surat'),
                    'nama'        => $this->input->post('nama'),
                    'jabatan'        => $this->input->post('jabatan'),
                    'divisi'        => $this->input->post('divisi'),
                    'tglcuti'     => $this->input->post('tglcuti'),
                    'selesai'     => $this->input->post('selesai'),
                    'jeniscuti'        => $this->input->post('jeniscuti'),
                    'jmlh_cuti'        => $this->input->post('jmlh_cuti'),
                    'sisacuti'        => $this->input->post('sisacuti'),
                    'keperluan'        => $this->input->post('keperluan'),
                    'lampiran'            => 'upload/lampiran/avatar.png',
                );
                $result = $this->db->insert('cuti', $data);
                if ($result > 0) {
                    $out['status'] = 'berhasil';
                } else {
                    $out['status'] = 'gagal';
                }
            }
        }

        echo json_encode($out);
    }
    public function Add()
    {
        $data['kode'] = $this->M_cuti->get_kode();
        // $data['data'] = $this->M_karyawan->get_data();
        $data['userdata'] = $this->userdata;
        $access = $this->M_sidebar->access('add', 'cuti');
        if ($access->menuview == 0) {
            $data['page']         = "Data Cuti";
            $data['judul']         = "Tambah Data Cuti";
            $this->loadkonten('Dashboard/layouts/no_akses', $data);
        }

        /*ini harus ada boss */ else {
            $data['page']         = "Data Cuti";
            $data['judul']         = "Tambah Data Cuti";
            $this->loadkonten('v_tambah/tambah', $data);
        }
    }

    public function Edit($id)
    {

        /*ini harus ada boss */
        $data['userdata'] = $this->userdata;
        $data['idpg'] = $this->session->userdata('id');
        $access = $this->M_sidebar->access('edit', 'cuti');
        if ($access->menuview == 0) {
            $data['page']         = "Data Cuti";
            $data['judul']         = "Data Cuti";
            $this->loadkonten('Dashboard/layouts/no_akses', $data);
        }
        /*ini harus ada boss */ else {

            $where = array('no_surat' => $id);
            $data['datacuti']  = $this->M_cuti->select_by_id($id);

            $data['page']         = "Data Cuti";
            $data['judul']         = "Data Cuti";
            $this->loadkonten('v_tambah/edit', $data, $where);
        }
    }

    public function prosesUpdate()
    {

        // $config['upload_path'] = "./upload/lampiran/";
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '2048'; //maksimum besar file 2M
        // $config['overwrite'] = TRUE;

        // $this->load->library('upload', $config);

        // if ($this->upload->do_upload("gambar")) {
        //     $image_data = $this->upload->data();
        //     $path['link'] = "upload/lampiran/";

        $where = array(
            'no_surat'            => $this->input->post('no_surat')
        );

        $data = array(
            // 'nama'            => $this->input->post('nama'),
            // 'jabatan'            => $this->input->post('jabatan'),
            // 'divisi'                    => $this->input->post('divisi'),
            'tglcuti'           => $this->input->post('tglcuti'),
            'selesai'           => $this->input->post('selesai'),
            'jeniscuti'           => $this->input->post('jeniscuti'),
            'sisacuti'                => $this->input->post('sisacuti'),
            'keperluan'                    => $this->input->post('keperluan'),
            // 'lampiran'            => $path['link'] . '' . $image_data['file_name'],
            'status'                => $this->input->post('status')
        );

        $result = $this->M_cuti->update($data, $where);

        if ($result > 0) {
            $out['status'] = 'berhasil';
        } else {
            $out['status'] = 'gagal';
        }
        // } else {

        //     $where = array(
        //         'no_surat'            => $this->input->post('no_surat')
        //     );

        //     $data = array(
        //         'nama'            => $this->input->post('nama'),
        //         'jabatan'            => $this->input->post('jabatan'),
        //         'divisi'                    => $this->input->post('divisi'),
        //         'tglcuti'           => $this->input->post('tglcuti'),
        //         'selesai'           => $this->input->post('selesai'),
        //         'jeniscuti'           => $this->input->post('jeniscuti'),
        //         'sisacuti'                => $this->input->post('sisacuti'),
        //         'keperluan'                    => $this->input->post('keperluan'),
        //         'lampiran'            => 'upload/lampiran/avatar.png',
        //         'status'                => $this->input->post('status')
        //     );

        //     $result = $this->M_cuti->update($data, $where);

        //     if ($result > 0) {
        //         $out['status'] = 'berhasil';
        //     } else {
        //         $out['status'] = 'gagal';
        //     }
        // }

        echo json_encode($out);
    }
}
