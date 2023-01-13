<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('admin')); ?>">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <a href="<?php echo e(url('admin')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-history"></i> Data Transaksi</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Jumlah Harga</th>
                                        <th>Terkonfirmasi</th>
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
                                            <td><?php echo e($pesanan->user->name); ?></td>
                                            <td><?php echo e($pesanan->tanggal); ?></td>
                                            <td>
                                                <?php if($pesanan->status == 1): ?>
                                                    Sudah Dibayar
                                                <?php else: ?>
                                                    Belum Dibayar
                                                <?php endif; ?>
                                            </td>
                                            <td class="pt-1">
                                                <?php if($pesanan->bukti == null): ?>
                                                    Tidak Ada Bukti
                                                <?php else: ?>
                                                    <img src="<?php echo e(url('bukti')); ?>/<?php echo e($pesanan->bukti); ?>" class="img-fluid"
                                                        width="200">
                                                <?php endif; ?>

                                            </td>
                                            <td>Rp. <?php echo e(number_format($pesanan->jumlah_harga + $pesanan->kode)); ?></td>
                                            <td>
                                                <?php if($pesanan->konfirmasi_admin == 0): ?>
                                                    <i
                                                        class="fas fa-window-close btn btn-sm btn-danger d-flex justify-content-center disabled"></i>
                                                <?php else: ?>
                                                    <i
                                                        class="fas fa-check btn btn-sm btn-success d-flex justify-content-center disabled"></i>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('transaksi')); ?>/<?php echo e($pesanan->id); ?>"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-info"></i>
                                                    Detail</a>
                                                <form action="<?php echo e(url('transaksi')); ?>/<?php echo e($pesanan->id); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php if($pesanan->konfirmasi_admin == 0 and $pesanan->bukti == true): ?>
                                                        <br><button type="submit" class="btn btn-sm btn-success"><i
                                                                class="fas fa-check"></i> Konfirmasi</button>
                                                    <?php endif; ?>

                                                </form>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Krypton\Desktop\blog\resources\views/admin/transaksi.blade.php ENDPATH**/ ?>