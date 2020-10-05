 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Rekening</h1>
            <div class="section-header-button">
             <a href="<?= base_url('admin/rekening/tambah');?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data Rekening</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Data Rekening</div>
            </div>
          </div>

         
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Rekening</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
      <table class="table table-striped" id="table-1">
          <thead>
              <tr>
              <th class="text-center">
                  #
              </th>
              <th>NAMA BANK</th>
              <th>NOMOR REKENING</th>
              <th>NAMA PEMILIK</th>
              <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $no = 1; 
              foreach($rekening as $rekening) { ?>
              <tr>
                  <td><?= $no++ ?> </td>
                  <td><?= $rekening->nama_bank ?> </td>
                  <td><?= $rekening->nomor_rekening ?> </td>
                  <td><?= $rekening->nama_pemilik ?> </td>
                  <td class="buttons">
                      <a href="<?= base_url('admin/rekening/edit/'. $rekening->id_rekening);?>" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      <a href="<?= base_url('admin/rekening/hapus/'. $rekening->id_rekening);?>" class="btn btn-danger btn-action" onclick="return confirm('Anda yakin igin menghapus ??')" ><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                  </td>
              </tr>
              <?php } ?>
          </tbody>
          </table>