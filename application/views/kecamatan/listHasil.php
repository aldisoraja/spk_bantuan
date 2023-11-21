<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i class="fa-solid fa-file-lines"></i> <?php echo $title ?></h4>
        <a class="btn btn-light" style="margin-left: 780px;" href="<?php echo base_url('kecamatan/hasil') ?>"><i class="fa-sharp fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
</div>  
    <div class="container-fluid">
        <div class="card">
            <h6 class="card-header bg-primary">Filter Hasil Perankingan MBR</h6>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('kecamatan/hasil/filterdata') ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Kecamatan :</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" value="<?php echo substr($this->session->userdata('id_akses'),4) ?> - <?php echo $this->session->userdata('kec'); ?>" readonly>
                                        <?php echo form_error('kecamatan','<div class="text-small text-danger"></div>') ?>
                                        <input type="hidden" name="tanggalHitung" value="<?php echo $tanggalHitung ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Kelurahan :</label>
                                    </div>
                                    <div class="col-8">
                                        <select name="kel" class="form-select" id="select1">
                                            <option value="">-- Pilih Kelurahan --</option>
                                            <?php foreach($kelurahan as $k) : ?>
                                            <option value="<?php echo $k->kel ?>"><?php echo substr($k->id_akses, 6) ?> - <?php echo $k->kel ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <br>
                <button class="btn btn-light" style="margin-left: 620px;"><i class="fa-sharp fa-solid fa-magnifying-glass"></i> Cari</button>
                <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-print"></i> Cetak</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('kecamatan/laporanHasilMbr/hasilMbr/'.$tanggalHitung.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-print"></i> Print</a></li>
                        <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('kecamatan/laporanHasilMbr/hasilMbrPdf/'.$tanggalHitung.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-file-pdf"></i> Export PDF</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('kecamatan/laporanHasilMbr/hasilMbrExcel/'.$tanggalHitung.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-file-excel"></i> Export Excel</a></li>
                    </ul>
                </div>
                </form>
            </div>
        </div>

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