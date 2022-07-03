<?= $this->extend('v_template'); ?>
<?= $this->section('content'); ?>
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
<div class="col-md-3 text-center col-sm-6 col-xs-6">
</div>
<div class="col-md-6 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">

<h3>INVOICE</h3>

                        <table class='table table-striped'>
<tr >


<td>Tanggal Penjualan</td>
<td>Nama</td>
<td>No HP</td>
<td>alamat</td>
<td>Kecamatan</td>  
<td>Kabupaten</td> 
<td>Total Belanja</td> 

</tr>
<?php


?>


        		<tr>
        			
        			<td><?php echo $tanggal_penjualan; ?></td>
        			<td><?php echo $nama; ?></td>
                    <td><?php echo $no_hp;?></td>
                    <td><?php echo $alamat;?></td>
                    <td><?php echo $kecamatan;?></td>
                    <td><?php echo $kabupaten;?></td>
                    <td><?php echo $total_belanja;?></td>


        		</tr>
        

            <?php ?>
<tr>

</tr>

</table>

<p><a class="btn btn-primary" href="<?=base_url("");  ?>" class="btn btn-success" role="button">Kembali Belanja</a> </p>


</div>
</div> 







<?= $this->endSection(); ?>