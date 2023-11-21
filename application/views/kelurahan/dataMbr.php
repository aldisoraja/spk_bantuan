<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i data-feather="users"></i> <?php echo $title ?></h4>
    </div>
</div>  
    <div class="container-fluid">
        <div class="card">
            <h6 class="card-header bg-primary">Filter Data MBR</h6>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('kelurahan/dataMbr/filterdata') ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Kecamatan :</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="kec" value="<?php echo substr($this->session->userdata('id_akses'),4,2) ?> - <?php echo $this->session->userdata('kec'); ?>" readonly>
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
                                        <input type="text" class="form-control" name="kel" value="<?php echo substr($this->session->userdata('id_akses'),6) ?> - <?php echo $this->session->userdata('kel'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="staticEmail2">Bulan :</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="datepicker-here form-control digits" type="text" name="bulan" data-language="en" data-min-view="months" data-view="months" data-date-format="MM" placeholder="-- Pilih Bulan --"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="staticEmail2">Tahun :</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="datepicker-here form-control digits" type="text" name="tahun" data-language="en" data-min-view="years" data-view="years" data-date-format="yyyy" placeholder="-- Pilih Tahun --" />
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
                        <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('kelurahan/laporanMbr/laporanMbr/'.$bulan_tahun) ?>"><i class="fa-solid fa-print"></i> Print</a></li>
                        <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('kelurahan/laporanMbr/LaporanPdf/'.$bulan_tahun) ?>"><i class="fa-solid fa-file-pdf"></i> Export PDF</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('kelurahan/laporanMbr/LaporanExcel/'.$bulan_tahun) ?>"><i class="fa-solid fa-file-excel"></i> Export Excel</a></li>
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
                <?php echo "Kelurahan ".$kelurahan_dua?>
                <?php echo ($bulan_tahun =='-' OR empty($bulan_tahun))?date("F Y"):date("F Y",strtotime($bulan_tahun)); ?>
            </div>
        </div>
        <br>
        <!-- Button Tambah -->
        <a class="btn btn-sm btn-primary" href="<?php echo base_url('kelurahan/dataMbr/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
        <!-- body -->
        <div class="card-body">
            <div class="table table-responsive">
                <table class="display" id="basic-1">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Metode Kontrasepsi</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <?php foreach($kriterias as $kriteria): ?>    
                                <th><?= $kriteria->kriteria; ?></th>
                            <?php endforeach ?>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($mbrs as $mbr) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $mbr->nik ?></td>
                                <td><?php echo date("d-m-Y", strtotime($mbr->tanggal)) ?></td>
                                <td><?php echo $mbr->nama_mbr ?></td>
                                <td><?php echo $mbr->met_kontra ?></td>
                                <td><?php echo $mbr->kecamatan ?></td>
                                <td><?php echo $mbr->kelurahan ?></td>
                                <?php foreach($kriterias as $kriteria): ?>    
                                    <td><?php echo $sub_kriteria_mbrs[$kriteria->kriteria][$mbr->nik] ?></td>
                                <?php endforeach ?>
                                <td>
                                    <center>
                                    <a href="<?php echo base_url('kelurahan/dataMbr/updateData/'.$mbr->nik) ?>"><button class="btn btn-sm btn-success"  data-bs-toggle="tooltip" data-bs-placement="left" title="Ubah"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="<?php echo base_url('kelurahan/dataMbr/deleteData/'.$mbr->nik) ?>" id="btn-hapus"><button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus"><i class="fa-solid fa-trash-can"></i></button></a>
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