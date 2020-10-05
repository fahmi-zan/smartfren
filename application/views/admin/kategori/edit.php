<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
         <button onclick="window.history.go(-1)" class="btn btn-icon"><i class="fas fa-arrow-left"></i></button>
            </div>
        <h1>Edit Kategori</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Edit Kategori</div>
        </div>
        </div>

        <?php
        
        //NOTIF ERRORS
        // echo validation_errors('<div class="alert alert-info">','</div>');
        
        // FORM OPEN 
        echo form_open(base_url('admin/kategori/edit/'.$kategori->id_kategori));
        ?>

        <div class="row">
         <div class="col-12 col-md-7 col-lg-7">
            <div class="card">
               <div class="card-header">
                <h4>Input Data Kategori</h4>
                </div>
               <div class="card-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori;?>">
                    <small class="alert-danger"><?php echo form_error('nama_kategori'); ?></small>
                </div>
            
                <div class="form-group">
                    <label>Urutan</label> 
                    <input type="number" name="urutan" class="form-control" value="<?= $kategori->urutan;?>">
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>

            <?php form_close();?>