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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <script src="<?php echo base_url() ?>/assets/js/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/select2/select2-custom.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> -->
    <!-- selectends -->
    <!-- sweetalert2 -->
    <script src="<?php echo base_url() ?>/assets/js/sweet-alert/app.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/sweet-alert/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- sweetalert2 Ends-->
    <script>
    // Alert Tambah Data
      <?php if($this->session->flashdata('tambah')) { ?>
        var isi = <?php echo json_encode ($this->session->flashData('tambah')) ?>;
          Swal.fire({        
            icon: 'success',
            title: 'Berhasil',
            text: isi,
          })
      <?php unset($_SESSION['tambah']); } ?>

      // Alert Ubah Data
      <?php if($this->session->flashdata('ubah')) { ?>
        var isi = <?php echo json_encode ($this->session->flashdata('ubah')) ?>;
          Swal.fire({        
            icon: 'info',
             title: 'Berhasil',
            text: isi,
          })
      <?php unset($_SESSION['ubah']);} ?>
      
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

      // Alert Kriteria
      <?php if($this->session->flashdata('info')) { ?>
        var isi = <?php echo json_encode ($this->session->flashData('info')) ?>;
          Swal.fire({        
            icon: 'info',
            title: 'Gagal',
            text: isi,
          })
      <?php unset($_SESSION['info']); } ?>

    </script>
    <!-- sweetalert2 Ends-->
    <!-- Role id -->
    <script>
      $(document).on('change', '#role_id', function (e) {
        e.preventDefault();
        let role_id = $(`select[name=role_id] option`).filter(':selected').val();
        console.log(role_id);
        var groupKecamatan = $(`#group-kecamatan`);
        var groupKelurahan = $(`#group-kelurahan`);
        var kecamatan = $(`#kec`);
        var kelurahan = $(`#kel`);

        if (role_id == 2) {
            groupKecamatan.removeAttr("hidden");
            kecamatan.prop("required", true);
            groupKelurahan.attr("hidden", true);
            kelurahan.removeAttr("required");
        }else if (role_id == 3){
          kecamatan.prop("required", true);
          kelurahan.prop("required", true);
          groupKecamatan.removeAttr("hidden");
          groupKelurahan.removeAttr("hidden");
        }else{
          groupKecamatan.attr("hidden", true);
          groupKelurahan.attr("hidden", true);
          kecamatan.removeAttr("required");
          kelurahan.removeAttr("required");
        }
      })

      $('.status').each((i, el) => {
        $(el).on('change', (e)=>{
          if ($(e.target).is(':checked')) {
            console.log($(e.target).val());
            status = "Aktif";
            id_akses = $(e.target).val();
            $.ajax({
                    type: "post",
                        url: "<?php echo base_url(); ?>dp3appkb/hakAkses/updateStatus",
                        data: {
                            'status': status,
                            'id_akses': id_akses
                        },
                        success: function(data){
                        }
            });
          }else{
            status = "Nonaktif";
            id_akses = $(e.target).val();
            $.ajax({
                    type: "post",
                        url: "<?php echo base_url(); ?>dp3appkb/hakAkses/updateStatus",
                        data: {
                            'status': status,
                            'id_akses': id_akses
                        },
                        success: function(data){
                        }
            });
          }
        });
      });
    </script>
    <script>
      $('.edit_role_id').each((i, el) => {
        $(el).on('change', (e)=>{
        let edit_role_id = $(e.target).val();
        var editGroupKecamatan = $(`.edit-group-kecamatan`);
        var editGroupKelurahan = $(`.edit-group-kelurahan`);
        var editKecamatan = $(`.edit-kec`);
        var editKelurahan = $(`.edit-kel`);
        

       if (edit_role_id == 2) {
            editGroupKecamatan.removeAttr("hidden");
            editKecamatan.prop("required", true);
            editGroupKelurahan.attr("hidden", true);
            editKelurahan.removeAttr("required");
            editKelurahan.val("");
        }else if (edit_role_id == 3){
          editKecamatan.prop("required", true);
          editKelurahan.prop("required", true);
          editGroupKecamatan.removeAttr("hidden");
          editGroupKelurahan.removeAttr("hidden");
        }else{
          editGroupKecamatan.attr("hidden", true);
          editGroupKelurahan.attr("hidden", true);
          editKecamatan.removeAttr("required");
          editKelurahan.removeAttr("required");
          editKelurahan.val("");
          editKecamatan.val("");
        }
        });
      });
    </script>

    <script>
//       $(document).on('change', '#edit_role_id', function (e) {
//         e.preventDefault();
//         let edit_role_id = $(`select[name=edit_role_id] option`).filter(':selected').val();
//         console.log(edit_role_id);
//         var editGroupKecamatan = $(`#edit-group-kecamatan`);
//         var editGroupKelurahan = $(`#edit-group-kelurahan`);
//         var editKecamatan = $(`#edit-kec`);
//         var editKelurahan = $(`#edit-kel`);

//        if (role_id == 2) {
//             editGroupKecamatan.removeAttr("hidden");
//             editKecamatan.prop("required", true);
//             editGroupKelurahan.attr("hidden", true);
//             editKelurahan.removeAttr("required");
//         }else if (role_id == 3){
//           editKecamatan.prop("required", true);
//           editKelurahan.prop("required", true);
//           editGroupKecamatan.removeAttr("hidden");
//           editGroupKelurahan.removeAttr("hidden");
//         }else{
//           editGroupKecamatan.attr("hidden", true);
//           editGroupKelurahan.attr("hidden", true);
//           editKecamatan.removeAttr("required");
//           editKelurahan.removeAttr("required");
//         }
//       })
      // $.fn.datepicker.dates['id'] = {
      // days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
      // daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
      // daysMin: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
      // months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      // monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
      // today: 'Hari Ini',
      // clear: 'Clear',
      // format: 'yyyy-mm-dd',
      // titleFormat: 'MM yyyy',
      // weekStart: 0
      // };

      // $("#bulan").datepicker({
      //     format: 'MM',
      //     changeMonth: true,
      //     viewMode: 'months',
      //     minViewMode: 'months',
      //     language: 'id',
      //     locale: 'id',
      //     autoclose: true,
      //     todayHighlight: 'true'
      // });

      // $(document).ready(function () {
      //     $('.input-group.date').datetimepicker({
      //         locale: 'id',
      //         format: "yyyy-mm-dd",
      //         autoclose: true,
      //         language: 'id',
      //     });
      // });

      // $('#datepicker').datepicker( {
      //     autoclose: true,
      //     todayHighlight:'true',
      // });
    </script>

    </body>
</html>