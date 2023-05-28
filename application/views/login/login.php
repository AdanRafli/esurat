<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <meta name="description" content="Tutorial Codeigniter Membuat Hak Akses Menggunakan Jquery dan Mysql">
    <meta name="author" content="Ilmucoding">
    <title>Login</title>   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->   <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center" style="background: linear-gradient(to right, #b92b27, #1565c0);">
    <form class="form-signin bg-white" action="<?= base_url('login/proses') ?>" method="post">
    <h1 class="h3 mb-3 font-weight-normal text-muted">Login</h1>
    <img src="<?= base_url();?>assets/keqing.jpg" class="img-thumbnail" alt="pict"> 
      <input name="username" type="username" id="username" class="form-control" placeholder="Username" required autofocus>     
	  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-block text-white" style="background: linear-gradient(to right, #b92b27, #1565c0);" type="submit" >Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021 Copyright</p>
      <a class="text-muted" href="https://trakteer.id/adanrafli/"><h6>donasi</h6></a>
    </form>
  </body>
</html>