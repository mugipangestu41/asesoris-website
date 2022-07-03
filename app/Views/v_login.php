<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Login Admin</title>
  
 
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('css/bootstrap.css')?>" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="<?= base_url('css/font-awesome.min.css')?>" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="<?= base_url('ItemSlider/css/main-style.css')?>" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="<?= base_url('css/style.css')?>" rel="stylesheet" />

 
 
  

</head>
 
<body class="text-center">
 
    <main class="form-signin">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                &nbsp
            </div>
        
   
            <div class="col-md-4">
        <form method="post" action="<?= base_url(); ?>/login/process">
            <?= csrf_field(); ?>
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <input type="text" name="noanggota" id="noanggota" placeholder="No Anggota" class="form-control" required autofocus><br>
            <input type="text" name="username" id="username" placeholder="Username" class="form-control" required autofocus><br>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
            <br><button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
            
        </form>
        </div>
        </div>
    </main>
 
 
 
</body>
 
</html>