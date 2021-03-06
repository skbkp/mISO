<!--
===============Author===============
-Kukuh M HidayaTullah (04 April 2018)

*ket:
author ini harus di isi!
jika Anda mengubah script disini harap isi author
dan juga tanggal script di ubah terlebih dahulu
-->
<!--=========================HEAD=========================-->
<?php $this->load->view('layout/head');?>
<!--=======================END HEAD=======================-->
<!--=========================HEADER=========================-->
<div class="navbar-upper">
  <nav class="z-depth-0">
    <div class="nav-wrapper blue lighten-1">
      <div class="row">
        <div class="col s12">
          <a href="<?php echo base_url('wmm/pedoman_mutu');?>" class="brand-logo" style="display:block;float:left;"><i class="material-icons">arrow_back</i> <?php echo $title ?></a>          
        </div>
      </div>
    </div>
  </nav>
</div>
<!--=======================END HEADER=======================-->
<div class="row">
	<div class="col s12">
		<div class="card col s5 blue">
		  <select class="browser-default">
			<option value="" disabled selected>Pilih Unit Kerja</option>
			<option value="1">Option 1</option>
			<option value="2">Option 2</option>
			<option value="3">Option 3</option>
		  </select>
		  <br>
		  <center>
			<a href="<?php echo base_url('wmm/pedoman_mutu/kirim_dokumen/'.$id_pedomanmutu);?>" class="btn green waves-effect waves-light"> Ya, Kirim </a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo base_url('wmm/pedoman_mutu/edit/'.$id_pedomanmutu); ?>" class="btn red waves-effect waves-light"> Tidak, Edit </a>
			<br>
			<br>
		  </center>
		</div>
		<div class="card blue col s6 right">
			<h5 class="white-text"> <?php echo $nama_dokumen ?> </h5>
		</div>
	</div>
</div>

<div class="row">
	<div class="col s12 m3">
		<div class="card col s12">
			<table class="bordered">
				<tbody>
					<tr>
						<td class="grey-text">Di upload oleh</td>
						<td>
							<b><?php echo $nama ?></b>
							<?php
							if($nama == '')
							{
								echo "<span style='font-size:12px;'>tidak di ketahui</span>";
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="grey-text">Di upload pada</td>
						<td>
							<b style="font-size:12px;"><?php echo $tgl_upload ?></b>
							<?php
							if($tgl_upload == '')
							{
								echo "<span style='font-size:12px;'>belum di upload</span>";
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="grey-text">Status dokumen</td>
						<td>
							<b style="font-size:12px;"><?php echo $status_dokumen ?></b>
							<?php
							if($status_dokumen == '')
							{
								echo "<span style='font-size:12px;'>tidak di ketahui</span>";
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="grey-text">Tanggal dikirim</td>
						<td>
							<b style="font-size:12px;"><?php echo $tgl_dikirim ?></b>
							<?php
							if($tgl_dikirim == '')
							{
								echo "<span style='font-size:12px;'>dokumen belum di kirim</span>";
							}
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="card col s12">
			<table>
				<tbody>
					<tr>
						<td>
							<span class="grey-text"> Catatan Dokumen <br></span>
							<span style='font-size:13px;'><?php echo $catatan ?></span> 
							<?php
							if($catatan == '')
							{
								echo "<center style='font-size:12px;'>tidak ada catatan</center>";
							}
							?>
						</td>
					</tr>
				</tbody>
			</table>			
		</div>
	</div>

	
	<div class="col s12 m9 right">
		<div class="card col s12">
			<iframe
			src="<?php echo $dokumen_path ?>" width="100%" height="1000" style="border: none;">
			</iframe>
		</div>
	</div>
</div>



<!--MODAL-->
<div id="about_google_drive" class="modal modal-fixed-footer">
	<div class="modal-content">
	  <h4>Kenapa di Upload ke Google Drive?</h4>
	  <p>A bunch of text</p>
	</div>
	<div class="modal-footer">
	  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Ok, Paham</a>
	</div>
</div>
<!--END MODAL-->
<!--=========================FOOTER=========================-->
<?php $this->load->view('layout/footer'); ?>
<!--=======================END FOOTER=======================-->