<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i class="fa-solid fa-file-lines"></i> <?php echo $title ?></h4>
    </div>
</div>  
    <div class="container-fluid">
        <a class="btn btn-light" style="margin-left: 650px;" href="<?php echo base_url('kelurahan/hasil') ?>"><i class="fa-sharp fa-solid fa-arrow-left"></i> Kembali</a>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-print"></i> Cetak</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('kelurahan/laporanHasilMbr/HasilMbr/'.$tanggalHitung.'/'.$kecamatan_dua.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-print"></i> Print</a></li>
                <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('kelurahan/laporanHasilMbr/HasilMbrPdf/'.$tanggalHitung.'/'.$kecamatan_dua.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-file-pdf"></i> Export PDF</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url('kelurahan/laporanHasilMbr/HasilMbrExcel/'.$tanggalHitung.'/'.$kecamatan_dua.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-file-excel"></i> Export Excel</a></li>
            </ul>
        </div>
        <br>
        <br>
        <br>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
        </svg>

        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <div>
                Menampilkan Data MBR <span class="font-weight-bold">
                <?php echo empty($kelurahan_dua)? "Kecamatan ".$kec:"Kelurahan ".$kelurahan_dua ;?>
            </div>
        </div>

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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Container-fluid Ends-->
</div>