<?php

include "koneksi/conn.php";

if(isset($_POST['submit'])){
	
	$id_siswa=$_POST['id_siswa'];
	$id_kelas=$_POST['id_kelas'];
	
	$query=mysql_query("insert into tbl_ruangan values('','$id_siswa','$id_kelas')");
	
	if($query){
		?><script language="javascript">document.location.href="?page=ruang_kelas&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=ruang_kelas&status=0";</script><?php
	}
	
}else{
	unset($_POST['submit']);
}


?>
<?php
$hapus_siswa_kelas=$_GET['hapus_siswa_kelas'];
if(isset($_GET['hapus_siswa_kelas'])){
$query=mysql_query("DELETE FROM data_siswa WHERE id_siswa='$hapus_siswa_kelas'");
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
                        <small>Pembagian Ruangan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Kesiswaan</a></li>
                        <li class="active">Pembagian Ruangan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Pembagian Kelas</h3>                                    
                                </div><!-- /.box-header -->
                                <?php
								
							if($_GET['status']=='2'){
								?>
                                <div class="alert alert-info alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Langkah 2!</b> Silahkan Tetapkan Kelas
                                    </div>
                                <?php
								}
							if($_GET['status']=='1'){
								?>
                                <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Berhasil!</b> Siswa berhasil ditambahkan
                                    </div>
                                    <?php
							}
								if($_GET['status']=='0'){
								?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Pringatan!</b> Data Tidak Dapat Disimpan. Mungkin anda Memasukkan 2 Nama Pada satu Kelas Maupun Sebaliknya. jika anda tidak Mengerti silahkan hubungi WebMaster.
                                    </div>
                                    <?php
								}
									?>
								<div class="box-footer clearfix">
								<button data-toggle="modal" data-target="#compose-modal" type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Tetapkan Kelas !</button>
                                    
                                </div>
                                <div class="box-body table-responsive">
                                
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
											<th>No</th>
                                              <th>Nama Siswa</th>
                                                <th>NIS</th>
                                                <th>Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
								$query=mysql_query("select * from tbl_ruangan ruangan, setup_kelas kelas, data_siswa siswa where ruangan.id_kelas=kelas.id_kelas and ruangan.id_siswa=siswa.id_siswa order by id_ruangan asc ");
								
								
										$no=0;
										while($data=mysql_fetch_array($query)) {
										?>
                                            <tr>
											<td><?php echo $no=$no+1; ?></td>
                                              <td><?php echo $data['nama_siswa']; ?></td>
                                                <td><?php echo $data['nis'];
 ?></td>
                                                <td><?php echo $data['nama_kelas']; ?></td>
                                                <td>
												<div class="tools">
                                               
												<a href="?page=ruang_kelas&hapus_siswa_kelas=<?php echo $data['id_siswa']; ?>">
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
                                              <th>Nama Siswa</th>
                                                <th>NIS</th>
                                                <th>Kelas</th>
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
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Compose New Message</h4>
                    </div>
                    <form action="?page=ruang_kelas" method="post">
                        <div class="modal-body">
      
  
                <div class="form-group">
				<div class="input-group">
<span class="input-group-addon">Nama Siswa</span>
					<select name="id_siswa"  class="form-control" id="id_siswa">
                
                      <?php
					  $siswa=mysql_query("select * from data_siswa ORDER by nama_siswa ASC");
					  while($row1=mysql_fetch_array($siswa)){
					  ?>
                        <option value="<?php echo $row1['id_siswa']; ?>"><?php echo $row1['nama_siswa']; ?></option>
                        <?php
					  }
						?>
                     </select>
				</div>
				</div>
                <div class="form-group">
				<div class="input-group">
                                    <span class="input-group-addon">Kelas</span>
				<select name="id_kelas"  class="form-control" id="id_kelas">
                
                          <?php
						  $kelas=mysql_query("select * from setup_kelas order by nama_kelas asc");
						  while($row2=mysql_fetch_array($kelas)){
						  ?>
                        <option value="<?php echo $row2['id_kelas']; ?>"><?php echo $row2['nama_kelas']; ?></option>
                        <?php
					  }
						?>
                     </select>
                     
				</div>
                <p class="help-block">*Satu Siswa Hanya Bisa Menempati Satu kelas</p>
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
            });
        </script>