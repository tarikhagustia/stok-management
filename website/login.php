<?php  session_start();

include "koneksi/conn.php";

if (isset($_POST['login'])){
	//koneksi terpusat

	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$domain=$_POST['domain'];
	
	if($domain=="admin"){
		$query=mysql_query("select * from user_admin where username='$username' and password='$password'");
		$cek=mysql_num_rows($query);
		$row=mysql_fetch_array($query);
		$id_admin=$row['id_admin'];
		$nama_admin=$row['nama_admin'];
		
		
		
		if($cek){
			$_SESSION['username']=$username;
			$_SESSION['id_admin']=$id_admin;
			$_SESSION['nama_admin']=$nama_admin;
			$_SESSION['domain']=$domain;
			$_SESSION['waktu']=date("Y-m-d H:i:s");
			
			?><script language="javascript">document.location.href="index.php";</script><?php
			
		}else{
			?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
		}	
	}
	
	if($domain=="guru"){
		$query=mysql_query("select * from data_guru where username='$username' and password='$password'");
		$cek=mysql_num_rows($query);
		$row=mysql_fetch_array($query);
		$id_guru=$row['id_guru'];
		$nama_guru=$row['nama_guru'];
		$kelamin=$row['kelamin'];
		
		
		if($cek){
			$_SESSION['username']=$username;
			$_SESSION['id_guru']=$id_guru;
			$_SESSION['nama_guru']=$nama_guru;
			$_SESSION['kelamin']=$kelamin;
			$_SESSION['waktu']=date("Y-m-d H:i:s");
			$_SESSION['domain']=$domain;
			
			?><script language="javascript">document.location.href="index.php";</script><?php
			
		}else{
			?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
		}
	}
	
	if($domain=="siswa"){
		$query=mysql_query("select * from data_siswa where username='$username' and password='$password'");
		$cek=mysql_num_rows($query);
		$row=mysql_fetch_array($query);
		$id_siswa=$row['id_siswa'];
		$nama_siswa=$row['nama_siswa'];
		$kelamin=$row['kelamin'];
		
		
		if($cek){
			$_SESSION['username']=$username;
			$_SESSION['id_siswa']=$id_siswa;
			$_SESSION['nama_siswa']=$nama_siswa;
			$_SESSION['kelamin']=$kelamin;
			$_SESSION['waktu']=date("Y-m-d H:i:s");
			$_SESSION['domain']=$domain;
			
			?><script language="javascript">document.location.href="index.php";</script><?php
			
		}else{
			?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
		}
	}
			
}else{
	unset($_POST['login']);
}
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="login.php" method="post" enctype="multipart/form-data">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="User ID" id="username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="domain">
                          <option value="admin">Administrator</option>
                          <option value="siswa">Siswa/i</option>
                          <option value="guru">Pegawai</option>
                    </select>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button name="login" type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p><a href="#">I forgot my password</a></p>
                    
                    <a href="pages/examples/register.html" class="text-center">Register a new membership</a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>