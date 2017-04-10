<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('dashboard',array(),true)
			);
		$this->load->view('index',$part);
	}
	public function insertRec()
	{
		$plu = $_POST['plu'];
		$qty = $_POST['qty'];
		$tgl_rec = $_POST['tgl_rec'];
		$q = $this->db->query("SELECT * FROM db_barang WHERE plu = '$plu'");
		$query = $q->result_array();
		// Cek apakah PLU ada apa engga
		if ($q->num_rows() > 0) {
			
		
		$harga = $query[0]['harga_beli'];
		
		$total = $qty * $harga;
		

		$data = array(
			"plu" => $plu,
			"jml_rec" => $qty,
			"tgl_rec" => $tgl_rec,
			"total" => $total
			
			);
		
		$query = $this->model->insertData('db_rec',$data);
		if ($query >= 1) {
			$this->session->set_flashdata('berhasil','<div class="alert-box success"><span>success : </span>Data berhasil disimpan.</div>');
			redirect('home/receiving');
		}else{
			echo "Query Gagal ";
		}
	}else{
		$this->session->set_flashdata('berhasil','<div class="alert-box warning"><span>Warning : </span>Data gagal disimpan. <span>NOMOR PLU SALAH</span></div>');
		redirect('home/receiving');
	}
	}
	public function receiving()
	{
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_rec',array(),true)
			);
		$this->load->view('index',$part);

	}
	public function articleinput()
	{
		$this->model->security();
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_art_input',array(),true)
			);
		$this->load->view('index',$part);

	}
	public function articlemtc()
	{
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_art_mtc',array(),true)
			);
		$this->load->view('index',$part);

	}
	public function salesinput()
	{
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_sales',array(),true)
			);
		$this->load->view('index',$part);

	}
	public function articleinput_do(){

		$plu = $_POST['plu'];
		$brand = $_POST['brand'];
		$article = $_POST['article'];
		$harga_beli = $_POST['harga_beli'];
		$harga_jual = $_POST['harga_jual'];

		$data = array(
			"plu" => $plu,
			"brand" => $brand,
			"article" => $article,
			"harga_beli" => $harga_beli,
			"harga_jual" => $harga_jual
			);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$do = $this->model->insertData('db_barang',$data);
		$this->db->query("INSERT INTO db_inv VALUES ('','$plu','0')");
		if ($do >= 1) {
			$this->session->set_flashdata('berhasil','<div class="alert-box success"><span>success : </span>Data berhasil disimpan.</div>');
			redirect('home/articleinput');
		}else{
			echo "Gagal Om";
		}
	}
	public function salesinput_do()
	{
		$plu = $_POST['plu'];
		$tgl = $_POST['tgl'];
		$qty = $_POST['qty'];
		$q = $this->db->query("SELECT * FROM db_barang WHERE plu = '$plu'")->result_array();
		$cekPLU = $this->model->getDataWhere('db_barang','plu',$plu)->num_rows();
		if ($cekPLU > 0 ) {
		$hj = $q[0]['harga_jual'];
		$total = $qty * $hj;
		$data = array(
			"plu" => $plu,
			"tgl_sales" => $tgl,
			"jml_sales" => $qty,
			"total" => $total
			);
		$do = $this->model->insertData('db_sales',$data);
		if ($do >= 1) {
			$this->session->set_flashdata('berhasil','<div class="alert-box success"><span>success : </span>Data berhasil disimpan.</div>');
			redirect('home/salesinput');
		}else{
			echo "Gagal Gan";
		}
	}else{
			$this->session->set_flashdata('berhasil','<div class="alert-box warning"><span>GAGAL : </span>PLU tidak terdaftar.</div>');
			redirect('home/salesinput');
	}
	}
	public function invreport() {

		$plu = $_POST['plu'];
		$brand = $_POST['brand'];
		$article = $_POST['article'];
		$harga = $_POST['harga'];

		if($plu!==""){
			$filter_plu=" and db_barang.plu ='$plu'";
		}else{
			$filter_plu="";
		}
		
		if($article!==""){
			$filter_article=" and db_barang.article LIKE '%$article%'";
		}else{
			$filter_article="";
		}
		
		if($brand!==""){
			$filter_brand=" and db_barang.brand LIKE '%$brand%'";
		}else{
			$filter_brand="";
		}
		if($harga!==""){
			$filter_harga=" and db_barang.harga_jual ='$harga'";
		}else{
			$filter_harga="";
		}
		
	
		$data = array(
			"reports" => $this->model->queryJoin($filter_plu, $filter_article, $filter_brand, $filter_plu, $filter_harga)->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_report_inv',$data,true)
			);
		$this->load->view('index',$part);
		
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
	}
	public function salesreport() {

		$plu = $_POST['plu'];
		$brand = $_POST['brand'];
		$article = $_POST['article'];
		$tgl = $_POST['tgl'];

		if($plu!==""){
			$filter_plu=" and db_barang.plu ='$plu'";
		}else{
			$filter_plu="";
		}
		
		if($article!==""){
			$filter_article=" and db_barang.article LIKE '%$article%'";
		}else{
			$filter_article="";
		}
		
		if($brand!==""){
			$filter_brand=" and db_barang.brand LIKE '%$brand%'";
		}else{
			$filter_brand="";
		}
		if($tgl!==""){
			$filter_tgl=" and db_sales.tgl_sales ='$tgl'";
		}else{
			$filter_tgl="";
		}
		
	
		$data = array(
			"reports" => $this->model->queryJoinSalesReport($filter_plu, $filter_article, $filter_brand, $filter_tgl)->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_report_sales',$data,true)
			);
		$this->load->view('index',$part);
		
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
	}
	public function recreport()
	{
		$plu = $_POST['plu'];
		$brand = $_POST['brand'];
		$article = $_POST['article'];
		$tgl = $_POST['tgl'];

		if($plu!==""){
			$filter_plu=" and db_barang.plu ='$plu'";
		}else{
			$filter_plu="";
		}
		
		if($article!==""){
			$filter_article=" and db_barang.article LIKE '%$article%'";
		}else{
			$filter_article="";
		}
		
		if($brand!==""){
			$filter_brand=" and db_barang.brand LIKE '%$brand%'";
		}else{
			$filter_brand="";
		}
		if($tgl!==""){
			$filter_tgl=" and db_rec.tgl_rec ='$tgl'";
		}else{
			$filter_tgl="";
		}
		
	
		$data = array(
			"reports" => $this->model->queryJoinRecReport($filter_plu, $filter_article, $filter_brand, $filter_tgl)->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_report_rec',$data,true)
			);
		$this->load->view('index',$part);
		
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
	}
	public function invadj()
	{
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_inv_adj',array(),true)
			);
		$this->load->view('index',$part);

	} 
	public function invadj_do()
	{
		$plu = $_POST['plu'];
		$qty = $_POST['qty'];

		$cekPLU = $this->model->getDataWhere('db_barang','plu',$plu)->num_rows();
		if ($cekPLU > 0 ) {
		$data = array(
			"jml_inv" => $qty
			);
		$where = array("plu" => $plu);
		$query = $this->model->editData('db_inv',$data,$where);
		if ($query >= 1) {
			$this->session->set_flashdata('pesan','<div class="alert-box success"><span>success : </span>Data berhasil disimpan.</div>');
			redirect('home/invadj');
		}else{
			echo "Gagal Masbro";
		}
		}else{
			$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span>PLU tidak terdaftar.</div>');
			redirect('home/invadj');
		}
	}
	public function invlist()
	{	
		// $data = array(
		// 	"datas" => $this->model->queryJoin()->result_array()
		// 	);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_inv_search',$data,true)
			);
		// $this->load->view('index',$part);
		$datas = $this->model->queryJoin()->result_array();
		echo "<pre>";
		print_r($datas);
		// foreach ($datas as $dat) {
		// 	echo $dat['plu'];
		// }
		echo "</pre>";
	}
	public function invDelete_do($where)
	{
		$do = $this->model->deleteData('db_barang',array('plu' => $where));
		if ($do>=1) {
			$this->session->set_flashdata('berhasil','<div class="alert-box success"><span>success : </span>Data berhasil disimpan.</div>');
			redirect('home/invlist');
		}else{
			echo "Gagal Masbro";
		}
	}
	public function artmtc2()
	{	

		$plu = $_POST['plu'];
		$data = array(
			"datas" => $this->model->getDataWhere('db_barang','plu',$plu)->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_art_mtc2',$data,true)
			);
		$this->load->view('index',$part);
	}
	public function artmtc_do()
	{	

		$plu = $_POST['plu'];
		$brand = $_POST['brand'];
		$article = $_POST['article'];
		$harga_beli = $_POST['hb'];
		$harga_jual = $_POST['hj'];

		$data = array(
			"brand" => $brand,
			"article" => $article,
			"harga_beli" => $harga_beli,
			"harga_jual" => $harga_jual

			);
		
		$do = $this->model->editData('db_barang',$data,array('plu' => $plu));
		if ($do>=1) {
			$this->session->set_flashdata('berhasil','<div class="alert-box success"><span>success : </span>Data berhasil disimpan.</div>');
			redirect('home/invlist');
		}else
		{
			echo "Gagal Masbro";
		}
	}
	
	public function logout()
	{

		$this->session->sess_destroy();
		redirect('login');
	}
	public function application()
	{

		
		$data = array(
			"datas" => $this->model->getData('tb_users')->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_users',$data,true)
			);
		$this->load->view('index',$part);
	}
	public function application_do()
	{
		
			$u = $this->input->post('username');
			$p = md5($this->input->post('password'));
			$n = $this->input->post('nama');
			$a = $this->input->post('akses');
			
			// Cek apabila username sudah ada yang pakai
			$cekU = $this->model->getDataWhere('tb_users','usr_username',$u);
			if ($cekU->num_rows()>0) {
				
				$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span>Username sudah ada yang pakai.</div>');
				redirect('home/application');
			}else{
				$data = array(
					"usr_username" => $u,
					"usr_password" => $p,
					"usr_nama" => $n,
					"usr_akses" => $a
					);
				$do = $this->model->insertData('tb_users',$data);
				if ($do >= 1) {
					$this->session->set_flashdata('pesan','<div class="alert-box success"><span>SUKSES : </span>Data Sudah Disimpan.</div>');
					redirect('home/application');
				}else{
					$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span>Data gagal Disimpan.</div>');
					redirect('home/application');
				}
			}
	}
	public function application_delete($id)
	{
		$do = $this->model->deleteData('tb_users',array("id" =>$id));
		if ($do >= 1) {
			$this->session->set_flashdata('pesan','<div class="alert-box success"><span>BERHASIL : </span>Data Berhasil Disimpan.</div>');
			redirect('home/application');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span>Data Gagal Disimpan.</div>');
			redirect('home/application');
		}
	}
	public function stokopname()
	{
		$inv_no = $this->input->get('inv_no');
		$data = array(
			"kategoris" => $this->db->query("SELECT * FROM db_inv_so WHERE status='1' GROUP by nomor_so")->result_array(),
			"datas" => $this->db->query("SELECT * FROM db_inv_so, db_barang WHERE nomor_so='$inv_no' AND db_inv_so.plu = db_barang.plu AND status='1'")->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_inv_so',$data,true)
			);
		$this->load->view('index',$part);
		
		
	}
	public function so_do()
	{
		$desc = $this->input->post('desc');
		$ts = date('Y-m-d');
		$ns = date('Ymds');

		$data = array (
			"nomor_so" => $ns,
			"tgl_so" => $ts,
			"inv_desc" => $desc
			);



		$do = $this->model->insertData('db_inv_so',$data);
		if ($do>=1) {
			redirect('home/stokopname');
		}else{
			echo "Gagal OM";
		}
		
	}
	public function so_do2()
	{
		$ns = $this->input->post('inv_no');
		$plu = $this->input->post('plu');
		$ts = $this->input->post('tgl_so');
		$qty2 = $this->input->post('qty2');
		$desc = $this->input->post('inv_desc');
		$s = 1;

		// Cek Apakah PLU ADA
		$cekPLU = $this->model->getDataWhere('db_barang','plu',$plu);
		if($cekPLU->num_rows() >0)
		{
			// Cek Apakah PLU sudah ada didalam tabel 'db_inv_so'
			$cekso = $this->model->getDataWhere('db_inv_so','plu',$plu);
			if($cekso->num_rows() >0)
			{
				$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span>BARANG sudah ada pada daftar stokopname.</div>');
				redirect('home/stokopname/?inv_no='.$ns);
			}else{
				$cekInv = $this->model->getDataWhere('db_inv','plu',$plu)->result_array();
				$qty1 = $cekInv[0]['jml_inv'];

				$data = array(
					"nomor_so" => $ns,
					"inv_desc" => $desc,
					"plu" => $plu,
					"tgl_so" => $ts,
					"qty1" => $qty1,
					"qty2" => $qty2,
					"status" => $s
					);
				$do = $this->model->insertData('db_inv_so',$data);
				if ($do>=1) {
					$this->session->set_flashdata('pesan','<div class="alert-box success"><span>BERHASIL : </span> PLU <span>'.$plu.'</span> QTY <span>'.$qty2.'</span> Sudah Disimpan.</div>');
					redirect('home/stokopname/?inv_no='.$ns);
				}else{
					echo "Gagal";
				}
			}
		}else{
			$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span>PLU salah atau tidak terdaftar.</div>');
			redirect('home/stokopname/?inv_no='.$ns);
		}

			
		
	}
	public function delete_so_qty($plu,$ns)
	{
		$do = $this->model->deleteData('db_inv_so',array('plu' => $plu));
		if ($do>=1) {
			$this->session->set_flashdata('pesan','<div class="alert-box success"><span>BERHASIL : </span> PLU <span>'.$plu.'</span> Berhasil Dihapus.</div>');
			redirect('home/stokopname/?inv_no='.$ns);
		}else{
			$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span>PLU Gagal dihapus.</div>');
			redirect('home/stokopname/?inv_no='.$ns);
		}

	}
	public function updateSoByQty()
	{
		$jmlinv = $this->input->post('jml');
		$nomor_so = $this->input->post('nomor_so');

		for ($i=1; $i<=$jmlinv; $i++)
		{
	  
		   $plu  = $_POST['plu'.$i];
		   $qty2  = $_POST['qty2'.$i];
		  
		   $hasil = $this->db->query("UPDATE db_inv_so SET qty2='$qty2' WHERE plu='$plu' AND nomor_so='$nomor_so'");
		   
		}
		if ($hasil>=1) {
			$this->session->set_flashdata('pesan','<div class="alert-box success"><span>BERHASIL : </span> Data Berhasil disimpan.</div>');
			redirect('home/stokopname/?inv_no='.$nomor_so);
		}else{
			$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span>Data Gagal Disimpan.</div>');
			redirect('home/stokopname/?inv_no='.$nomor_so);
		}
	}
	public function formupdate_so()
	{
		$inv_no = $this->input->get('inv_no');
		$data = array(
			"kategoris" => $this->db->query("SELECT * FROM db_inv_so WHERE status='1' GROUP by nomor_so")->result_array(),
			"datas" => $this->db->query("SELECT * FROM db_inv_so, db_barang WHERE nomor_so='$inv_no' AND db_inv_so.plu = db_barang.plu AND status='1'")->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_inv_so_update',$data,true)
			);
		$this->load->view('index',$part);
	}
	public function update_so()
	{
		$jmlinv = $this->input->post('jml');
		$nomor_so = $this->input->post('nomor_so');
		
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
	
		for ($i=1; $i<=$jmlinv; $i++)
		{
		  
		   $plu  = $_POST['plu'.$i];
		   $qty2  = $_POST['qty2'.$i];
		  
		   $query = $this->db->query("UPDATE db_inv SET jml_inv='$qty2' WHERE plu='$plu'");
		}
		if($query>=1)
		{
			// SET status = 2
			$this->model->editData('db_inv_so',array('status' => '2'),array('nomor_so' => $nomor_so));
			$this->session->set_flashdata('pesan','<div class="alert-box success"><span>BERHASIL : </span> Data Berhasil disimpan.</div>');
			redirect('home/formupdate_so/?inv_no='.$nomor_so);
		}else{
			$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>GAGAL : </span> Data Gagal disimpan.</div>');
			redirect('home/formupdate_so/?inv_no='.$nomor_so);
		}
	}
	public function soreport()
	{
		$data = array(
			"data" => $this->db->query("SELECT * FROM db_inv_so WHERE status='2' GROUP by nomor_so")->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_report_so',$data,true)
			);
		$this->load->view('index',$part);
	}
	public function soreport_print()
	{
		$nomor_so = $this->input->get('inv_no');
		$data = array(
			"datas" => $this->db->query("SELECT * , SUM( qty1 - qty2 ) AS var_qty, SUM( harga_jual*qty1 ) AS t_hj, SUM( harga_jual*qty2 ) AS c_hj FROM db_inv_so, db_barang WHERE nomor_so = '$nomor_so' AND db_inv_so.plu = db_barang.plu AND nomor_so = '$nomor_so' GROUP BY db_inv_so.plu")->result_array(),
			"datalists" => $this->db->query("SELECT * , SUM( qty2 - qty1 ) AS var_qty, SUM( harga_jual*qty1 ) AS t_hj, SUM( harga_jual*qty2 ) AS c_hj FROM db_inv_so, db_barang WHERE db_inv_so.plu = db_barang.plu AND nomor_so='$nomor_so' GROUP BY db_inv_so.plu")->result_array()
			);
		$part = array(
			"sidemenu" => $this->load->view('menu',array(),true),
			"konten" => $this->load->view('pg_report_so_hasil',$data,true)
			);
		$this->load->view('index',$part);
	}
}	
