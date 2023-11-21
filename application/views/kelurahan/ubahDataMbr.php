<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="page-header mt-3">
    <h4><i data-feather="users"></i> <?php echo $title ?></h4>
    <a class="btn btn-light" href="<?php echo base_url('kelurahan/dataMbr') ?>" style="margin-left: 870px"><i class="fa-sharp fa-solid fa-arrow-left"></i> Kembali</a>
  </div>

  <div class="card">
      <div class="card-body">
        
        <form method="POST" action="<?php echo base_url('kelurahan/dataMbr/updateDataAksi') ?>" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="<?php echo $mbrs->kecamatan ?>" readonly>
                    <?php echo form_error('kecamatan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control" value="<?php echo $mbrs->kelurahan ?>" readonly>
                    <?php echo form_error('kelurahan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" readonly value="<?php echo $mbrs->nik ?>">
                    <?php echo form_error('nik','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Nama MBR</label>
                    <input type="text" name="nama_mbr" class="form-control" value="<?php echo $mbrs->nama_mbr ?>">
                    <?php echo form_error('nama_mbr','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Metode Kontrasepsi</label>
                    <select name="met_kontra" class="form-select select3" id="select_<?php echo $mbrs->met_kontra ?>">
                        <option value="<?php echo $mbrs->met_kontra ?>"><?php echo $mbrs->met_kontra ?></option>
                        <option value="Implan KB">Implan KB</option>
                        <option value="IUD">Intra Uterine Device (IUD)</option>
                        <option value="MOW">Tubektomi (MOW)</option>
                    </select>
                    <?php echo form_error('met_kontra','<div class="text-small text-danger"></div>') ?>
                </div>
            </div>
            
            <div class="col-md-6">
                <?php foreach($kriterias_with_sub as $kws):?>
                <div class="form-group">
                    <label><?= $kws['kriteria'] ?> *</label>
                    <select name="<?= strtolower(str_replace(" ", "_", $kws['kriteria'])) ?>" class="form-select select4" id="select_<?= $kws['kriteria'] ?>">
                        <option value="<?= $id_sub_kriteria_mbrs[$kws['kriteria']][$mbrs->nik] ?>"><?= $sub_kriteria_mbrs[$kws['kriteria']][$mbrs->nik] ?></option>
                        <?php foreach($kws['sub'] as $sub) : ?>
                        <option value="<?= $sub->id_sub ?>"><?= $sub->nama_sub ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endforeach?>
                <button type="submit" class="btn btn-success mt-3"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Simpan</button>
              </div>
          </div>

        </form>
      </div>
  </div>

</div>  
<!-- Container-fluid Ends-->
</div>