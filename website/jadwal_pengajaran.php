<?php

////include "koneksi/conn.php";

if(isset($_POST['submit'])){
	$id_guru=$_POST['id_guru'];
	$id_pelajaran=$_POST['id_pelajaran'];
	$id_kelas=$_POST['id_kelas'];
	
	$query=mysql_query("INSERT INTO tbl_jadwal values('','$id_guru','$id_pelajaran','$id_kelas')");
		
	if($query){
		?><script language="javascript">document.location.href="?page=jadwal_pengajaran&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=jadwal_pengajaran&status=0";</script><?php
	}
	
}else{
	unset($_POST['submit']);
}

?>
<?php
$hapus_jadwal=$_GET['hapus_jadwal'];
if(isset($_GET['hapus_jadwal'])){
$query=mysql_query("DELETE FROM tbl_jadwal WHERE id_jadwal='$hapus_jadwal'");
if($query){
		?><script language="javascript">document.location.href="?page=jadwal_pengajaran&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=jadwal_pengajaran&status=0";</script><?php
	}
	}
?>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kurikulum
                        <small>Jadwal Tenaga Pengajar</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Kurikulum</a></li>
                        <li class="active">Jadwal Tenaga Pengajar
                    </li></ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Daftar Jadwal Tenaga Pengajar</h3>                                    
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
								<button data-toggle="modal" data-target="#compose-modal" type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Jadwal Baru</button>
                                    
                                </div>
                                <div class="box-body table-responsive">
                                
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Guru</th>
                                                <th>NIP</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
								$query=mysql_query("select * from tbl_jadwal jadwal, setup_kelas kelas, setup_pelajaran pelajaran, data_guru guru where jadwal.id_kelas=kelas.id_kelas and jadwal.id_pelajaran=pelajaran.id_pelajaran and jadwal.id_guru=guru.id_guru order by id_jadwal asc");
								$no=0;
								
								
										while($data=mysql_fetch_array($query)) {
										?>
                                            <tr>
                                                <td><?php echo $no=$no+1; ?></td>
                                                <td><?php echo $data['nama_guru']; ?></td>
                                                <td><?php echo $data['nip']; ?></td>
                                                <td><?php echo $data['nama_pelajaran']; ?></td>
                                                <td><?php echo $data['nama_kelas']; ?></td>
                                                <td>
                                                <div class="tools">
                                               
												<a href="?page=jadwal_pengajaran&hapus_jadwal=<?php echo $data['id_jadwal']; ?>">
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
                                              <th>Nama Guru</th>
                                              <th>NIP</th>
                                              <th>Mata Pelajaran</th>
                                              <th>Kelas</th>
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
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i>Input Jadwal Pengajar</h4>
                    </div>
        <div class="modal-body">            
        <form action="?page=jadwal_pengajaran" method="post" enctype="multipart/form-data">
       		
        		<div class="form-group">
				<div class="input-group">
                                    <span class="input-group-addon">Nama Guru:</span>
				                    <select name="id_guru"  class="form-control" id="id_guru">
                <?php
					  $guru=mysql_query("select * from data_guru order by nama_guru asc");
					  while($row1=mysql_fetch_array($guru)){
					  ?>
                          <option value="<?php echo $row1['id_guru'];?>"><?php echo $row1['nama_guru'];?> [ <?php echo $row1['nip'];?> ] </option>
					  <?php
					  }
					  ?>
</select>
				</div>
		  </div>
                <div class="form-group">
				<div class="input-group">
                                    <span class="input-group-addon">Nama Pelajarann:</span>
				                    <select name="id_pelajaran"  class="form-control" id="id_pelajaran">
                <?php
						  $pelajaran=mysql_query("select * from setup_pelajaran order by nama_pelajaran asc");
						  while($row2=mysql_fetch_array($pelajaran)){
						  ?>
							  <option value="<?php echo $row2['id_pelajaran'];?>"><?php echo $row2['nama_pelajaran'];?></option>
						  <?php
						  }
						  ?>
</select>
				</div>
				</div>
                <div class="form-group">
				<div class="input-group">
                                    <span class="input-group-addon">Nama Kelas:</span>
				                    <select name="id_kelas"  class="form-control" id="id_kelas">
                <?php
						  $kelas=mysql_query("select * from setup_kelas order by nama_kelas asc");
						  while($row3=mysql_fetch_array($kelas)){
						  ?>
							  <option value="<?php echo $row3['id_kelas'];?>"><?php echo $row3['nama_kelas'];?></option>
						  <?php
						  }
						  ?>  
</select>
				</div>
				</div>
                <div>
                <p class="help-block">*Tidak boleh 1 Kelas, 1 Pelajaran di ajarkan oleh 2 Guru atau lebih</p>
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