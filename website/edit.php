        <link href="css/jQueryUI/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
        
		<!-- Theme style -->
        <link href="css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" />
	
<?php
$id_guru=$_GET['id_guru'];
$sql=mysql_query("SELECT * FROM data_guru WHERE id_guru='$id_guru'");
$data=mysql_fetch_array($sql);

?>
<!--- Edit modal -->
		<!-- COMPOSE MESSAGE MODAL -->
        
                      <?php
					  if(isset($_GET['id_guru'])) {
					  
					  ?>
                      <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Kepegawaian</h3>                                    
                                </div><!-- /.box-header -->
								<div class="box-footer clearfix">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Edit Guru</h4>
                    </div>
                    <form action="?page=guru" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
						<div  class="form-group">
  					<div class="input-group">
                                    <span class="input-group-addon">Id Guru:</span>
									
			                        <input hidden="true" value="<?php echo $data['id_guru']; ?>" name="id_guru" placeholder="id_guru" class="form-control" />
				  </div>
				</div>
                            <div class="form-group">
  					<div class="input-group">
                                    <span class="input-group-addon">Nama Guru:</span>
									
			                        <input value="<?php echo $data['nama_guru']; ?>" name="nama_guru" placeholder="Nama Siswa .." class="form-control" id="nama_guru" />
				  </div>
				</div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">Tempat Lahir:</span>
	<input value="<?php echo $data['tmp_lhr']; ?>" name="tmp_lhr" placeholder="Tempat Lahir .." class="form-control" id="tmp_lhr">
  </div>
  </div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">Tanggal Lahir:</span>
  <input value="<?php echo $data['tgl_lhr']; ?>" name="tgl_lhr" placeholder="Tanggal Lahir .." class="form-control" id="tgl_lhr" />
</div>
</div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">Nip/NUPT</span>
	<input value="<?php echo $data['nip']; ?>" name="nip" placeholder="Nip / Nuptk .." class="form-control" id="nip">
  </div>
  </div>
  
                <div class="form-group">
				<div class="input-group">
				<span class="input-group-addon">Jenis Kelamin:</span>
				<select value="<?php echo $data['kelamin']; ?>" name="kelamin"  class="form-control" id="kelamin">
                        <option value="laki-laki">Laki - Laki</option>
                        <option value="perempuan">Perempuan</option>
                     </select>
				</div>
				</div>
                <div class="form-group">
                  <div class="input-group">
                                    <span class="input-group-addon">Alamat</span>
					<textarea placeholder="Alamat .."  name="alamat_guru" rows="3" class="form-control" id="alamat_guru"><?php echo $data['alamat_guru']; ?></textarea>
				</div>
				</div>
<div class="form-group">
  <div class="input-group">
	<span class="input-group-addon">Telpon</span>
	<input value="<?php echo $data['telpon_guru']; ?>" name="telpon_guru" placeholder="Nomor Telpon .." class="form-control" id="telpon_guru">
  </div>
  </div>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon">Username</span>
<input value="<?php echo $data['username']; ?>" name="username" placeholder="Username .." class="form-control" id="username" />
</div>
  </div>
<div class="form-group">
  <div class="input-group">
<span  class="input-group-addon">Password</span>
	<input  value="<?php echo $data['password']; ?>" name="password" type="password" class="form-control" id="password" placeholder="Password ..">
  </div>
  </div>
  <div class="form-group">
  <label>Foto</label>
	<input name="foto" type="file" id="foto">
  </div>
  <span>Max Foto 1.024 Kb (1 MegaByte)</span>

                        </div>
                        <div class="modal-footer clearfix">

                            <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                            <button type="submit" name="simpan" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Simpan</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
		
		<?php
		}
		$id_siswa=$_GET['id_siswa'];
		$sql=mysql_query("SELECT * FROM data_siswa WHERE id_siswa='$id_siswa'");
		$data=mysql_fetch_array($sql);
		if(isset($_GET['id_siswa'])){
		?>
		
		<!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Siswa</h3>                                    
                                </div><!-- /.box-header -->
								
                                <form action="?page=siswa" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
						<div hidden="false" class="form-group">
  					<div class="input-group">
                    <span class="input-group-addon">ID:</span>
			      <input value="<?php echo $data['id_siswa']; ?>" name="id_siswa" placeholder="Nama Siswa .." class="form-control"/>
				  </div>
				</div>
                            <div class="form-group">
  					<div class="input-group">
                                    <span class="input-group-addon">Nama Siswa:</span>
			      <input value="<?php echo $data['nama_siswa']; ?>" name="nama_siswa" placeholder="Nama Siswa .." class="form-control" id="nama_siswa" />
				  </div>
				</div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">Tempat Lahir:</span>
	<input value="<?php echo $data['tmp_lhr']; ?>" name="tmp_lhr" placeholder="Tempat Lahir .." class="form-control" id="tmp_lhr">
  </div>
  </div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">Tanggal Lahir:</span>
  <input value="<?php echo $data['tgl_lhr']; ?>" name="tgl_lhr" placeholder="Tanggal Lahir .." class="form-control" id="tgl_lhr" />
</div>
</div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">NISN</span>
	<input value="<?php echo $data['nis']; ?>" name="nis" placeholder="Nomor Induk Siswa Nasional .." class="form-control" id="nis">
  </div>
  </div>
  
                <div class="form-group">
				<div class="input-group">
                                    <span class="input-group-addon">Jenis Kelamin:</span>
				<select name="kelamin"  class="form-control" id="kelamin">
				  <option value="laki-laki" <?php if (!(strcmp("laki-laki", $data['kelamin']))) {echo "selected=\"selected\"";} ?>>Laki - Laki</option>
				  <option value="perempuan" <?php if (!(strcmp("perempuan", $data['kelamin']))) {echo "selected=\"selected\"";} ?>>Perempuan</option>
                     </select>
				</div>
				</div>
                <div class="form-group">
                  <div class="input-group">
                                    <span class="input-group-addon">Alamat</span>
					<textarea placeholder="Alamat .."  name="alamat_siswa" rows="3" class="form-control" id="alamat_siswa"><?php echo $data['alamat_siswa']; ?></textarea>
				</div>
				</div>
<div class="form-group">
  <div class="input-group">
	<span class="input-group-addon">Telpon</span>
	<input value="<?php echo $data['telpon_siswa']; ?>" name="telpon_siswa" placeholder="Nomor Telpon .." class="form-control" id="telpon_siswa">
  </div>
  </div>


                        </div>
                        <div class="modal-footer clearfix">

                            <a href="?page=siswa"><button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button></a>

                            <button type="submit" name="simpan_siswa" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Simpan</button>
                        </div>
                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
		
        
	
<?php
}else{
echo "Wadaw";
}
?>
<!-- jQuery 2.0.2 -->
        

