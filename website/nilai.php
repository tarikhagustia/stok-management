<?php
if(isset($_GET['id_guru'])){
	
	$id_guru=$_GET['id_guru'];
	$id_kelas=$_GET['id_kelas'];
	$id_pelajaran=$_GET['id_pelajaran'];
	
	$query=mysql_query("select * from tbl_nilai where id_guru='$id_guru' and id_kelas='$id_kelas' and id_pelajaran='$id_pelajaran'");
	$cek=mysql_num_rows($query);
	
	if($cek=='0'){
		//kalo belum ada mode input
		?><script language="javascript">document.location.href="?page=nilai_simpan&id_guru=<?php echo $id_guru;?>&id_pelajaran=<?php echo $id_pelajaran;?>&id_kelas=<?php echo $id_kelas;?>";</script><?php
	}else{
		//kalo sudah ada mode update
		?><script language="javascript">document.location.href="?page=nilai_update&id_guru=<?php echo $id_guru;?>&id_pelajaran=<?php echo $id_pelajaran;?>&id_kelas=<?php echo $id_kelas;?>";</script><?php
	}
	
}else{
	unset($_POST['id_guru']);
}


?>
<?php
if($domain=='siswa'){
?>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Nilai
                        <small>Hasil Nilai</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Nilai</a></li>
                        <li class="active">Hasil Nilai
                    </li></ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 <div class="row">
                  <div class="col-xs-12">
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Hasil Nilai</h3>                                    
                                </div><!-- /.box-header -->
								<div class="box-footer clearfix">
                                
                                
                                    
                                </div>
                                <div class="box-body">
                                <div class="box-body table-responsive">
                                <?php
		
							$id_siswa=$_SESSION['id_siswa'];
							$siswa=mysql_fetch_array(mysql_query("select siswa.nama_siswa, siswa.nis, kelas.nama_kelas from tbl_ruangan ruangan, data_siswa siswa, setup_kelas kelas where ruangan.id_siswa=siswa.id_siswa and ruangan.id_siswa='$id_siswa' and ruangan.id_kelas=kelas.id_kelas"));
							
							$nama_siswa=$siswa['nama_siswa'];
							$nis=$siswa['nis'];
							$nama_kelas=$siswa['nama_kelas'];
							echo "Assalamu'alaikum $nama_siswa, dibawah adalah nilai kamu !";
		?>
                                
                                
                                  <table class="table table-bordered">
                                        <tr>
                                            <th width="20" style="width: 10%">No</th>
                                            <th width="89">Nama Pelajaran</th>
                                            <th width="72" style="width: 40px">Nilai (Angka)</th>
                                        </tr>
                                        <tr>
                                        <?php
		$view=mysql_query("SELECT nama_pelajaran, nilai FROM tbl_nilai nilai, setup_pelajaran pelajaran WHERE nilai.id_siswa='$id_siswa' and nilai.id_pelajaran=pelajaran.id_pelajaran order by pelajaran.nama_pelajaran asc");
		
		$i = 1;
		while($row=mysql_fetch_array($view)){
			?>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['nama_pelajaran'];?></td>
                                            <td><?php echo $row['nilai'];?></td>
                                            
                                        </tr>
                                        <?php
											$i++;
			
			$nilai=$row['nilai'];
			
			$total=$total+$nilai;
		}
											?>
                                        <tr>
                                            <th colspan="2" align="center" style="text-align: center">Jumlah</th>
                                            <th  colspan="2" align="center" style="text-align: center"><?php echo $total;?></th>
                                        </tr>
                                    </table>
                                    
                                    <!--- Edit modal -->
		
        
		
		
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        </div>
                        </div>
                    

                </section><!-- /.content -->
            </aside>
<?php
}
if($domain=='guru'){
?>

<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Nilai
                        <small>Input Nilai</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Nilai</a></li>
                        <li class="active">Input Nilai
                    </li></ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 <div class="row">
                  <div class="col-xs-12">
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Input Nilai</h3>                                    
                                </div><!-- /.box-header -->
								<div class="box-footer clearfix">
                               
                                <div class="alert alert-info alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Langkah Pertama!</b> Silahkan Pilih Mata Pelajaran.
                                    </div>
                                    
                                
                                </div>
                                <div class="box-body">
                                <div class="box-body table-responsive">
                             
                                  <table class="table table-bordered">
                                        <tr>
                                            <th width="20" style="width: 10%">No</th>
                                            <th width="89">Nama Pelajaran</th>
                                            <th width="72" style="width: 40px">Kelas</th>
                                        </tr>
										<?php
		$id_guru=$_SESSION['id_guru'];
		$view=mysql_query("select * from tbl_jadwal jadwal, setup_kelas kelas, setup_pelajaran pelajaran where jadwal.id_kelas=kelas.id_kelas and jadwal.id_pelajaran=pelajaran.id_pelajaran and jadwal.id_guru='$id_guru' order by id_jadwal asc");
		
		$no=0;
		while($row=mysql_fetch_array($view)){
		?>
                                        <tr>
            <td><?php echo $no=$no+1;?></td>
            <td><a href="?page=nilai&id_guru=<?php echo $id_guru;?>&id_pelajaran=<?php echo $row['id_pelajaran'];?>&id_kelas=<?php echo $row['id_kelas'];?>" style="text-decoration:underline" title="Pilih Mata Pelajaran"><?php echo $row['nama_pelajaran'];?></a></td>
            <td><?php echo $row['nama_kelas'];?>
            </td>
        </tr>
		<?php
		}
		?>
                                        <tr>
                                            
                                        </tr>
                                    </table>
                                    
                                    <!--- Edit modal -->
		
        
		
		
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        </div>
                        </div>
                    

                </section><!-- /.content -->
            </aside>


<?php
}
?>