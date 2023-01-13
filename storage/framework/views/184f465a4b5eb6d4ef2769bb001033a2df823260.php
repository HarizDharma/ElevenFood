<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <a href="<?php echo e(url('home')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Jumlah Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                <?php $__currentLoopData = $pesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($no++); ?></td>
                                        <td><?php echo e($pesanan->tanggal); ?></td>
                                        <td>
                                            <?php if($pesanan->status == 1): ?>
                                                Sudah Dibayar
                                            <?php else: ?>
                                                Belum Dibayar
                                            <?php endif; ?>
                                        </td>
                                        <td>Rp. <?php echo e(number_format($pesanan->jumlah_harga + $pesanan->kode)); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('history')); ?>/<?php echo e($pesanan->id); ?>"
                                                class="btn btn-primary btn-sm"><i class="fa fa-info"></i> Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Krypton\Desktop\blog\resources\views/history/index.blade.php ENDPATH**/ ?>