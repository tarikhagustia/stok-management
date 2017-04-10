<?php
if(isset($_POST['submit'])){
	
	$jumSis = $_POST['jumlah'];
	
	
	for ($i=1; $i<=$jumSis; $i++)
	{
	   $id_siswa = $_POST['id_siswa'.$i];
	   $nilai  = $_POST['nilai'.$i];
	   
	   $id_guru = $_POST['id_guru'];
	   $id_kelas = $_POST['id_kelas'];
	   $id_pelajaran = $_POST['id_pelajaran'];
	
	   $query = "insert into tbl_nilai values('','$id_siswa','$id_pelajaran','$id_kelas','$id_guru','$nilai')";
	   $hasil=mysql_query($query);
	}
	
	if($hasil){
		?><script language="javascript">document.location.href="?page=nilai_selesai&id_guru=<?php echo $id_guru;?>&id_kelas=<?php echo $id_kelas;?>&id_pelajaran=<?php echo $id_pelajaran;?>";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=nilai_selesai&status=2";</script><?php
	}
	
}else{
	unset($_POST['submit']);
}


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
                                <?php
								if($_GET['id_guru']){
								?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Sukses !</b> Nilai Telah Disimpan .
                                    </div>
                                    <?php
								}
									?>
                                </div>
                                <div class="box-body">
                                <div class="box-body table-responsive">
                                <?php
		
		$id_guru=$_GET['id_guru'];
		$id_kelas=$_GET['id_kelas'];
		$id_pelajaran=$_GET['id_pelajaran'];
		
		$guru=mysql_fetch_array(mysql_query("select * from data_guru where id_guru='$id_guru'"));
		$kelas=mysql_fetch_array(mysql_query("select * from setup_kelas where id_kelas='$id_kelas'"));
		$pelajaran=mysql_fetch_array(mysql_query("select * from setup_pelajaran where id_pelajaran='$id_pelajaran'"));
		
		$nama_guru=$guru['nama_guru'];
		$nama_kelas=$kelas['nama_kelas'];
		$nama_pelajaran=$pelajaran['nama_pelajaran'];
		
		?>
                                <table class="table table-bordered">
        <tr>
          <th valign="top">Nama Guru</th>
          <td><input type="text" class="inp-form" name="nama_siswa" value="<?php echo $nama_guru;?>" disabled="disabled"/></td>
          <td></td>
        </tr>
         <tr>
          <th valign="top">Pelajaran</th>
          <td><input type="text" class="inp-form" name="telpon_siswa" value="<?php echo $nama_pelajaran;?>" disabled="disabled"/></td>
          <td></td>
        </tr>
        <tr>
          <th valign="top">Kelas</th>
          <td><input type="text" class="inp-form" name="nis" value="<?php echo $nama_kelas;?>" disabled="disabled"/></td>
          <td></td>
        </tr>
      </table>
      <br />
      
        <form id="mainform" action="home.php?page=nilai_selesai" method="post">
        <table class="table table-bordered">
        <tr>
            <th ><a href="">Nomor</a>	</th>
            <th ><a href="">Nama Siswa</a></th>
            <th ><a href="">NIS</a></th>
            <th><a href="">Nilai Siswa</a></th>
        </tr>
        
        
        <?php
		$view=mysql_query("SELECT * FROM tbl_ruangan ruangan, data_siswa siswa WHERE ruangan.id_siswa=siswa.id_siswa and ruangan.id_kelas='$id_kelas' order by siswa.nama_siswa asc");
		
		$i = 1;
		while($row=mysql_fetch_array($view)){
			?>
			<input type="hidden" name="id_guru" value="<?php echo $id_guru;?>" />
			<input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran;?>" />	
			<input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>" />
			<?php echo "<input type='hidden' name='id_siswa".$i."' value='".$row['id_siswa']."' />"; ?>
			<?php
		$view=mysql_query("SELECT * FROM tbl_nilai nilai, data_siswa siswa WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_guru='$id_guru' and nilai.id_kelas='$id_kelas' and nilai.id_pelajaran='$id_pelajaran' order by siswa.nama_siswa asc");
		
		$i = 1;
		while($row=mysql_fetch_array($view)){
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['nama_siswa'];?></td>
				<td><?php echo $row['nis'];?></td>
				<td><?php echo $row['nilai'];?></td>
			</tr>
			<?php
		
			$i++;
		}
		}
			$jumSis = $i-1;
		?>
        <input type="hidden" name="jumlah" value="<?php echo $jumSis ?>" />
        </table>
        <!--  end product-table................................... --> 
        </form>
                                    
                                    <!--- Edit modal -->
		
        
		
		
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        </div>
                        </div>
                    

                </section><!-- /.content -->
            </aside>