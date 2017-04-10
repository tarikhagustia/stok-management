<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8" /> 
    <title>
        Employee Log-in
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."asset/css/style.css"?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."asset/css/not.css"?>" />
</head>
<body>

<form action="<?php echo base_url(). "index.php/login/login_do"; ?>" method="post" enctype="multipart/form-data">
  <h1>Employer Log in </h1>  
  
  <div class="inset">

 <?php echo $this->session->flashdata('pesan'); ?>
  <p>
    <label for="email">USERNAME</label>
    <input type="text" name="username" id="usr_username">
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input type="password" name="password" id="usr_password">
  </p>
  <p>
    <input type="checkbox" name="remember" id="remember">
    <label for="remember">Remember me for 14 days</label>
  </p>
  </div>
  <p class="p-container">
    <!-- <span>Forgot password ?</span> -->
    <input type="submit" name="login" id="login" value="Log in">
  </p>
</form>

</body>
</html>
