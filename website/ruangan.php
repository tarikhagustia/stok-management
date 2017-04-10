<?php

//include "koneksi/conn.php";

if(isset($_POST['submit'])){
	$nama_kelas=strtoupper($_POST['nama_kelas']);
	$query=mysql_query("INSERT INTO setup_kelas values('','$nama_kelas')");
		
	if($query){
		?><script language="javascript">document.location.href="?page=ruangan&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=ruangan&status=0";</script><?php
	}
	
}else{
	unset($_POST['submit']);
}

?>
<?php
$hapus_kelas=$_GET['hapus_kelas'];
if(isset($_GET['hapus_kelas'])){
$query=mysql_query("DELETE FROM setup_kelas WHERE id_kelas='$hapus_kelas'");
if($query){
		?><script language="javascript">document.location.href="?page=ruangan&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=ruangan&status=0";</script><?php
	}
	}
?>

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelengkapan
                        <small>Ruangan Kelas</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Kelengkapan</a></li>
                        <li class="active">Ruangan Kelas
                    </li></ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Ruangan Kelas</h3>                                    
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
								<button data-toggle="modal" data-target="#compose-modal" type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Ruangan Baru</button>
                                    
                                </div>
                                <div class="box-body table-responsive">
                                
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
								$query=mysql_query("SELECT * FROM setup_kelas ORDER BY nama_kelas ASC");
								$no=0;
								
								
										while($data=mysql_fetch_array($query)) {
										?>
                                            <tr>
                                                <td><?php echo $no=$no+1; ?></td>
                                                <td><?php echo $data['nama_kelas']; ?></td>
                                                <td>
                                                <div class="tools">
                                               
												<a href="?page=ruangan&hapus_kelas=<?php echo $data['id_kelas']; ?>">
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
                                                <th>Nama Kelas</th>
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
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i>Pelajaran</h4>
                    </div>
        <div class="modal-body">            
        <form action="?page=ruangan" method="post" enctype="multipart/form-data">
       		
        		<div class="form-group">
       			<div class="input-group">
      			<span class="input-group-addon">Nama Kelas:</span>
        		<input name="nama_kelas" placeholder="Nama Kelas .." class="form-control" id="nama_kelas" />
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
        
        

		
		
        <!-- jQuery 2.0.2 -->
     