<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
         <button onclick="window.history.go(-1)" class="btn btn-barang"><i class="fas fa-arrow-left"></i></button>
            </div>
        <h1>Tambah Barang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Tambah Barang</div>
        </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Input Data Barang</h4>
          </div>
          <?php
            if($this->session->flashdata('sukses'))
            {
              echo '<p class="alert alert-success">';
              echo $this->session->flashdata('sukses');
              echo '</p>';
            }
            ?>

            <?php
            // ERROR UPLOAD 
            if(isset($error))
            {
              echo '<p class="alert alert-warning">';
              echo $error;
              echo '</p>';
            } 

            // FORM OPEN
            echo form_open_multipart(base_url('admin/barang/tambah'));
            ?>
            <div class="card-body">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Barang</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="kode_barang" class="form-control" value="<?= set_value('kode_barang');?>" require>
                  <small class="alert-danger"><?php echo form_error('kode_barang'); ?></small>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Barang</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="nama_barang" class="form-control" value="<?= set_value('nama_barang');?>" require>
                  <small class="alert-danger"><?php echo form_error('nama_barang'); ?></small>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Barang</label>
                <div class="col-sm-12 col-md-7">
                  <select name="id_kategori" class="form-control selectric">
                  <?php foreach($kategori as $kategori) { ?> 
                  <option value="<?= $kategori->id_kategori ;?>"><?= $kategori->nama_kategori;?></option>
                  <?php }?>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Beli</label>
                  <div class="col-sm-12 col-md-7">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                            RP
                        </div>
                      </div>
                        <input type="text" name="harga_beli" class="form-control" value="<?= set_value('harga_beli');?>">
                    </div>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Jual</label>
                <div class="col-sm-12 col-md-7">
                <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                            RP
                        </div>
                      </div>
                  <input type="text" name="harga_jual" class="form-control" value="<?= set_value('harga_jual');?>">
                </div>
              </div>
            </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stok Barang</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="stok" class="form-control" value="<?= set_value('stok');?>">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan Barang</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="keterangan" class="form-control summernote-simple" value="<?= set_value('keterangan');?>"></textarea>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keywords</label>
                <div class="col-sm-12 col-md-7">
                  <textarea type="text" name="keyword" class="form-control summernote-simple" value="<?= set_value('keyword');?>"></textarea>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Barang</label>
                <div class="col-sm-12 col-md-7">
                  <input type="file" name="gambar" class="form-control" value="<?= set_value('gambar');?>">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Barang</label>
                <div class="col-sm-12 col-md-7">
                  <select name="status_barang" class="form-control selectric">
                    <option value="Publish">PUBLISH</option>
                    <option value="Draft">DRAFT</option>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Input Barang</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
      <?php 
      form_close();
      ?>