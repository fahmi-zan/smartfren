 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kategori</h1>
            <div class="section-header-button">
              <a href="<?= base_url('admin/kategori/tambah');?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data Kategori</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Data Kategori</div>
            </div>
          </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Kategori</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
    <table class="table table-striped" id="table-1">
        <thead>
            <tr>
            <th class="text-center">
                #
            </th>
            <th>NAMA KATEGORI</th>
            <th>SLUG KATEGORI</th>
            <th>URUTAN</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; 
            foreach($kategori as $kategori) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $kategori->nama_kategori ?> </td>
                <td><?= $kategori->slug_kategori ?> </td>
                <td><?= $kategori->urutan ?> </td>
                <td class="buttons">
                    <a href="<?= base_url('admin/kategori/edit/'. $kategori->id_kategori);?>" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?= base_url('admin/kategori/hapus/'. $kategori->id_kategori);?>" class="btn btn-danger btn-action" onclick="return confirm('Anda yakin igin menghapus ??')" ><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>