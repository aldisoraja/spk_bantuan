<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="page-header mt-3">
    <h4><i class="fa-solid fa-calculator"></i> <?php echo $title ?></h4>
  </div>
</div>  
  <div class="container-fluid">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('kecamatan/Hitung/hitung') ?>">
        <div class="form-group">
            <label>Jumlah Penerima Bantuan :</label>
            <input type="number" name="jumlah_penerima" class="form-control" placeholder="Masukkan Jumlah Penerima Bantuan...">
        </div>
        <br>
        <br>
        <div style="text-align: center;">
          <button type="submit" class="btn btn-success"><i class="fa-solid fa-calculator"></i> Masukkan</button>
          <button type="reset" class="btn btn-danger"><i class="fa-solid fa-arrows-rotate"></i> Reset</button>  
        </div>
      </form>
    </div>
  </div>
<!-- Container-fluid Ends-->
</div>