
<?= $this->extend('v_template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-2">
</div>
<div class="col-md-4">
<form method="post" action="<?=base_url('c_tampil/CekOngkir')?>">
<h1>Pengiriman</h1>


<label>Dari (Kode Pos Awal)</label>
<input type="text" name="kodepos_awal" class="form-control" required="required" value="40552" readonly>
<label>Ke (Kode Pos Akhir)</label>
<input type="text" name="kodepos_akhir" class="form-control" required="required"><br>
<input type="hidden" name="total" class="form-control"  value="<?php if(isset($tot)){ echo $tot;}?> <?php if(isset($tot_harga)){ echo $tot_harga;}?>"  ><br>
<input type="submit" class="btn btn-primary"value="Cek Ongkir">
</form>
</div>
<?php
if(isset($convert)){


?>
<div class="col-md-4">



<form method="post" action="<?=base_url('c_tampil/inputTrx')?>">


<h1>Alamat Tujuan</h1>
<label>Nama</label>
<input type="text" name="nama" class="form-control" required="required">
<label>No HP</label>
<input type="number" name="no_hp" class="form-control" required="required">
<label>Alamat</label>
<input type="text" name="alamat" class="form-control" required="required">
<label>Kecamatan</label>
<input type="text" name="kecamatan" class="form-control" required="required">
<label>Kabupaten/Kota</label>
<input type="text" name="kabupaten" class="form-control" required="required">
<label>Total Harga Barang</label>
<input type="text" name="total" class="form-control" value="<?php if(isset($tot)){ $tot2 = $tot; echo $tot;}?> <?php if(isset($tot_harga)){ echo $tot_harga;}?>" readonly>
<br>
<?php
if(isset($bo)){
    ?>
Berat:  <?php echo $kilogram?> gram (<?php echo $bo?> Kg)<br>
<?php    
}
?>
<label>Ongkir</label>
<input type="text" name="total" class="form-control"  required="required" value="<?php if(isset($convert)){ echo $convert;}?>" readonly >
<label>Total Pembayaran</label>
<input type="text" name="total_pembayaran" class="form-control"  value="<?php if(isset($convert)){ echo $convert+$tot_harga;}?>" readonly ><br>


<input type="submit" class="btn btn-primary"value="Simpan">
<?php
}
?>
</div>

  
<div class="col-md-4">
    &nbsp
</div>
</form>
<?= $this->endSection(); ?>