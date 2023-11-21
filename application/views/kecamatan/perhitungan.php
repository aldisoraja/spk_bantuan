<div class="page-body">
<!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header mt-3">
        <h4><i data-feather="star"></i> <?php echo $title ?></h4>
        </div>
    </div>  
    <div class="container-fluid">
        <div class="card-body">
            <div>
                <h5><i class="fa-solid fa-clipboard-list"></i> Merubah Kriteria Menjadi Matriks Keputusan</h5>
                <br>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr class="header bg-light">
                            <th>No</th>
                            <th>Nama</th>
                            <?php  foreach($kriterias as $kriteria) :?>
                                <th><?= $kriteria->kode_kriteria; ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($mbrs as $mbr) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $mbr->nama_mbr ?></td>
                                <?php  foreach($kriterias as $kriteria) :?>
                                    <td><?php echo $nilaisub[$kriteria->kriteria][$mbr->nik] ?></td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <h5><i class="fa-solid fa-clipboard-list"></i> Pembagi</h5>
                <br>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr class="header bg-light">
                            <?php  foreach($kriterias as $kriteria) :?>
                                <th><?= $kriteria->kode_kriteria; ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php  foreach($kriterias as $kriteria) :?>
                                <td><?php echo $pembagi[$kriteria->kriteria] ?></td>
                            <?php endforeach ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <h5><i class="fa-solid fa-clipboard-list"></i> Normalisasi</h5>
                <br>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr class="header bg-light">
                            <th>No</th>
                            <th>Nama</th>
                            <?php  foreach($kriterias as $kriteria) :?>
                                <th><?= $kriteria->kode_kriteria; ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($mbrs as $mbr) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $mbr->nama_mbr ?></td>
                                <?php  foreach($kriterias as $kriteria) :?>
                                    <td><?php echo $normalisasi[$kriteria->kriteria][$mbr->nik] ?></td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <h5><i class="fa-solid fa-clipboard-list"></i> Optimasi</h5>
                <br>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr class="header bg-light">
                            <th>No</th>
                            <th>Nama</th>
                            <?php  foreach($kriterias as $kriteria) :?>
                                <th><?= $kriteria->kode_kriteria; ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($mbrs as $mbr) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $mbr->nama_mbr ?></td>
                                <?php  foreach($kriterias as $kriteria) :?>
                                    <td><?php echo $optimasi[$kriteria->kriteria][$mbr->nik] ?></td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <h5><i class="fa-solid fa-clipboard-list"></i> Menghitung Nilai Yi</h5>
                <br>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr class="header bg-light">
                            <th>No</th>
                                <?php if(!empty($max)): ?>
                                    <th>MAX (
                                        <?php  foreach($kriterias_max as $index => $kriteria) :?>
                                            <?= $kriteria->kode_kriteria ?>
                                        <?php endforeach ?>
                                        )</th>
                                <?php endif ?>
                                <?php if(!empty($min)): ?>
                                    <th>MIN (
                                        <?php  foreach($kriterias_min as $index => $kriteria) :?>
                                            <?= $kriteria->kode_kriteria ?>
                                        <?php endforeach ?>
                                        )</th>
                                <?php endif ?>
                            <th>Nilai Yi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($mbrs as $mbr) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <?php if(!empty($max)): ?>
                                    <td><?php echo $max[$mbr->nik] ?></td>
                                <?php endif ?>
                                <?php if(!empty($min)): ?>
                                    <td><?php echo $min[$mbr->nik] ?></td>
                                <?php endif ?>
                                <td><?php echo $yi[$mbr->nik] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <h5><i class="fa-solid fa-clipboard-list"></i> Hasil Ranking MBR</h5>
                <br>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr class="header bg-light">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nilai Yi</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($sort as $key => $value) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $nama_mbr[$key] ?></td>
                                <td><?php echo $yi[$key] ?></td>
                                <td><?php echo $rank[$key] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<!-- Container-fluid Ends-->
</div>