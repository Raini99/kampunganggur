<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <form action="<?php echo base_url(); ?>/Admin/Produk/ubah" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= $produk['id_produk'] ?>" name="id_produk">
            <input type="hidden" value="<?= $produk['gambar_produk'] ?>" name="gambar_lama">

            <div class="card card-footer mx-auto" style="width: 45rem;">
                <div class="card-header">
                    <h3 class="card-title text-bold">Form Edit Produk</h3>

                    <!-- <div class="card-tools">
                        <button type="button" class="btn btn-tool bg-gray" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div> -->
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="<?= (old('nama_produk')) ? old('nama_produk') : $produk['nama_produk']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="kategori" style="width: 100%;">
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori'] ?>" <?= (old('kategori') === $k['id_kategori']) ? "selected" : (($produk['id_kategori'] === $k['id_kategori']) ? "selected" : ""); ?>><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Harga</label>
                        <div class="input-group mb-3 col-sm-10">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-">Rp.</i></span>
                            </div>
                            <input type="text" value="<?= (old('harga')) ? old('harga') : $produk['harga']; ?>" class="form-control" name="harga" placeholder="Masukkan harga" required>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" id="inputEstimatedBudget" class="form-control" name="stok" placeholder="Masukkan stok" value="<? //= (old('stok')) ? old('stok') : $produk['stok']; 
                                                                                                                                                ?>" required>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" name="gambar_produk" class="form-control-file" id="exampleFormControlFile1" value="">
                            <font color="red"><?= ($validation->hasError('gambar_produk')) ? $validation->getError('gambar_produk') : ''; ?></font>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3" value="" placeholder="Enter deskripsi" required><?= (old('deskripsi')) ? old('deskripsi') : $produk['deskripsi']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('Admin/Produk'); ?>" class="btn btn-secondary" onClick="return confirm('apakah ada ingin membatalkan inputan ?')">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
        <?php // echo form_close(); 
        ?>
    </div>
</div>

<?= $this->endSection() ?>