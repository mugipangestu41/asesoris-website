<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MUGI SHOP YGY</title>
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
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          
                <a class="navbar-brand" href="<?php echo base_url('');?>"><strong>MUGI</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('c_tampil/v_inputBarang');?>">Input Barang</a></li>
                   
                    <li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
                    

                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?= $this->renderSection('content'); ?>
    <!--Footer -->
    <div class="col-md-12 footer-box">
    <div class="col-md-12 download-app-box text-center">

<span class="glyphicon glyphicon-download-alt"></span>Download Our Android App and Get 10% additional Off on all Products . <a href="#" class="btn btn-danger btn-lg">DOWNLOAD  NOW</a>

</div>

 
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2021 | &nbsp; All Rights Reserved | &nbsp; mugi pangestu |
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    
    <script src="<?= base_url('js/js/jquery-1.10.2.js')?>"></script>
    <!--bootstrap JavaScript file  -->
    <script src="<?= base_url('js/bootstrap.js')?>"></script>
    <!--Slider JavaScript file  -->
    <script src="<?= base_url('ItemSlider/js/modernizr.custom.63321.js')?>"></script>
    <script src="<?= base_url('ItemSlider/js/jquery.catslider.js')?>"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
</body>
</html>
