<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i data-feather="user-plus"></i> <?php echo $title ?></h4>
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
                        <h5 class="modal-title" style="margin-left: 25px" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Form Tambah Data Hak Akses</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('dp3appkb/hakAkses/tambahDataAksi') ?>" method="POST">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">id Akses :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="id_akses" class="form-control" placeholder="Contoh : 357800" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Nama Akses :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="nama_akses" class="form-control" placeholder="Contoh: Kecamatan Wonokromo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Username :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Password :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="password" class="form-control" placeholder="Masukkan Password..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Akses Masuk :</label>
                                    </div>
                                    <div class="col-9">
                                        <select name="role_id" class="js-example-basic-single form-select role_id" id="role_id" required>
                                            <option value="">-- Pilih Akses Masuk --</option>
                                            <option value="1">Kota</option>
                                            <option value="2">Kecamatan</option>
                                            <option value="3">Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="group-kecamatan" hidden>
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Kecamatan :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="kec" class="form-control" placeholder="Contoh: Wonokromo" id="kec">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="group-kelurahan" hidden>
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Kelurahan :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="kel" class="form-control" placeholder="Contoh: Darmo" id="kel">
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
        </div>
        

        <!-- body -->
        <div class="card-body">
            <div class="table table-responsive">
                <table class="display" id="basic-1">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>id Akses</th>
                            <th>Nama Akses</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Akses Masuk</th>
                            <th>Status</th>
                            <th class="text-center">Tombol Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($akses as $a) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $a->id_akses ?></td>
                                <td><?php echo $a->nama_akses ?></td>
                                <td><?php echo $a->username ?></td>
                                <td><?php echo $a->password ?></td>
                                <?php if($a->role_id=='1') { ?>
                                    <td>Kota</td>
                                <?php }elseif($a->role_id=='2') { ?>
                                    <td>Kecamatan</td>
                                <?php }else{ ?>
                                    <td>Kelurahan</td>
                                <?php } ?>
                                <td><?php echo $a->status ?></td>
                                <td>
                                    <center>
                                        <div class="media-body text-end">
                                            <label class="switch">
                                                <input type="checkbox" name="status" id="status" class="status" <?php echo ($a->status == 'Aktif')?"checked":""; ?> value="<?php echo $a->id_akses ?>"><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                    <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#Ubah<?php echo $a->id_akses ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <a href="<?php echo base_url('dp3appkb/hakAkses/deleteData/'.$a->id_akses) ?>" id="btn-hapus"><button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can"></i></button></a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    
        <!-- Modal Edit-->
        <?php foreach ($akses as $a): ?>
        <div class="modal fade" id="Ubah<?php echo $a->id_akses ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" style="margin-left: 25px" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> Form Ubah Data Hak Akses</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo base_url('dp3appkb/hakAkses/updateDataAksi') ?>">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">id Akses :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="id_akses" class="form-control" placeholder="Readonly input here…" readonly value="<?php echo $a->id_akses ?>">
                                        <?php echo form_error('id_akses','<div class="text-small text-danger"></div>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Nama Akses :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="nama_akses" class="form-control" value="<?php echo $a->nama_akses ?>">
                                        <?php echo form_error('nama_akses','<div class="text-small text-danger"></div>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Username :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="username" class="form-control" value="<?php echo $a->username ?>" readonly>
                                        <?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Password :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="password" class="form-control" value="<?php echo $a->password ?>">
                                        <?php echo form_error('password','<div class="text-small text-danger"></div>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Akses Masuk :</label>
                                    </div>
                                    <div class="col-9">
                                        <select name="edit_role_id" class="js-example-basic-single form-select edit_role_id" id="edit_role_id" required>
                                            <option value="<?php echo $a->role_id ?>">
                                                <?php if($a->role_id=='1') {
                                                    echo "Kota";
                                                }elseif($a->role_id=='2') {
                                                    echo "Kecamatan";
                                                }else{
                                                    echo "Kelurahan";
                                                } ?>
                                            </option>
                                            <option value="1">Kota</option>
                                            <option value="2">Kecamatan</option>
                                            <option value="3">Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group edit-group-kecamatan" id="edit-group-kecamatan" <?= (!empty($a->kec)) ?"":" hidden" ?>>
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Kecamatan :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="edit_kec" class="form-control edit-kec" id="edit-kec" value="<?= $a->kec; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group edit-group-kelurahan" id="edit-group-kelurahan"<?= (!empty($a->kel)) ?"":" hidden" ?>>
                                <div class="row">
                                    <div class="col-3">
                                        <label style="margin-left: 30px">Kelurahan :</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="edit_kel" class="form-control edit-kel" id="edit-kel" value = "<?= $a->kel; ?>">
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