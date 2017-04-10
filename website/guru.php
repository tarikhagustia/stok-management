<?php

//include "koneksi/conn.php";
$timestamp=strtotime("now");
$name=$_FILES['foto']['name'];
$type=$_FILES['foto']['type'];
if(isset($_POST['submit'])){
	
	$nama_guru=ucwords(htmlentities($_POST['nama_guru']));
	$tmp_lhr=htmlentities($_POST['tmp_lhr']);
	$tgl_lhr=($_POST['tgl_lhr']);
	$nip=htmlentities($_POST['nip']);
	$kelamin=htmlentities($_POST['kelamin']);
	$alamat_guru=ucwords(htmlentities($_POST['alamat_guru']));
	$telpon_guru=strtoupper(htmlentities($_POST['telpon_guru']));
	$username=htmlentities($_POST['username']);
	$password=md5(htmlentities($_POST['password']));
	$file_name="$nama_guru".".jpg";
	$foto="img/guru/$file_name";
	$src=$_FILES['foto']['tmp_name'];
	copy($src,$foto);
	
	$query=mysql_query("insert into data_guru values('','$nama_guru','$tmp_lhr','$tgl_lhr','$nip','$kelamin','$alamat_guru','$telpon_guru','$username','$password','$foto')");
	
	if($query){
		?><script language="javascript">document.location.href="?page=guru&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=guru&status=0";</script><?php
	}
	
}else{
	unset($_POST['submit']);
}

?>
<?php
if(isset($_POST['simpan'])){
	$id_guru=$_POST['id_guru'];
	$nama_guru=ucwords(htmlentities($_POST['nama_guru']));
	$tmp_lhr=htmlentities($_POST['tmp_lhr']);
	$tgl_lhr=($_POST['tgl_lhr']);
	$nip=htmlentities($_POST['nip']);
	$kelamin=htmlentities($_POST['kelamin']);
	$alamat_guru=ucwords(htmlentities($_POST['alamat_guru']));
	$telpon_guru=strtoupper(htmlentities($_POST['telpon_guru']));
	$username=htmlentities($_POST['username']);
	$password=md5(htmlentities($_POST['password']));
	$file_name="$nama_guru".".jpg";
	$foto="img/guru/$file_name";
	$src=$_FILES['foto']['tmp_name'];
	copy($src,$foto);
	
	$query=mysql_query("UPDATE data_guru SET nama_guru='$nama_guru', tmp_lhr='$tmp_lhr', tgl_lhr='$tgl_lhr',  nip='$nip', kelamin='$kelamin', alamat_guru='$alamat_guru', telpon_guru='$telpon_guru', username='$username', password='$password', foto='$foto' WHERE id_guru='$id_guru'");

if($query){
		?><script language="javascript">document.location.href="?page=guru&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=guru&status=0";</script><?php
	}
	
	
}else{
	unset($_POST['simpan']);
}
?>
<?php
$hapus_guru=$_GET['hapus_guru'];
if(isset($_GET['hapus_guru'])){
$query=mysql_query("DELETE FROM data_guru WHERE id_guru='$hapus_guru'");

if($query){
		?><script language="javascript">document.location.href="?page=guru&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=guru&status=0";</script><?php
	}
	
	}else{
	unset($_GET['hapus_guru']);
	}

?>

 
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kepegawaian
                        <small>Data Guru</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Kepegawaian</a></li>
                        <li class="active">Data Guru
                    </li></ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Guru Yang Terdaftar</h3>                                    
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
									?>
								<button data-toggle="modal" data-target="#compose-modal" type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Guru Baru</button>
                                    
                                </div>
                                <div class="box-body table-responsive">
                                
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
								$query=mysql_query("SELECT * FROM data_guru ORDER BY nama_guru ASC");
								$no=0;
								
								
										while($data=mysql_fetch_array($query)) {
										?>
                                            <tr>
                                                <td><?php echo $no=$no+1; ?></td>
                                                <td><?php echo $data['nama_guru']; ?></td>
                                                <td><?php echo $data['nip']; ?></td>
                                                <td><?php echo $data['kelamin']; ?></td>
                                                <td>
												<div class="tools">
                                                <a href="?page=edit&id_guru=<?php echo $data['id_guru']; ?>"
												><i title="Edit" class="fa fa-edit"></i>
												</a>
												<a href="?page=guru&hapus_guru=<?php echo $data['id_guru']; ?>">
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
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Jenis Kelamin </th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                    
                                    <!--- Edit modal -->
		
        
		
		
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
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i>Guru Baru</h4>
                    </div>
                    <form action="?page=guru" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
  					<div class="input-group">
                                    <span class="input-group-addon">Nama Guru:</span>
			                        <input name="nama_guru" placeholder="Nama Siswa .." class="form-control" id="nama_guru" />
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
<span class="input-group-addon">Nip/NUPT</span>
	<input name="nip" placeholder="Nomor Induk Siswa Nasional .." class="form-control" id="nip">
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
					<textarea placeholder="Alamat .."  name="alamat_guru" rows="3" class="form-control" id="alamat_guru"></textarea>
				</div>
				</div>
<div class="form-group">
  <div class="input-group">
	<span class="input-group-addon">Telpon</span>
	<input name="telpon_guru" placeholder="Nomor Telpon .." class="form-control" id="telpon_guru">
  </div>
  </div>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon">Username</span>
<input name="username" placeholder="Username .." class="form-control" id="username" />
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
  <span>Max Foto 1.024 Kb (1 MegaByte)</span>

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
            });
        </script>