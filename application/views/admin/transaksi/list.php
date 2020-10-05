 <!-- Main Content -->
 <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-button">
            <!-- <a href="<?= base_url('admin/transaksi/tambah');?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data Sales</a> -->
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Data Transaksi</div>
        </div>
    </div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
       <h4>Data Transaksis</h4>
      </div>
       <div class="card-body">
        <div class="table-responsive">
     <table class="table table-striped" id="table-1">
        <thead>
            <tr>
            <th class="text-center">
                #
            </th>
            <th>KODE TRANSAKSI</th>
            <th>NAMA PELANGGAN</th>
            <th>NAMA BARANG</th>
            <th>JUMLAH ITEM</th>
            <th>JUMLAH TOTAL</th>
            <th>TANGGAL</th>
            <th>STATUS</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; 
            foreach($header_transaksi as $header_transaksi) { ?>
            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $header_transaksi->kode_transaksi ?> </td>
                <td><?= $header_transaksi->nama_pelanggan ?> </td>
                <td><?= $header_transaksi->nama_barang ?> </td>
                <td><?= $header_transaksi->total_item ?> </td>
                <td>Rp. <?= number_format($header_transaksi->jumlah_transaksi,'0',',','.') ?> </td>
                <td><?= date('d-m-Y',strtotime($header_transaksi->tgl_transaksi)) ?> </td>
                <td><?= $header_transaksi->status_bayar ?> </td>
                <td class="buttons">
                    <a href="<?= base_url('admin/transaksi/detail/'. $header_transaksi->kode_transaksi);?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>

                    <a href="<?= base_url('admin/transaksi/cetak/'. $header_transaksi->kode_transaksi);?>" class="btn btn-light btn-action" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></a>
                    
                </td>
            </tr>
            <?php } ?>
        </tbody>
     </table>