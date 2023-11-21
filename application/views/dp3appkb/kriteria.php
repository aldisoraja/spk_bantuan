<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i data-feather="server"></i> <?php echo $title ?></h4>
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
                        <h5 class="modal-title" style="margin-left: 25px" id="exampleModalLabel"><i class="fa-solid fa-server"></i> Form Tambah Data Kriteria</h5>
                    </div>
                    <div class="modal-body">
                    <form action="<?php echo base_url('dp3appkb/kriteria/tambahDataAksi') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label style="margin-left: 30px">Kode Kriteria :</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="kode_kriteria" class="form-control" placeholder="Contoh: C1" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label style="margin-left: 30px">Nama Kriteria :</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="kriteria" class="form-control" placeholder="Masukkan Nama Kriteria..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label style="margin-left: 30px">Bobot Kriteria :</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="bobot" class="form-control" placeholder="Contoh : 1 - 100" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label style="margin-left: 30px">Jenis Kriteria :</label>
                                </div>
                                <div class="col-9">
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Benefit" checked>
                                        <label class="form-check-label" for="inlineRadio1">Benefit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Cost" checked>
                                        <label class="form-check-label" for="inlineRadio1">Cost</label>
                                    </div>
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
                            <th>Kode Kriteria</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Jenis Kriteria</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($kriteria as $k) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $k->kode_kriteria ?></td>
                                <td><?php echo $k->kriteria ?></td>
                                <td><?php echo $k->bobot ?></td>
                                <td><?php echo $k->jenis ?></td>

                                <td>
                                    <center>
                                    <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#Ubah<?php echo $k->id_kriteria ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <a href="<?php echo base_url('dp3appkb/kriteria/deleteData/'.$k->id_kriteria) ?>" id="btn-hapus"><button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can"></i></button></a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Edit-->
        <?php foreach ($kriteria as $k): ?>
        <div class="modal fade" id="Ubah<?php echo $k->id_kriteria ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" style="margin-left: 25px" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> Form Ubah Data Kriteria</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="<?php echo base_url('dp3appkb/kriteria/updateDataAksi') ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label style="margin-left: 30px">Kode Kriteria :</label>
                                </div>
                                <div class="col-9">
                                    <input type="hidden" name="id_kriteria" class="form-control" value="<?php echo $k->id_kriteria ?>">
                                    <input type="text" name="kode_kriteria" class="form-control" placeholder="Readonly input here…" readonly value="<?php echo $k->kode_kriteria ?>">
                                    <?php echo form_error('kode_kriteria','<div class="text-small text-danger"></div>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label style="margin-left: 30px">Kriteria :</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="kriteria" class="form-control" value="<?php echo $k->kriteria ?>">
                                    <?php echo form_error('kriteria','<div class="text-small text-danger"></div>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label style="margin-left: 30px">Bobot :</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="bobot" class="form-control" value="<?php echo $k->bobot ?>">
                                    <?php echo form_error('bobot','<div class="text-small text-danger"></div>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label style="margin-left: 30px">Jenis Kriteria :</label>
                                </div>
                                <div class="col-9">
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Benefit"
                                            <?php if($k->jenis=='Benefit') {
                                                echo "checked";
                                            } ?> >
                                        <label class="form-check-label" for="inlineRadio1">Benefit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Cost"
                                            <?php if($k->jenis=='Cost') {
                                                echo "checked";
                                            } ?> >
                                        <label class="form-check-label" for="inlineRadio1">Cost</label>
                                    </div>
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