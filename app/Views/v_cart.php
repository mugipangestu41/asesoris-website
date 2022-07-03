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

<h3>Shopping Cart</h3>
<form method="post" action="<?=site_url('c_tampil/update')?>">
                        <table class='table table-striped'>
<tr >

<td>id</td>
<td>Product</td>
<td>foto</td>
<td>Price</td>
<td>Qty</td>
<td>Sub Total</td>  
<td>Berat</td> 
<td>ACTION</td>
</tr>
<?php
$tot_berat = 0;
$total = 0;

$session = \Config\Services::session();
?>


<?php foreach ($session->get('cart') as $item) : ?>
        		<tr>
        			<td><?php echo $item['id']; ?></td>
        			<td><?php echo $item['nama']; ?></td>
        			<td><img src="<?= base_url() . "/uploads/" . $item['foto'];  ?>" width="50px"></td>
        			<td><?php echo $item['harga']; ?></td>
        			<td>
                    <input type="number" name="qty[]" min="1" value="<?= $item['qty']?>" style="text-align:center; width:100px;">   
                    </td>
        			<td><?php echo $item['harga'] * $item['qty']; ?></td>
                    <?php $harga = $item['harga'] * $item['qty'];
                    
                            $total =  $total + $harga;
                            $session = session();
                         
                    ?>
                    <td><?php $berat_barang = $item['berat'] * $item['qty']; echo $berat_barang; ?> gram</td>
                    <?php
                        
                        $tot_berat = $tot_berat + $berat_barang;
                    
                    ?>

        			<td align="center">
        				<a href="../c_tampil/remove/<?= $item['id']; ?>">X</a>
                       
        			</td>
        		</tr>
        
            <?php endforeach; ?>
       
<tr>
<td colspan="5" align="right">Total</td>
<td>Rp.&nbsp<?php echo  $total;?></td>
<td><?php echo  $tot_berat;?> gram</td>
</tr>
<a href="../c_tampil/remove_all">Hapus keranjang</a>
</table>
<input type="submit" class="btn btn-primary"value="Simpan Perubahan">
<p><a class="btn btn-primary" href="<?=base_url("c_tampil/tampil_input/$total");  ?>" class="btn btn-success" role="button">Checkout</a> </p>

</form> 
</div>
</div> 







<?= $this->endSection(); ?>