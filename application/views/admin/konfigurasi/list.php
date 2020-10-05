<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Konfigurasi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Konfigurasi</div>
        </div>
        </div>

        <?php
        
        //NOTIF ERRORS
        // echo validation_errors('<div class="alert alert-info">','</div>');
        
        // FORM OPEN 
        echo form_open(base_url('admin/konfigurasi'));
        ?>

        <div class="row">
         <div class="col-12 col-md-7 col-lg-7">
            <div class="card">
               <div class="card-header">
                <h4>Input Data Konfigurasi</h4>
                </div>
               <div class="card-body">
                <div class="form-group">
                    <label>Nama Website</label>
                    <input type="text" name="namaweb" class="form-control" value="<?= $konfigurasi->namaweb;?>">
                    <small class="alert-danger"><?php echo form_error('namaweb'); ?></small>
                </div>
                <div class="form-group">
                    <label>Tagline Website</label>
                    <input type="text" name="tagline" class="form-control" value="<?= $konfigurasi->tagline;?>">
                </div>
                <div class="form-group">
                    <label>Email Website</label>
                    <input type="email" name="email" class="form-control" value="<?= $konfigurasi->email;?>">
                </div>
                <div class="form-group">
                    <label>Website</label> 
                    <input type="text" name="website" class="form-control" value="<?= $konfigurasi->website;?>">
                </div>
                <div class="form-group">
                 <label>Telephone Website</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <div class="input-group-text">
                      <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    <input type="text" name="telephone" value="<?= $konfigurasi->telephone;?>" class="form-control phone-number">
                    </div>
                    <small class="alert-danger"><?php echo form_error('tlp_sales'); ?></small>
                </div>
                <div class="form-group">
                    <label>Facebook</label> 
                    <input type="text" name="facebook" class="form-control" value="<?= $konfigurasi->facebook;?>">
                </div>
                <div class="form-group">
                    <label>Instagram</label> 
                    <input type="text" name="instagram" class="form-control" value="<?= $konfigurasi->instagram;?>">
                </div>
                <div class="form-group">
                    <label>Alamat Kantor</label> 
                    <input type="text" name="alamat" class="form-control" value="<?= $konfigurasi->alamat;?>">
                </div>
                <div class="form-group">
                    <label>Keywords</label> 
                    <textarea name="keyword" class="form-control" value=""><?= $konfigurasi->keyword;?></textarea>
                </div>
                <div class="form-group">
                    <label>MetaText</label> 
                    <textarea name="metatext" class="form-control" value=""><?= $konfigurasi->metatext;?></textarea>
                </div>
                <div class="form-group">
                    <label>Deskripsi Website</label> 
                    <textarea name="deskripsi" class="form-control" value=""><?= $konfigurasi->deskripsi;?></textarea>
                </div>
                <div class="form-group">
                    <label>Rekening Pembayaran</label> 
                    <textarea name="rekening_pembayaran" class="form-control" value=""><?= $konfigurasi->rekening_pembayaran;?></textarea>
                </div>
                
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>

            <?php form_close();?>