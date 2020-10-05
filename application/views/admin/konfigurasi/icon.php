<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
         <button onclick="window.history.go(-1)" class="btn btn-icon"><i class="fas fa-arrow-left"></i></button>
            </div>
        <h1>Icon Website</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Icon Website</div>
        </div>
    </div>
   

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Icon</h4>
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
              echo form_open_multipart(base_url('admin/konfigurasi/icon'));
            ?>
            <div class="card-body">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Website</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="namaweb" class="form-control" value="<?= $konfigurasi->namaweb;?>" require>
                  <small class="alert-danger"><?php echo form_error('namaweb'); ?></small>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Icon</label>
                <div class="col-sm-12 col-md-7">
                  <input type="file" name="icon" class="form-control" value="<?= $konfigurasi->icon;?>" require>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon Website</label>
                <div class="col-sm-12 col-md-7">
                  <div id="image-preview" class="image-preview">
                    <img src="<?= base_url('assets/upload/image/'.$konfigurasi->icon);?>" class="img-fluid " id="image-upload" />
                  </div>
                </div>
              </div>
              
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Create Icon</button>
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