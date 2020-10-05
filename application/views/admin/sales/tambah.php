<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
         <button onclick="window.history.go(-1)" class="btn btn-icon"><i class="fas fa-arrow-left"></i></button>
            </div>
        <h1>Tambah Sales</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Tambah Sales</div>
        </div>
        </div>

        <?php
        
        //NOTIF ERRORS
        // echo validation_errors('<div class="alert alert-info">','</div>');
        
        // FORM OPEN 
        echo form_open(base_url('admin/sales/tambah'));
        ?>

        <div class="row">
         <div class="col-12 col-md-7 col-lg-7">
            <div class="card">
               <div class="card-header">
                <h4>Input Data Sales</h4>
                </div>
               <div class="card-body">
                <div class="form-group">
                    <label>ID Sales</label>
                    <input type="text" name="id_sales" class="form-control" value="<?= set_value('id_sales');?>">
                    <small class="alert-danger"><?php echo form_error('id_sales'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nama Sales</label>
                    <input type="text" name="nama_sales" class="form-control" value="<?= set_value('nama_sales');?>">
                    <small class="alert-danger"><?php echo form_error('nama_sales'); ?></small>
                </div>
                <div class="form-group">
                    <label>Email Sales</label>
                    <input type="email" name="email_sales" class="form-control" value="<?= set_value('email_sales');?>">
                    <small class="alert-danger"><?php echo form_error('email_sales'); ?></small>
                </div>
                <div class="form-group">
                    <label>Alamat Sales</label> 
                    <textarea name="alamat_sales" class="form-control" value="<?= set_value('alamat_sales');?>"></textarea>
                    <small class="alert-danger"><?php echo form_error('alamat_sales'); ?></small>
                </div>

                <div class="form-group">
                 <label>Nomor Telephone</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <div class="input-group-text">
                      <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    <input type="text" name="tlp_sales" value="<?= set_value('tlp_sales');?>" class="form-control phone-number">
                    </div>
                    <small class="alert-danger"><?php echo form_error('tlp_sales'); ?></small>
                </div>

                <div class="form-group">
                    <label>Urutan</label> 
                    <input type="number" name="urutan" class="form-control" value="<?= set_value('urutan');?>">
                </div>
                
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>

            <?php form_close();?>