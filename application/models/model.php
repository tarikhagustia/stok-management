<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function insertData($tName,$tData)
	{
		$hasil = $this->db->insert($tName,$tData);
		return $hasil;
	}
	public function getData($tName)
	{
		$hasil = $this->db->query("SELECT * FROM ".$tName);
		return $hasil;
	}
	public function getDataWhere($tName,$pKey,$value)
	{
		$hasil = $this->db->get_where($tName, array ( $pKey => $value ));
		return $hasil;
	}
	public function queryJoin($filter_plu="", $filter_article="", $filter_brand="", $filter_qty="", $filter_harga="")
	{
		$query = $this->db->query("SELECT * FROM db_inv, db_barang WHERE db_inv.plu = db_barang.plu".$filter_plu. $filter_article. $filter_brand. $filter_qty. $filter_harga);

		return $query;
	}
	public function queryJoinSalesReport($filter_plu="", $filter_article="", $filter_brand="", $filter_tgl="")
	{
		$query = $this->db->query("SELECT * FROM db_sales, db_barang WHERE db_sales.plu = db_barang.plu".$filter_plu. $filter_article. $filter_brand. $filter_tgl);

		return $query;
	}
	public function queryJoinRecReport($filter_plu="", $filter_article="", $filter_brand="", $filter_tgl="")
	{
		$query = $this->db->query("SELECT * FROM db_rec, db_barang WHERE db_rec.plu = db_barang.plu".$filter_plu. $filter_article. $filter_brand. $filter_tgl);

		return $query;
	}
	public function editData($tabel,$data,$where)
	{
		$hasil = $this->db->update($tabel,$data,$where);
		return $hasil;

	}
	public function deleteData($tabel,$where)
	{
		$hasil = $this->db->delete($tabel,$where);
		return $hasil;

	}
	public function login($u,$p)
	{	
		$pmd5 = md5($p);
		$this->db->where('usr_username',$u);
		$this->db->where('usr_password',$pmd5);
		$query = $this->db->get('tb_users');

		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$data = array(
					"username" => $row->usr_username,
					"nama" => $row->usr_nama,
					"akses" => $row->usr_akses,
					"waktu" => date('d-m-Y H:i:s')
					);
			}	
			$this->session->set_userdata($data);
			redirect('home');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert-box warning"><span>ERROR : </span>Data yang anda masukkan salah, Coba Lagi !.</div>');
			redirect('login');
		}
	}
	public function security()
	{
		$session = $this->session->userdata('username');
		if(empty($session)) {
			$this->session->sess_destroy();
			$this->session->set_flashdata('berhasil','<div class="alert-box warning"><span>Error : </span>Anda Harus Login.</div>');
			redirect(base_url()."index.php/login");
		}
	}
}
