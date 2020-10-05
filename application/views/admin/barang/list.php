 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Barang</h1>
            <div class="section-header-button">
               <a href="<?= base_url('admin/barang/tambah');?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data Barang</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Data Barang</div>
            </div>
          </div>
         
<div class="row">
   <div class="col-12">
    <div class="card">
      <div class="card-header">
       <h4>Data Barang</h4>
      </div>
       <div class="card-body">
    <div class="table-responsive">
     <table class="table table-striped" id="table-1">
        <thead>
            <tr>
            <th class="text-center">
                #
            </th>
            <th>KODE BARANG</th>
            <th>NAMA BARANG</th>
            <th>KATEGORI BARANG</th>
            <th>HARGA BELI</th>
            <th>HARGA JUAL</th>
            <th>STOK</th>
            <th>STATUS BARANG</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; 
            foreach($barang as $barang) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $barang->kode_barang ?> </td>
                <td><?= $barang->nama_barang ?> </td>
                <td><?= $barang->nama_kategori ?> </td>
                <td>Rp. <?= number_format($barang->harga_beli, '0',',','.') ?> </td>
                <td>Rp. <?= number_format($barang->harga_jual, '0',',','.') ?> </td>
                <td><?= $barang->stok ?> </td>
                <td><?= $barang->status_barang ?> </td>
                <td class="buttons">
                    <a href="<?= base_url('admin/barang/edit/'. $barang->id_barang);?>" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?= base_url('admin/barang/hapus/'. $barang->id_barang);?>" class="btn btn-danger btn-action" onclick="return confirm('Anda yakin igin menghapus ??')" ><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>