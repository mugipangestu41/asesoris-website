<?= $this->extend('v_template2'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MUGI SHOP YGY</title>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-9">
          
              
                <br />
            </div>
            <!-- /.col -->
            

            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
              
                <!-- /.div -->
                <div>
                    <a href="#" class="list-group-item active list-group-item-success">Clothing & Wears
                    </a>
                    <ul class="list-group">

                        <li class="list-group-item">Women's Accessories
                             <span class="label label-danger pull-right">300</span>
                        </li>
                        <li class="list-group-item">Men's Accessories
                             <span class="label label-success pull-right">340</span>
                        </li>
                        <li class="list-group-item">Kid's Accessories
                             <span class="label label-info pull-right">735</span>
                        </li>

                    </ul>
                </div>
                <!-- /.div -->
      
        
                <!-- /.div -->
     
                <!-- /.div -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Women's Accessories</li>
                        <li class="active">Accessories</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                     
                        <div class="btn-group">
                         
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                <?php foreach ($produk as $p) : ?>
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                        <img src="<?= base_url() . "/uploads/" . $p['foto']; ?>" >
                            <div class="caption">
                                <h3><a href="#"><?= $p['nama'] ?></a></h3>
                                <p>Price : <strong><?= $p['harga'] ?></strong>  </p>
                                <p>Price : <strong><?= $p['berat'] ?> gram</strong>  </p>
                                <p>Stock : <strong><?= $p['qty'] ?></strong>  </p>
                                <p><?= $p['detail'] ?>   </p>
                               
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <!-- /.col -->
       
                    <!-- /.col -->
      
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
                <!-- /.row -->
             
                <!-- /.div -->
                <div class="row">
        
                <!-- /.row -->
            
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    </div>
    <!-- /.container -->


  
</body>
</html>
<?= $this->endSection(); ?>