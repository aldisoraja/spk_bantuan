<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i class="fa-solid fa-file-lines"></i> <?php echo $title ?></h4>
    </div>
</div>  
    <div class="container-fluid">
        <!-- body -->
        <div class="card-body">
            <div class="table table-responsive">
                <table class="display" id="basic-1">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Tanggal Perhitungan</th>
                            <th>Jumlah MBR</th>
                            <th class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($laporan as $l) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $l->tanggal_hitung ?></td>
                                <td><?php echo $l->jumlah_mbr ?></td>
                                <td>
                                    <center>
                                        <a href="<?php echo base_url('kecamatan/hasil/listHasil/'.$l->tanggal_hitung) ?>"><button class="btn btn-sm btn-success"  data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat"><i class="fa-solid fa-eye"></i></button></a>
                                        <a href="<?php echo base_url('kecamatan/hasil/deleteData/'.$l->tanggal_hitung) ?>" id="btn-hapus"><button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus"><i class="fa-solid fa-trash-can"></i></button></a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Container-fluid Ends-->
</div>