<!-- footer start-->
<footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2022 © DP3APPKB Kota Surabaya.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">dibuat oleh Al <i class="fa fa-heart font-success"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="<?php echo base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo base_url() ?>/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo base_url() ?>/assets/js/sidebar-menu.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo base_url() ?>/assets/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo base_url() ?>/assets/js/chart/chartist/chartist.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/chart/knob/knob.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/chart/knob/knob-chart.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/prism/prism.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/clipboard/clipboard.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/counter/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/counter/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/counter/counter-custom.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom-card/custom-card.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/dashboard/default.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/notify/index.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
    <!-- <script src="<?php echo base_url() ?>/assets/js/theme-customizer/customizer.js"></script> -->
    <!-- Plugin used-->  
    <!-- Data Tables-->
    <script src="<?php echo base_url() ?>/assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <!-- Data Tables Ends-->
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- selectends -->
    <!-- sweetalert2 -->
    <script src="<?php echo base_url() ?>/assets/js/sweet-alert/app.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/sweet-alert/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Alert Tambah Data
      <?php if($this->session->flashData('tambah')) { ?>
        var isi = <?php echo json_encode ($this->session->flashData('tambah')) ?>;
          Swal.fire({        
            icon: 'success',
            title: 'Berhasil',
            text: isi,
          })
      <?php unset($_SESSION['tambah']); } ?>

      // Alert Ubah Data
      <?php if($this->session->flashData('ubah')) { ?>
        var isi = <?php echo json_encode ($this->session->flashData('ubah')) ?>;
          Swal.fire({        
            icon: 'info',
             title: 'Berhasil',
            text: isi,
          })
      <?php unset($_SESSION['ubah']); } ?>

      // Alert Hapus Data
      $(document).on('click', '#btn-hapus', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        
        Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: 'Data ini Akan Dihapus ??',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#00a65a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus !!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Berhasil',
              'Data Berhasil Dihapus !!',
              'success'
            )  
            window.location = link;
          }
        })
        
      })

      // Alert Login
      <?php if($this->session->flashdata('sukses')) { ?>
        var isi = <?php echo json_encode ($this->session->flashData('sukses')) ?>;
          Swal.fire({        
            icon: 'success',
            title: 'Berhasil Login',
            text: isi,
          })
      <?php unset($_SESSION['sukses']); } ?>
      
    </script>
    <!-- sweetalert2 Ends-->
    <!-- select2 -->
    <script>
        $('#select1').select2({
          placeholder: "-- Pilih Metode Kontrasepsi --"
        });
        $('.select2').each(function(index, el){
          $(this).select2();
        });
        $('.select3').each(function(index, el){
          $(this).select2();
        });
        $('.select4').each(function(index, el){
          $(this).select2();
        });
    </script>
    <!-- select2ends -->

    </body>
</html>