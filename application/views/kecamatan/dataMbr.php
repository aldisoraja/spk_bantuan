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
                <form method="POST" action="<?php echo base_url('kecamatan/dataMbr/filterdata') ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Kecamatan :</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="kecamatan" class="form-control" value="<?php echo substr($this->session->userdata('id_akses'),4) ?> - <?php echo $this->session->userdata('kec'); ?>" readonly>
                                        <?php echo form_error('kecamatan','<div class="text-small text-danger"></div>') ?>
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
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="staticEmail2">Bulan :</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="datepicker-here form-control digits" data-min-view="months" data-view="months" data-date-format="MM" 
                                        name="bulan" type="text" data-language="en" placeholder="-- Pilih Bulan --"/>
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
                                        <input class="datepicker-here form-control digits" name="tahun" type="text" data-min-view="years" data-view="years" 
                                        data-date-format="yyyy" data-language="en" placeholder="-- Pilih Tahun --"/>
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
                        <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('kecamatan/laporanMbr/laporanMbr/'.$bulan_tahun.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-print"></i> Print</a></li>
                        <li><a class="dropdown-item" target="_blank" href="<?php echo base_url('kecamatan/laporanMbr/laporanPdf/'.$bulan_tahun.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-file-pdf"></i> Export PDF</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('kecamatan/laporanMbr/laporanExcel/'.$bulan_tahun.'/'.$kelurahan_dua) ?>"><i class="fa-solid fa-file-excel"></i> Export Excel</a></li>
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
                <?php echo empty($kelurahan_dua)? "Kecamatan ".$kec:"Kelurahan ".$kelurahan_dua ;?> </span>
                <span class="font-weight-bold"> <?php echo ($bulan_tahun =='-' OR empty($bulan_tahun))?date("F Y"):date("F Y",strtotime($bulan_tahun)); ?></span>
                <input type="hidden" name="bulan_tahun" id="bulan_tahun" value = "<?php echo ($bulan_tahun =='-' OR empty($bulan_tahun))?date("m-Y"):date("m-Y",strtotime($bulan_tahun)); ?>">
            </div>
        </div>

        <!-- body -->
        <div class="card-body">
            <div class="table table-responsive">
            </form>
                <table class="display" id="basic-1">
                    <thead>
                        <tr class="bg-light">
                            <th>
                                <input type="checkbox" onchange="checkAll(this)">
                            </th>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($mbrs as $mbr) : ?>
                            <tr>
                                <td>
                                    <input class="checkbox" type="checkbox" value="<?php echo $mbr->nik ?>" <?php echo ($mbr->keterangan == 'Pilih')?"checked":"";?> >
                                </td>
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<!-- Container-fluid Ends-->
</div>