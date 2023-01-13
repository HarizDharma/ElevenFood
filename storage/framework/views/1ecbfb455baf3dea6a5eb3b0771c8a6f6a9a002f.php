<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img class="rounded mx-auto d-block" src="<?php echo e(url('images/logo.png')); ?>" width="200" alt="">
            </div>
            <div class="col-md-6">
                <span>
                    <h1>
                        <strong>
                            Selamat Datang di Eleven Food
                        </strong>
                        </h2>
                </span><br>
                <span>
                    <h4>
                        Silahkan pilih menu yang kalian inginkan atau kesukaan kalian.
                    </h4>
                    <h4>Selamat Menikmati...</h4>
                </span>
            </div>
            <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="card-deck">
                        <div class="card mt-5" style="width: 18rem;">
                            <img class="card-img-top" src="<?php echo e(url('uploads')); ?>/<?php echo e($barang->gambar); ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($barang->nama_barang); ?></h5>
                                <div class="card-text">
                                    <strong>Harga : </strong>Rp. <?php echo e(number_format($barang->harga)); ?> <br>
                                    <hr>
                                    <strong>Keterangan : </strong> <br>
                                    <div class="deskripsi"><?php echo e(Str::limit($barang->keterangan, 40)); ?></div>
                                </div>
                                <br>
                                <a href="<?php echo e(url('pesan')); ?>/<?php echo e($barang->id); ?>" class="btn btn-primary"><i
                                        class="fa fa-shopping-cart"></i> Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Krypton\Desktop\blog\resources\views/home.blade.php ENDPATH**/ ?>