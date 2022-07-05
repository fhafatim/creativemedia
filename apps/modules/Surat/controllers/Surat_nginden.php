<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Surat_nginden extends AUTH_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_surat_nginden');
		$this->load->model('M_sidebar');
	}

	public function loadkonten($page, $data)
	{

		$data['userdata'] 	= $this->userdata;
		$ajax = ($this->input->post('status_link') == "ajax" ? true : false);
		if (!$ajax) {
			$this->load->view('Dashboard/layouts/header', $data);
		}
		$this->load->view($page, $data);
		if (!$ajax) $this->load->view('Dashboard/layouts/footer', $data);
	}

	public function index()
	{
		// echo 'asd';
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "Data Surat";
		$data['judul'] 		= "Data Surat";

		$this->loadkonten('v_nginden/home', $data);
	}

	public function ajax_list()
	{
		$list = $this->M_surat_nginden->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y', strtotime($master->tanggal_surat));
			$row[] = $master->jenis_surat == 'surat masuk' ? $master->nomor_surat : $master->nomor_surat . '/' . $master->perihal . '/CM/' . $master->bulan . '/' . $master->tahun;
			$row[] = $master->keterangan_surat;
			$row[] = $master->jenis_surat;
			$row[] = $master->dibuat;
			$row[] = '<a class="btn btn-sm btn-info" href="' . base_url() . 'upload/surat/nginden/' . $master->file . '" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>';
			//add html for action
			$row[] =  anchor('edit-surat-nginden/' . $master->id_surat, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ') . ' ' .
				'<button class="btn btn-sm btn-danger hapus-surat data-toggle="tooltip" data-placement="top" title="Hapus"" id_surat="id_surat"  data-id=' . " '" . $master->id_surat . "' " . '><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	private function upload_pdf()
	{
		$config['upload_path']          = './upload/surat/nginden/';
		$config['allowed_types']        = 'pdf';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$config['file_name'] = $_FILES['pdf_file']['name'];
		$this->load->library('upload', $config);
		$this->upload->do_upload('pdf_file');
		return $this->upload->data();
	}

	public function Add()
	{
		// echo $data['nomor_surat'] = $this->M_surat_nginden->get_nomor();
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add', 'daftar');
		if ($access->menuview == 0) {
			$data['page'] 		= "Data Surat";
			$data['judul'] 		= "Data Surat";
			$this->loadkonten('Dashboard/layouts/no_akses', $data);
		}

		/*ini harus ada boss */ else {
			$data['page'] 				= "Data Surat";
			$data['judul'] 				= "Data Surat";
			$data['nomor_surat'] = $this->M_surat_nginden->get_nomor();
			$this->loadkonten('v_nginden/tambah', $data);
		}
	}

	public function ProsesTambahSurat()
	{
		$filePDF = $this->upload_pdf();

		$data = array(
			'nomor_surat'		=> $this->input->post('nomor_surat'),
			'tahun'		=> date('Y', strtotime($this->input->post('tanggal'))),
			'bulan'		=> date('m', strtotime($this->input->post('tanggal'))),
			'perihal'		=> $this->input->post('perihal'),
			'tanggal_surat'		=> date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'jenis_surat' 	=> $this->input->post('jenis_surat'),
			'keterangan_surat' 	=> $this->input->post('keterangan'),
			'dibuat' 	=> $this->input->post('dibuat'),
			'file' => $filePDF['file_name'],
			'created_date' 		=> date('Y-m-d H:i:s'),
			'updated_date' 		=> date('Y-m-d H:i:s')
		);

		$result = $this->db->insert('tbl_surat_nginden', $data);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function edit($id)
	{

		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add', 'daftar');
		if ($access->menuview == 0) {
			$data['page'] 		= "Data Surat";
			$data['judul'] 		= "Data Surat";
			$this->loadkonten('Dashboard/layouts/no_akses', $data);
		}

		/*ini harus ada boss */ else {
			$data['page'] 				= "Data Surat";
			$data['judul'] 				= "Data Surat";
			$data['datamaster'] = $id;
			$data['surat'] = $this->M_surat_nginden->selek_surat($id);
			$this->loadkonten('v_nginden/update', $data);
		}
	}

	public function prosesUpdateSurat()
	{
		$filePDF = $this->upload_pdf();

		$data = array(
			'nomor_surat'		=> $this->input->post('nomor_surat'),
			'tahun'		=> date('Y', strtotime($this->input->post('tanggal'))),
			'bulan'		=> date('m', strtotime($this->input->post('tanggal'))),
			'perihal'		=> $this->input->post('perihal'),
			'tanggal_surat'		=> date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'jenis_surat' 	=> $this->input->post('jenis_surat'),
			'keterangan_surat' 	=> $this->input->post('keterangan'),
			'dibuat' 	=> $this->input->post('dibuat'),
			'file' => $filePDF['file_name'],
			'updated_date' 		=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_surat'		=> $this->input->post('id_surat')
		);

		$result = $this->db->update('tbl_surat_nginden', $data, $where);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function hapus_surat()
	{

		$id_surat = $this->input->post('id_surat');

		$barang_query = $this->db->query("DELETE FROM tbl_surat_nginden WHERE id_surat = '$id_surat'");

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

	public function export()
	{
		$fileName = 'surat-nginden-' . date('ymdhis') . '.xlsx';
		$employeeData = $this->M_surat_nginden->get_data_export($this->input->post('table_length'));
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal');
		$sheet->setCellValue('C1', 'Nomor Surat');
		$sheet->setCellValue('D1', 'Isi/Keterangan');
		$sheet->setCellValue('E1', 'Jenis Surat');
		$sheet->setCellValue('F1', 'Kepada/Dari');
		$rows = 2;
		$no = 1;
		foreach ($employeeData as $val) {
			$sheet->setCellValue('A' . $rows, $no);
			$sheet->setCellValue('B' . $rows, $val['tanggal_surat']);
			$sheet->setCellValue('C' . $rows, $val['nomor_surat']);
			$sheet->setCellValue('D' . $rows, $val['keterangan_surat']);
			$sheet->setCellValue('E' . $rows, $val['jenis_surat']);
			$sheet->setCellValue('F' . $rows, $val['dibuat']);
			$rows++;
			$no++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save("upload/excel/surat-nginden/" . $fileName);

		$output = array(
			"data" => base_url() . "upload/excel/surat-nginden/" . $fileName,
		);
		//output to json format
		echo json_encode($output);
		// header("Content-Type: application/vnd.ms-excel");
		// redirect(base_url()."/upload/excel/surat-nginden/".$fileName);       
	}
}
