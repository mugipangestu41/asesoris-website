<?= $this->extend('v_template2'); ?>


<?= $this->section('content'); ?>
    <div class="container">
        <form action="<?=base_url('c_tampil/create')?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_kota">Kategori</label>
                <input type="text" class="form-control"  name="kategori" placeholder="Masukkan Kategori">
            </div>
            <div class="form-group">
                <label for="nama_kota">Nama Barang</label>
                <input type="text" class="form-control"  name="nama" placeholder="Masukkan Nama Barang">
            </div>
            <div class="form-group">
                <label for="rata_rata_suhu">Detail</label>
                <input type="text" class="form-control"  name="detail" placeholder="Masukkan Detail Barang">
            </div>
            <div class="form-group">
                <label for="rata_rata_suhu">Harga</label>
                <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga">
            </div>
      
            <div class="form-group">
                        <label for="berkas" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" >
             </div>

            <div class="form-group">
                <label for="rata_rata_suhu">Quantity</label>
                <input type="text" class="form-control"  name="qty" placeholder="Masukkan Banyak Barang">
            </div>
            <div class="form-group">
                <label for="rata_rata_suhu">Berat</label>
                <input type="text" class="form-control"  name="berat" placeholder="Masukkan Berat dalam Gram">
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?= $this->endSection(); ?>