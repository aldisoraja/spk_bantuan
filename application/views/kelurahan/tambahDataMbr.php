<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="page-header mt-3">
    <h4><i data-feather="users"></i> <?php echo $title ?></h4>
    <a class="btn btn-light" href="<?php echo base_url('kelurahan/dataMbr') ?>" style="margin-left: 870px"><i class="fa-sharp fa-solid fa-arrow-left"></i> Kembali</a>
  </div>

  <div class="card">
      <div class="card-body">
        <form method="POST" action="<?php echo base_url('kelurahan/dataMbr/tambahDataAksi') ?>" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="<?php echo $this->session->userdata('kec'); ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control" value="<?php echo $this->session->userdata('kel'); ?>" readonly>
                </div>
                <div class="form-group">
                    <label>NIK *</label>
                    <input type="text" name="nik" class="form-control" placeholder="Contoh : 3567865786876908" required>
                </div>
                <div class="form-group">
                    <label>Nama MBR *</label>
                    <input type="text" name="nama_mbr" class="form-control" placeholder="Masukkan Nama MBR ..." required>
                </div>
                <div class="form-group">
                    <label>Metode Kontrasepsi *</label>
                    <select name="met_kontra" class="form-select select2" id="select1" required>
                        <option value="">--Pilih Metode Kontrasepsi--</option>
                        <option value="Implan KB">Implan KB</option>
                        <option value="IUD">Intra Uterine Device (IUD)</option>
                        <option value="MOW">Tubektomi (MOW)</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <?php foreach($kriterias_with_sub as $kws):?>
                <div class="form-group">
                    <label><?= $kws['kriteria'] ?> *</label>
                    <select name="<?= strtolower(str_replace(" ", "_", $kws['kriteria'])) ?>" class="form-select select2" id="select_<?= $kws['kriteria'] ?>" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach($kws['sub'] as $sub) : ?>
                        <option value="<?= $sub->id_sub ?>"><?= $sub->nama_sub ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endforeach?>
                <button type="reset" class="btn btn-danger mt-3"><i class="fa-solid fa-arrows-rotate"></i> Reset</button>
                <button type="submit" class="btn btn-success mt-3"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Simpan</button>
              </div>
          </div>

        </form>
      </div>
  </div>

</div>  
<!-- Container-fluid Ends-->
</div>