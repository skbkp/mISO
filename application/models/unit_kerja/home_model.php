<!--
===============Author===============
-Kukuh M HidayaTullah (22 Maret 2018)
-Kukuh M HidayaTullah (23 Maret 2018)

*ket:
author ini harus di isi!
jika Anda mengubah script disini harap isi author
dan juga tanggal script di ubah terlebih dahulu
-->

<?php
class Home_model extends CI_Model {

	public function __construct()	{
		$this->load->database();
	}

	// menampilkan data dokumen unit kerja
	function list_dokumen($user) {
		return $this->db->query('
		SELECT
		  d.*,
		  n.nama,
		  h.hak_akses,
		  j.jenis_pos,
		  s.status_dokumen
		FROM
		  dokumen d
		  JOIN USER n USING (id_user)
		  JOIN hak_akses h USING (id_hakakses)
		  JOIN jenis_pos j USING (id_jenispos)
		  JOIN status_dokumen s USING (id_statusdokumen)
		WHERE hak_akses = "Unit Kerja" AND nama="'.$user.'"
		ORDER BY tgl_upload DESC
		');
	}
	
	// menampilkan data dokumen revisi unit kerja
	function list_dokumen_revisi($user) {
		return $this->db->query('
		SELECT
		  d.*,
		  i.nama_dokumen,
		  i.catatan,
		  j.id_jenispos,
		  j.jenis_pos,
		  u.nama,
		  u.id_hakakses,
		  h.hak_akses
		FROM
		  dokumen_revisi d
		  JOIN dokumen i USING (id_dokumen)
		  JOIN jenis_pos j USING (id_jenispos)
		  JOIN USER u USING (id_user)
		  JOIN hak_akses h USING (id_hakakses)
		WHERE hak_akses = "Unit Kerja" AND nama="'.$user.'"
		ORDER BY tgl_upload DESC
		');
	}
	
	// Lihat Dokumen (mengambil ID dokumen dan menampilkan data tersebut)
	public function view_dokumen($id_dokumen){
		$d	= $this->db->query('
		SELECT
		  d.*,
		  j.jenis_pos,
		  u.nama,
		  s.status_dokumen,
		  p.status_pengiriman
		FROM
		  dokumen d
		  JOIN jenis_pos j USING (id_jenispos)
		  JOIN USER u USING(id_user)
		  JOIN status_dokumen s USING (id_statusdokumen)
		  JOIN status_pengiriman p USING (id_statuspengiriman)
		WHERE id_dokumen = "'.$id_dokumen.'"
		')->result_array();
		return $d;
	}
	
	// Lihat Dokumen Revisi (mengambil ID dokumen dan menampilkan data tersebut)
	public function view_dokumen_revisi($id_dokumen){
		$d	= $this->db->query('
		SELECT
		  d.*,
		  i.nama_dokumen,
		  i.tgl_dikirim,
		  i.tgl_diterima,
		  i.tgl_upload,
		  i.catatan,
		  sd.status_dokumen,
		  sp.status_pengiriman,
		  j.jenis_pos,
		  u.nama,
		  u.id_hakakses,
		  h.hak_akses
		FROM
		  dokumen_revisi d
		  JOIN dokumen i USING (id_dokumen)
		  JOIN jenis_pos j USING (id_jenispos)
		  JOIN status_dokumen sd USING (id_statusdokumen)
		  JOIN status_pengiriman sp USING (id_statuspengiriman)
		  JOIN USER u USING (id_user)
		  JOIN hak_akses h USING (id_hakakses)
		WHERE id_dokumen = "'.$id_dokumen.'"
		')->result_array();
		return $d;
	}
	
	public function view_kirim_dokumen($id_dokumen){
		$d	= $this->db->query('
		SELECT
		  d.*,
		  j.jenis_pos,
		  u.nama,
		  s.status_dokumen,
		  p.status_pengiriman
		FROM
		  dokumen d
		  JOIN jenis_pos j USING (id_jenispos)
		  JOIN USER u USING(id_user)
		  JOIN status_dokumen s USING (id_statusdokumen)
		  JOIN status_pengiriman p USING (id_statuspengiriman)
		WHERE id_dokumen = "'.$id_dokumen.'"
		')->result_array();
		return $d;
	}
	
	// Lihat Dokumen Revisi (mengambil ID dokumen dan menampilkan data tersebut)
	public function view_kirim_dokumen_revisi($id_dokumen){
		$d	= $this->db->query('
		SELECT
		  d.*,
		  i.nama_dokumen,
		  i.tgl_dikirim,
		  i.tgl_diterima,
		  i.tgl_upload,
		  i.catatan,
		  sd.status_dokumen,
		  sp.status_pengiriman,
		  j.jenis_pos,
		  u.nama,
		  u.id_hakakses,
		  h.hak_akses
		FROM
		  dokumen_revisi d
		  JOIN dokumen i USING (id_dokumen)
		  JOIN jenis_pos j USING (id_jenispos)
		  JOIN status_dokumen sd USING (id_statusdokumen)
		  JOIN status_pengiriman sp USING (id_statuspengiriman)
		  JOIN USER u USING (id_user)
		  JOIN hak_akses h USING (id_hakakses)
		WHERE id_dokumen = "'.$id_dokumen.'"
		')->result_array();
		return $d;
	}
	
	// Edit (mengambil ID file dan menampilkan data tersebut)
	public function edit($id_dokumen){
		$d	= $this->db->get_where('dokumen',array('id_dokumen'=>$id_dokumen))->result_array();
		return $d;
	}
	
	// memindahkan file ke folder sampah
	function sampah($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>
