<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('admin')); ?>">Admin</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('produk')); ?>">Data Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <a href="<?php echo e(url('admin')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-box"></i> Update Data Produk</h3>

                            <form action="<?php echo e(url('updateProduk')); ?>" method="post" enctype="multipart/form-data"
                                class="form-group">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="id" value="<?php echo e($brg->id); ?>" hidden>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mt-3">Nama Produk :</label>
                                        <input type="text" name="nama_barang" class="form-control"
                                            value="<?php echo e($brg->nama_barang); ?>" required>

                                        <label class="mt-3">Harga Produk :</label>
                                        <input type="text" name="harga" class="form-control"
                                            value="<?php echo e($brg->harga); ?>" required>

                                        <label class="mt-3">Keterangan Produk :</label>
                                        <input type="text" name="keterangan" class="form-control"
                                            value="<?php echo e($brg->keterangan); ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mt-3">Upload Foto Produk :</label><br>
                                        <?php if(count($errors) > 0): ?>
                                            <div class="alert alert-danger">
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($error); ?> <br />
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <img src="<?php echo e(url('uploads')); ?>/<?php echo e($brg->gambar); ?>" class="img-fluid">
                                        <input type="file" name="file" class="form-control mt-3">

                                        <button type="submit" class="btn btn-primary mt-5"><i class="fa fa-plus"></i>
                                            Update
                                            Produk</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Krypton\Desktop\blog\resources\views/produk/update.blade.php ENDPATH**/ ?>