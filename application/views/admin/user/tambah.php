<!-- Main Content -->
<div class="main-content">
    <section class="section">
       <div class="section-header">
        <div class="section-header-back">
         <button onclick="window.history.go(-1)" class="btn btn-icon"><i class="fas fa-arrow-left"></i></button>
            </div>
        <h1>Tambah Pengguna</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Tambah Pengguna</div>
        </div>
        </div>

        <?php
        
        //NOTIF ERRORS
        // echo validation_errors('<div class="alert alert-info">','</div>');
        
        // FORM OPEN 
        echo form_open(base_url('admin/user/tambah'));
        ?>

        <div class="row">
         <div class="col-12 col-md-7 col-lg-7">
            <div class="card">
               <div class="card-header">
                <h4>Input Data pengguna</h4>
                </div>
               <div class="card-body">
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" name="nama" class="form-control" value="<?= set_value('nama');?>">
                    <small class="alert-danger"><?php echo form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                    <label>Email Pengguna</label>
                    <input type="email" name="email" class="form-control" value="<?= set_value('email');?>">
                    <small class="alert-danger"><?php echo form_error('email'); ?></small>
                </div>
                <div class="form-group">
                    <label>Username</label> 
                    <input type="text" name="username" class="form-control" value="<?= set_value('username');?>">
                </div>

                <div class="form-group">
                   <label>Password Strength</label>
                   <div class="input-group">
                   <div class="input-group-prepend">
                       <div class="input-group-text">
                       <i class="fas fa-lock"></i>
                      </div>
                    </div>

                    <input type="password" name="password" class="form-control pwstrength" value="<?= set_value('password');?>" data-indicator="pwindicator">
                    <small class="alert-danger"><?php echo form_error('password'); ?></small>
                    </div>
                    <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                    </div>
                </div>

                <div class="form-group">
                 <label>Nomor Telephone</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <div class="input-group-text">
                      <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    <input type="text" name="tlp_user" value="<?= set_value('tlp_user');?>" class="form-control phone-number">
                    </div>
                    <small class="alert-danger"><?php echo form_error('tlp_user'); ?></small>
                </div>

                <div class="form-group">
                      <div class="control-label">Role</div>
                      <div class="custom-switches-stacked mt-2">
                        <label class="custom-switch">
                          <input type="radio" name="level_akses" value="admin" class="custom-switch-input">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Admin</span>
                        </label>
                        <label class="custom-switch">
                          <input type="radio" name="level_akses" value="user" class="custom-switch-input">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">User</span>
                        </label>
                    </div>
                </div>

                
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>

            <?php form_close();?>