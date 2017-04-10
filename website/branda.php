<?php
//include "koneksi/conn.php";
$sql=mysql_query("SELECT * FROM data_siswa");
$row=mysql_fetch_array($sql);
$jml_siswa=mysql_num_rows($sql);
?>          
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        150
                                    </h3>
                                    <p>
                                        New Orders
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        53<sup style="font-size: 20px">%</sup>
                                    </h3>
                                    <p>
                                        Bounce Rate
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                       <?php echo $jml_siswa; ?>
                                    </h3>
                                    <p>
                                        Siswa Teregistrasi
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        65
                                    </h3>
                                    <p>
                                        Unique Visitors
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
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
                    </div><!-- /.row -->

                  

                   
                            </div><!-- /.box -->

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            

    