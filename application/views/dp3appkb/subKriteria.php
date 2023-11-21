<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i data-feather="database"></i> <?php echo $title ?></h4>
    </div>
</div>  
<div class="container-fluid">

    <!-- Button Trigger Modal -->
    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i> Tambah Data</button>
    <!-- Modal Tambah-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" style="margin-left: 25px" id="exampleModalLabel"><i class="fa-solid fa-database"></i> Form Tambah Data Sub-Kriteria</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo base_url('dp3appkb/subKriteria/tambahDataAksi') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label style="margin-left: 30px">Kriteria :</label>
                            </div>
                            <div class="col-9">
                                <select name="nama_kriteria" class="js-example-basic-single form-select" required>
                                    <option value="">-- Pilih Kriteria --</option>
                                    <?php foreach($kriteria as $k) : ?>
                                    <option value="<?php echo $k->kriteria ?>"><?php echo $k->kriteria ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label style="margin-left: 30px">Nama Sub-Kriteria :</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="nama_sub" class="form-control" placeholder="Masukkan Nama Sub-Kriteria..." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label style="margin-left: 30px">Nilai Sub-Kriteria :</label>
                            </div>
                            <div class="col-9">
                                <select name="nilai_sub" class="js-example-basic-single form-select" required>
                                    <option value="">-- Pilih Nilai Sub-Kriteria --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Batal</button>
                    <button class="btn btn-success" type="submit"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- body -->
    <div class="card-body">
        <div class="table table-responsive">
            <table class="display" id="basic-1">
                <thead>
                    <tr class="bg-light">
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Nama Sub-Kriteria</th>
                        <th>Nilai</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($sub_kriteria as $sk) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $sk->nama_kriteria ?></td>
                            <td><?php echo $sk->nama_sub ?></td>
                            <td><?php echo $sk->nilai_sub ?></td>

                            <td>
                                <center>
                                <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#Ubah<?php echo $sk->id_sub ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah"><i class="fa-solid fa-pen-to-square"></i></button>
                                <a href="<?php echo base_url('dp3appkb/subKriteria/deleteData/'.$sk->id_sub) ?>" id="btn-hapus"><button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can"></i></button></a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($sub_kriteria as $sk): ?>
    <div class="modal fade" id="Ubah<?php echo $sk->id_sub ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" style="margin-left: 25px" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> Form Ubah Data Sub-Kriteria</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('dp3appkb/subKriteria/updateDataAksi') ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label style="margin-left: 30px">Kriteria :</label>
                            </div>
                            <div class="col-9">
                                <input type="hidden" name="id_sub" class="form-control" value="<?php echo $sk->id_sub ?>">
                                <select name="nama_kriteria" class="js-example-basic-single form-select" id="select_<?php echo $sk->nama_kriteria ?>">
                                    <option value="<?php echo $sk->nama_kriteria ?>"><?php echo $sk->nama_kriteria ?></option>
                                    <?php foreach($kriteria as $k) : ?>
                                    <option value="<?php echo $k->kriteria ?>"><?php echo $k->kriteria ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label style="margin-left: 30px">Sub-Kriteria :</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="nama_sub" class="form-control" value="<?php echo $sk->nama_sub ?>">
                                <?php echo form_error('nama_sub','<div class="text-small text-danger"></div>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label style="margin-left: 30px">Nilai Sub-Kriteria :</label>
                            </div>
                            <div class="col-9">
                                <select name="nilai_sub" class="js-example-basic-single form-select" id="select_<?php echo $sk->nilai_sub ?>">
                                    <option value="<?php echo $sk->nilai_sub ?>"><?php echo $sk->nilai_sub ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <?php echo form_error('nilai_sub','<div class="text-small text-danger"></div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Batal</button>
                    <button class="btn btn-success" type="submit"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
<!-- Container-fluid Ends-->

</div>

<script>
   
        
</script>