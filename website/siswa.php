<?php

//include "koneksi/conn.php";
if(isset($_POST['submit'])){
	$nama_siswa=ucwords(htmlentities($_POST['nama_siswa']));
	$tmp_lhr=ucwords(htmlentities($_POST['tmp_lhr']));
	$tgl_lhr=($_POST['tgl_lhr']);
	$nis=htmlentities($_POST['nis']);
	$kelamin=htmlentities($_POST['kelamin']);
	$alamat_siswa=ucwords(htmlentities($_POST['alamat_siswa']));
	$telpon_siswa=strtoupper(htmlentities($_POST['telpon_siswa']));
	$username=htmlentities($_POST['username']);
	$password=md5(htmlentities($_POST['password']));
	$foto="img/siswa/".$_FILES['foto']['name'];
	$src=$_FILES['foto']['tmp_name'];
	copy($src,$foto);
	
	$query=mysql_query("insert into data_siswa values('','$nama_siswa','$tmp_lhr','$tgl_lhr','$nis','$kelamin','$alamat_siswa','$telpon_siswa','$username','$password','$foto')");
	if($query){
		?><script language="javascript">document.location.href="?page=ruang_kelas&status=2";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=siswa&status=0";</script><?php
	}


	
}else{
	unset($_POST['submit']);
}

?>
<?php
if(isset($_POST['simpan_siswa'])){
	$id_siswa=$_POST['id_siswa'];
	$nama_siswa=ucwords(htmlentities($_POST['nama_siswa']));
	$tmp_lhr=ucwords(htmlentities($_POST['tmp_lhr']));
	$tgl_lhr=($_POST['tgl_lhr']);
	$nis=htmlentities($_POST['nis']);
	$kelamin=htmlentities($_POST['kelamin']);
	$alamat_siswa=ucwords(htmlentities($_POST['alamat_siswa']));
	$telpon_siswa=strtoupper(htmlentities($_POST['telpon_siswa']));
	
	
	$query=mysql_query("UPDATE data_siswa SET nama_siswa='$nama_siswa', tmp_lhr='$tmp_lhr', tgl_lhr='$tgl_lhr', nis='$nis', kelamin='$kelamin', alamat_siswa='$alamat_siswa', telpon_siswa='$telpon_siswa' WHERE id_siswa='$id_siswa'");
	if($query){
		?><script language="javascript">document.location.href="?page=siswa&status=2";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=siswa&status=0";</script><?php
	}


	
}else{
	unset($_POST['simpan_siswa']);
}

?>
<?php
$hapus_siswa=$_GET['hapus_siswa'];
if(isset($_GET['hapus_siswa'])){
$query=mysql_query("DELETE FROM data_siswa WHERE id_siswa='$hapus_siswa'");
if($query){
		?><script language="javascript">document.location.href="?page=siswa&status=3";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=siswa&status=0";</script><?php
	}
	}
?>
               
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kesiswaan
                        <small>Siswa</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Kesiswaan</a></li>
                        <li class="active">Siswa</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">List Siswa</h3>                                    
                                </div><!-- /.box-header -->
								<div class="box-footer clearfix">
								<?php
								if($_GET['status']=='1'){
								?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Sukses!</b> Data Telah Disimpan.
                                    </div>
									<?php
									}
								if($_GET['status']=='2'){
								?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Sukses!</b> Data Telah Diubah.
                                    </div>
									<?php
									}
								if($_GET['status']=='3'){
								?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Sukses!</b> Data Telah Hapus.
                                    </div>
                                    <?php
								}
									?>
								<button data-toggle="modal" data-target="#compose-modal" type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Siswa Baru</button>
                                    
                                </div>
                                <div class="box-body table-responsive">
                                
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
												<th>No</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
								$query=mysql_query("SELECT * FROM data_siswa siswa, tbl_ruangan kelas, setup_kelas ruang WHERE kelas.id_siswa = siswa.id_siswa AND kelas.id_kelas = ruang.id_kelas ORDER BY nama_siswa ASC ");
								
								
										$no=0;
										while($data=mysql_fetch_array($query)) {
										?>
                                            <tr>
												<td><?php echo $no=$no+1; ?></td>
                                                <td><?php echo $data['nis'];
 ?></td>
                                                <td><?php echo $data['nama_siswa']; ?></td>
                                                <td><?php echo $data['nama_kelas']; ?></td>
                                                <td><?php echo $data['kelamin']; ?></td>
                                                <td>
												
												<div class="tools">
                                                <a href="?page=edit&id_siswa=<?php echo $data['id_siswa']; ?>">
												<i class="fa fa-edit"></i>
												</a>
												<a href="?page=siswa&hapus_siswa=<?php echo $data['id_siswa']; ?>">
                                                <i class="fa fa-trash-o"></i>
												</a>
												</div>
												
												</td>
                                            </tr>
                                            <?php
										}
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
												<th>No</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Jenis Kelamin </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		<!-- COMPOSE MESSAGE MODAL -->
        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Data Siswa Baru</h4>
                    </div>
                    <form action="?page=siswa" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
  					<div class="input-group">
                                    <span class="input-group-addon">Nama Siswa:</span>
			      <input name="nama_siswa" placeholder="Nama Siswa .." class="form-control" id="nama_siswa" />
				  </div>
				</div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">Tempat Lahir:</span>
	<input name="tmp_lhr" placeholder="Tempat Lahir .." class="form-control" id="tmp_lhr">
  </div>
  </div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">Tanggal Lahir:</span>
  <input name="tgl_lhr" placeholder="Tanggal Lahir .." class="form-control" id="tgl_lhr" />
</div>
</div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">NISN</span>
	<input name="nis" placeholder="Nomor Induk Siswa Nasional .." class="form-control" id="nis">
  </div>
  </div>
  
                <div class="form-group">
				<div class="input-group">
                                    <span class="input-group-addon">Jenis Kelamin:</span>
				<select name="kelamin"  class="form-control" id="kelamin">
                        <option value="laki-laki">Laki - Laki</option>
                        <option value="perempuan">Perempuan</option>
                     </select>
				</div>
				</div>
                <div class="form-group">
                  <div class="input-group">
                                    <span class="input-group-addon">Alamat</span>
					<textarea placeholder="Alamat .."  name="alamat_siswa" rows="3" class="form-control" id="alamat_siswa"></textarea>
				</div>
				</div>
<div class="form-group">
  <div class="input-group">
	<span class="input-group-addon">Telpon</span>
	<input name="telpon_siswa" placeholder="Nomor Telpon .." class="form-control" id="telpon_siswa">
  </div>
  </div>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon">Username</span>
  
	<input name="username" placeholder="Username .." class="form-control" id="username">
  </div>
  </div>
<div class="form-group">
  <div class="input-group">
<span class="input-group-addon">Password</span>
	<input name="password" type="password" class="form-control" id="password" placeholder="Password ..">
  </div>
  </div>
  <div class="form-group">
  <label>Foto</label>
	<input name="foto" type="file" id="foto">
  </div>

                        </div>
                        <div class="modal-footer clearfix">

                            <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                            <button type="submit" name="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Simpan</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


      
        
        <script type="text/javascript">
            $(function() {
				$("#example2").dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": true
                });
				$( "#tgl_lhr" ).datepicker();
            });
        </script>
		
