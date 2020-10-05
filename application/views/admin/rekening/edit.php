<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
         <button onclick="window.history.go(-1)" class="btn btn-icon"><i class="fas fa-arrow-left"></i></button>
            </div>
        <h1>Edit Rekening</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Edit Rekening</div>
        </div>
        </div>

        <?php
        
        //NOTIF ERRORS
        // echo validation_errors('<div class="alert alert-info">','</div>');
        
        // FORM OPEN 
        echo form_open(base_url('admin/rekening/edit/'.$rekening->id_rekening));
        ?>

        <div class="row">
         <div class="col-12 col-md-7 col-lg-7">
            <div class="card">
               <div class="card-header">
                <h4>Input Data Rekening</h4>
                </div>
               <div class="card-body">
                <div class="form-group">
                    <label>Nama Rekening</label>
                    <input type="text" name="nama_bank" class="form-control" value="<?= $rekening->nama_bank;?>">
                    <small class="alert-danger"><?php echo form_error('nama_bank'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" class="form-control" value="<?= $rekening->nomor_rekening;?>">
                    <small class="alert-danger"><?php echo form_error('nomor_rekening'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik</label> 
                    <input type="text" name="nama_pemilik" class="form-control" value="<?= $rekening->nama_pemilik;?>">
                    <small class="alert-danger"><?php echo form_error('nama_pemilik'); ?></small>
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>

            <?php form_close();?>