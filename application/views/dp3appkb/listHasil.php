<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i class="fa-solid fa-file-lines"></i> <?php echo $title ?></h4>
    </div>
</div>  
    <div class="container-fluid">
        <a class="btn btn-light" style="margin-left: 630px;" href="<?php echo base_url('dp3appkb/hasil') ?>"><i class="fa-sharp fa-solid fa-arrow-left"></i> Kembali</a>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-print"></i> Cetak</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('dp3appkb/laporanHasilMbr/HasilMbr/'.$tanggalHitung.'/'.$kecamatan_dua) ?>"><i class="fa-solid fa-print"></i> Print</a></li>
                <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('dp3appkb/laporanHasilMbr/HasilMbrPdf/'.$tanggalHitung.'/'.$kecamatan_dua) ?>"><i class="fa-solid fa-file-pdf"></i> Export PDF</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url('dp3appkb/laporanHasilMbr/HasilMbrExcel/'.$tanggalHitung.'/'.$kecamatan_dua) ?>"><i class="fa-solid fa-file-excel"></i> Export Excel</a></li>
            </ul>
        </div>
        <br>
        <br>
        <br>
        <!-- body -->
        <div class="card-body">
            <div class="table table-responsive">
                <table class="display" id="basic-1">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Tanggal Perhitungan</th>
                            <th>NIK</th>
                            <th>Nama MBR</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Nilai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($laporan)): ?>
                        <?php $no=1; foreach($laporan as $l) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $l->tanggal_hitung ?></td>
                                <td><?php echo $l->nik ?></td>
                                <td><?php echo $l->nama_mbr ?></td>
                                <td><?php echo $l->kecamatan ?></td>
                                <td><?php echo $l->kelurahan ?></td>
                                <td><?php echo $l->nilai ?></td>
                                <td><?php echo $l->status ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Container-fluid Ends-->
</div>