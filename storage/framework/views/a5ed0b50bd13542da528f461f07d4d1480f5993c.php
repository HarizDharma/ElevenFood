<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('admin')); ?>">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <a href="<?php echo e(url('admin')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-box"></i> Data Produk</h3>
                            <a href="<?php echo e(url('produk/tambahProduk')); ?>" class="btn btn-dark"><i class="fa fa-plus"></i>
                                Tambah Produk</a>
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($produk->nama_barang); ?></td>
                                            <td>
                                                <img src="<?php echo e(url('uploads')); ?>/<?php echo e($produk->gambar); ?>"
                                                    class="img-fluid mt-1 mb-1" width="200">
                                            </td>
                                            <td>Rp. <?php echo e(number_format($produk->harga)); ?></td>
                                            <td>
                                                <?php echo e($produk->keterangan); ?>

                                            </td>
                                            <td>
                                                <form action="<?php echo e(url('produk')); ?>/<?php echo e($produk->id); ?>" method="post"
                                                    class="form">
                                                    <?php echo csrf_field(); ?>
                                                    <?php if($produk->stok == 1): ?>
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            style="width: 100%"><i class="fa fa-times"></i>
                                                            Non-aktifkan</button>
                                                    <?php else: ?>
                                                        <button type="submit" class="btn btn-success btn-sm"
                                                            style="width: 100%"><i class="fa fa-check"></i>
                                                            Aktifkan</button>
                                                    <?php endif; ?>

                                                </form>
                                                <a href="<?php echo e(url('update')); ?>/<?php echo e($produk->id); ?>"
                                                    class="btn btn-primary btn-sm mt-3" style="width: 100%"><i
                                                        class="fa fa-edit"></i> Ubah</a>

                                                <form action="<?php echo e(url('produk')); ?>/<?php echo e($produk->id); ?>" method="post"
                                                    class="mt-2 form">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button type="submit" class="btn btn-danger btn-sm mt-2"
                                                        style="width: 100%"
                                                        onclick="return confirm('Anda yakin menghapus produk ini ?');">
                                                        <i class="fa fa-trash"></i> Hapus</button>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Krypton\Desktop\blog\resources\views/produk/index.blade.php ENDPATH**/ ?>