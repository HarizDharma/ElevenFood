<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <a href="<?php echo e(url('home')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                        
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        <?php $__currentLoopData = $pesanan_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td align="left"><?php echo e($no++); ?></td>
                                                <td>
                                                    <img src="<?php echo e(url('uploads')); ?>/<?php echo e($pesanan_detail->barang->gambar); ?>"
                                                        class="img-fluid" width="120">
                                                </td>
                                                <td align="left"><?php echo e($pesanan_detail->barang->nama_barang); ?></td>
                                                <td align="left"><?php echo e($pesanan_detail->jumlah); ?></td>
                                                <td align="left">Rp. <?php echo e(number_format($pesanan_detail->barang->harga)); ?>

                                                </td>
                                                <td align="left">Rp. <?php echo e(number_format($pesanan_detail->jumlah_harga)); ?>

                                                </td>
                                                <td>
                                                    <form action="<?php echo e(url('check_out')); ?>/<?php echo e($pesanan_detail->id); ?>"
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Anda yakin menghapus pesanan ini ?');">
                                                            <i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td align="right" colspan="5"><strong>Jumlah Harga : </strong></td>
                                            <td><strong>Rp. <?php echo e(number_format($pesanan->jumlah_harga)); ?></strong></td>
                                            <td>
                                                <a href="<?php echo e(url('konfirmasi-pembayaran')); ?>" class="btn btn-success"
                                                    onclick="return confirm('Anda yakin melanjutkan ke pembayaran ?');">
                                                    <i class="fa fa-shopping-cart"></i> Check Out
                                                </a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Krypton\Desktop\blog\resources\views/pesan/check_out.blade.php ENDPATH**/ ?>