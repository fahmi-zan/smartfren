 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Sales</h1>
            <div class="section-header-button">
               <a href="<?= base_url('admin/sales/tambah');?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data Sales</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Data Sales</div>
            </div>
          </div>
         
<div class="row">
   <div class="col-12">
    <div class="card">
      <div class="card-header">
       <h4>Data Sales</h4>
      </div>
       <div class="card-body">
    <div class="table-responsive">
     <table class="table table-striped" id="table-1">
        <thead>
            <tr>
            <!-- <th class="text-center">
                #
            </th> -->
            <th>ID SALES</th>
            <th>NAMA SALES</th>
            <th>EMAIL SALES</th>
            <th>ALAMAT SALES</th>
            <th>TELEPHONE</th>
            <th>SLUG SALES</th>
            <th>URUTAN</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // $no = 1; 
            foreach($sales as $sales) { ?>
            <tr>
                <!-- <td><?= $no++ ?> </td> -->
                <td><?= $sales->id_sales ?> </td>
                <td><?= $sales->nama_sales ?> </td>
                <td><?= $sales->email_sales ?> </td>
                <td><?= $sales->alamat_sales ?> </td>
                <td><?= $sales->tlp_sales ?> </td>
                <td><?= $sales->slug_sales ?> </td>
                <td><?= $sales->urutan ?> </td>
                <td class="buttons">
                    <a href="<?= base_url('admin/sales/edit/'. $sales->id_sales);?>" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?= base_url('admin/sales/hapus/'. $sales->id_sales);?>" class="btn btn-danger btn-action" onclick="return confirm('Anda yakin igin menghapus ??')" ><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>