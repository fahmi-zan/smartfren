 <!-- Main Content -->
 <div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Pengguna</h1>
      <div class="section-header-button">
        <a href="<?= base_url('admin/user/tambah');?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data Pengguna</a>
      </div>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">Data Pengguna</div>
      </div>
    </div>
         
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Pengguna</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
    <table class="table table-striped" id="table-1">
        <thead>
            <tr>
            <th class="text-center">
                #
            </th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>TELEPHONE</th>
            <th>ROLE</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; 
            foreach($user as $user) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $user->nama ?> </td>
                <td><?= $user->email ?> </td>
                <td><?= $user->username ?> </td>
                <td><?= $user->tlp_user ?> </td>
                <td><?= $user->level_akses ?> </td>
                <td class="buttons">
                    <a href="<?= base_url('admin/user/edit/'. $user->id_user);?>" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?= base_url('admin/user/hapus/'. $user->id_user);?>" class="btn btn-danger btn-action" onclick="return confirm('Anda yakin igin menghapus ??')" ><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>