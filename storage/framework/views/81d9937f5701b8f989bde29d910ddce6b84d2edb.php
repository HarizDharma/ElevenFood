<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($barang->nama_barang); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <a href="<?php echo e(url('home')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="rounded mx-auto d-block" src="<?php echo e(url('uploads')); ?>/<?php echo e($barang->gambar); ?>"
                                    width="100%" alt="">
                            </div>
                            <div class="col-md-6">
                                <h2 class="font-weight-bold"><?php echo e($barang->nama_barang); ?></h2>
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. <?php echo e(number_format($barang->harga)); ?></td>
                                        </tr>

                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td><?php echo e($barang->keterangan); ?></td>
                                        </tr>


                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td>:</td>
                                            <td>
                                                <form action="<?php echo e(url('pesan')); ?>/<?php echo e($barang->id); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="text" name="jumlah_pesanan" class="form-control"
                                                        required>
                                                    <button type="submit" class="btn btn-primary mt-2"> <i
                                                            class="fa fa-shopping-cart"></i>
                                                        Tambahkan Pesanan
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Krypton\Desktop\blog\resources\views/pesan/index.blade.php ENDPATH**/ ?>