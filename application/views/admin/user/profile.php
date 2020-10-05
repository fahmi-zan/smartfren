<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
       <h1>Profile</h1>
        <div class="section-header-breadcrumb">
         <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
           <div class="breadcrumb-item">Profile</div>
        </div>
       </div>
       <?php
    
    //NOTIF ERRORS
    // echo validation_errors('<div class="alert alert-info">','</div>');
    
    // FORM OPEN 
    echo form_open(base_url('admin/user/profile'));
    ?>   

    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">                     
            <img alt="image" src="<?= base_url()?>assets/template/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
              <div class="profile-widget-item">
              <div class="profile-widget-item-label">Hak Akses</div>
                <div class="profile-widget-item-value"><?php echo $user->level_akses ;?></div>
                </div>
                <div class="profile-widget-item">
                <div class="profile-widget-item-label">Jabatan</div>
                <div class="profile-widget-item-value">###</div>
                </div>
                <div class="profile-widget-item">
                <div class="profile-widget-item-label">Tanggal Gabung</div>
                <div class="profile-widget-item-value"><?= date('d-m-Y' ,strtotime($user->tanggal_input));?></div>
                </div>
            </div>
            </div>
            <div class="profile-widget-description">
            <div class="profile-widget-name"><?= $user->nama ;?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?= $user->username ?></div></div>
            <b><?= $user->alamat_user?></b>.
            </div>
            <div class="card-footer text-center">
                <div class="font-weight-bold mb-2">Follow <?= $user->email ?></div>
            </div>
        </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
      
        <div class="card">
          <form method="post" class="needs-validation" novalidate="">
           <div class="card-header">
                <h4>Edit Profile</h4>
            </div>
           <div class="card-body">
            <div class="col-md-6 col-12">
                <?php if($this->session->flashdata('sukses')) { 
                    echo '<div class="alert alert-success">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                 }?>
              </div>
            <div class="form-group">
                 <label>Nama </label>
                  <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>">
               </div>                              
             <div class="row"> 
               <div class="form-group col-md-6 col-12">
                 <label>Username</label>
                 <input type="text" class="form-control" name="username" value="<?= $user->username?>">
                  <small class="alert-danger"><?php echo form_error('username'); ?></small>
                </div>

                 <div class="form-group col-md-6 col-12">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" value="<?= $user->password?>">
                  <small class="alert-danger"><?php echo form_error('password'); ?></small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $user->email?>">
                  <small class="alert-danger"><?php echo form_error('email'); ?></small>
                    
                    </div>

                    <div class="form-group col-md-5 col-12">
                    <label>No. Telephone </label>
                    <input type="tel" class="form-control" name="tlp_user" value="<?= $user->tlp_user?>">
                  <small class="alert-danger"><?php echo form_error('tlp_user'); ?></small>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                    <label>Alamat</label>
                    <textarea name="alamat_user" class="form-control summernote-simple"><?= $user->alamat_user ?> </textarea>
                  <small class="alert-danger"><?php echo form_error('alamat_user'); ?></small>
                    </div>
                </div>
                  <div class="row">
                     <div class="form-group mb-0 col-12">
                      <div class="custom-control custom-checkbox">
                    </div>
                  </div>
                </div>
            </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>

     <?php form_close();?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>