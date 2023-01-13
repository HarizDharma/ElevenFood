<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('history')); ?>">Riwayat Pemesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <a href="<?php echo e(url('history')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Sukses Check Out</h3>
                        <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening
                            dengan nominal : <strong>Rp.
                                <?php echo e(number_format($pesanan->kode + $pesanan->jumlah_harga)); ?></strong>
                        </h5>
                        <label>
                            <h5><strong>Metode Pembayaran : </strong></h5>
                            <h5><strong>Atas Nama : SISTAHANA SARI DEWI</strong></h5>
                        </label>
                        <ul>
                            <li><strong>DANA : 0888 3215 6667</strong></li>
                            <li><strong>OVO : 0888 3215 6667</strong></li>
                        </ul>
                        <br>
                        <h5>Setelah mentransfer pembayaran silahkan upload bukti pembayaran pada form berikut ini :
                        </h5>
                        <div class="row col-md-12 mt-4">
                            <div class="col-md-4">
                                <?php if(count($errors) > 0): ?>
                                    <div class="alert alert-danger">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($error); ?> <br />
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($pesanan->bukti == null and $pesanan->status == 0): ?>
                                    <form class="form-group" action="<?php echo e(url('history')); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="file" name="file" class="form-control" required><br>

                                        <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                                    </form>
                                <?php else: ?>
                                    <span class="alert alert-success">
                                        <i class="fas fa-check"></i> Pembayaran Anda Sudah Selesai !
                                    </span>
                                    <hr>
                                    <img src="<?php echo e(url('bukti')); ?>/<?php echo e($pesanan->bukti); ?>" class="img-fluid">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4 ml-5 my-auto">
                                <h5 class="card-header">Tunggu Pembayaran Anda Dikonfirmasi Oleh Admin :</h5>

                                <h5>
                                    <?php if($pesanan->konfirmasi_admin == 1): ?>
                                        <div class="alert alert-success"><i class="fas fa-check"></i> Pembayaran Anda Sudah
                                            Dikonfirmasi</div>
                                    <?php else: ?>
                                        <div class="alert alert-info"><i class="fas fa-times"></i> Pembayaran Anda
                                            Belum Dikonfirmasi</div>
                                    <?php endif; ?>

                                </h5>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                        
                        <?php if(!empty($pesanan)): ?>
                            <p align="right">Tanggal Pesan : <?php echo e($pesanan->tanggal); ?></p>
                            <div class="col-md-12">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Pesanan</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        <?php $__currentLoopData = $pesanan_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td align="left"><?php echo e($no++); ?></td>
                                                <td align="left">
                                                    <img src="<?php echo e(url('uploads')); ?>/<?php echo e($pesanan_detail->barang->gambar); ?>"
                                                        class="img-fluid" width="120">
                                                </td>
                                                <td align="left"><?php echo e($pesanan_detail->barang->nama_barang); ?></td>
                                                <td align="left"><?php echo e($pesanan_detail->jumlah); ?></td>
                                                <td align="left">Rp. <?php echo e(number_format($pesanan_detail->barang->harga)); ?>

                                                </td>
                                                <td align="left">Rp. <?php echo e(number_format($pesanan_detail->jumlah_harga)); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td align="right" colspan="5"><strong>Jumlah Harga : </strong></td>
                                            <td><strong>Rp. <?php echo e(number_format($pesanan->jumlah_harga)); ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td align="right" colspan="5"><strong>Kode Unik : </strong></td>
                                            <td><strong>Rp. <?php echo e(number_format($pesanan->kode)); ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td align="right" colspan="5"><strong>Total Yang Harus Ditransfer :
                                                </strong></td>
                                            <td><strong>Rp.
                                                    <?php echo e(number_format($pesanan->kode + $pesanan->jumlah_harga)); ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Krypton\Desktop\blog\resources\views/history/detail.blade.php ENDPATH**/ ?>