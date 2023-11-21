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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/datepicker/date-picker/datepicker.id.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <!-- <script src="<?php echo base_url() ?>/assets/js/datepicker/bootstrap-datepicker.js"></script> -->
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
      // Alert Login
      <?php if($this->session->flashdata('sukses')) { ?>
        var isi = <?php echo json_encode ($this->session->flashData('sukses')) ?>;
          Swal.fire({        
            icon: 'success',
            title: 'Berhasil Login',
            text: isi,
          })
      <?php unset($_SESSION['sukses']); } ?>
      // Alert Hitung
      <?php if($this->session->flashdata('hasil')) { ?>
        var isi = <?php echo json_encode ($this->session->flashData('hasil')) ?>;
          Swal.fire({        
            icon: 'success',
            title: 'Perhitungan Berhasil',
            text: isi,
          })
      <?php unset($_SESSION['hasil']); } ?>
    </script>
    <script>
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
    </script>
    <!-- alertHitung -->
    <script>
      <?php if($this->session->flashdata('gagal')) { ?>
				var isi = <?php echo json_encode ($this->session->flashData('gagal')) ?>;
				Swal.fire({        
					icon: 'info',
					title: 'Oops...',
					text: isi,
				})
			<?php unset($_SESSION['gagal']); } ?>
    </script>
    <!-- sweetalert2 Ends-->
    <!-- Datapicker -->
    <script>
      // $("#bulan").datepicker({
      //     language: 'en',
      //     autoclose: true,
      // });
      // $("#tahun").datepicker({
      //     language: 'en',
      //     autoclose: true,
      // });
    </script>
    <!-- Datapicker Ends -->
    <!-- select2 -->
    <script>
        $('#select1').select2({
          placeholder: "-- Pilih Kelurahan --"
        });
    </script>
    <!-- select2ends -->
    <!-- checkbox -->
    <script>
      function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      let bulan_tahun = $("#bulan_tahun").val();
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox' ) {
                    checkboxes[i].checked = true;
                }
            }
            let keterangan = "Pilih";
            
           
            $.ajax({
              type: "post",
                  url: "<?php echo base_url(); ?>kecamatan/dataMbr/updateCheckAll",
                  data: {
                      'keterangan': keterangan,
                      'bulan_tahun': bulan_tahun,
                  },
                  success: function(data){
                }
              });
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
            let keterangan = "Tidak Dipilih";
            console.log(bulan_tahun);
            $.ajax({
                    type: "post",
                        url: "<?php echo base_url(); ?>kecamatan/dataMbr/updateCheckAll",
                        data: {
                            'keterangan': keterangan,
                            'bulan_tahun': bulan_tahun,
                        },
                        success: function(data){
                        }
            });
        }
      };

      let niks = [];
      $('.checkbox').each(function(i, el){
        $(el).on('change', function(){
          if(this.checked){
            // niks.push(this.value);
            let keterangan = "Pilih";
            nik = this.value;
            console.log(nik);
            $.ajax({
              type: "post",
                  url: "<?php echo base_url(); ?>kecamatan/dataMbr/updateKeterangan",
                  data: {
                      'keterangan': keterangan,
                      'nik': nik
                  },
                  success: function(data){
                }
              });
          }else{
            // niks = niks.filter((nik) => nik != this.value);
            let keterangan = "Tidak Dipilih";
            nik = this.value;
            console.log(nik);
            $.ajax({
                    type: "post",
                        url: "<?php echo base_url(); ?>kecamatan/dataMbr/updateKeterangan",
                        data: {
                            'keterangan': keterangan,
                            'nik': nik
                        },
                        success: function(data){
                        }
            });
            
          }
        });
      });
    </script>
    <!-- checkbox Ends -->
    <!-- Datatables -->
    <script>
      $(document).ready( function () {
          $('#tabel1').DataTable();
      });
      $(document).ready( function () {
          $('#tabel2').DataTable();
      });
      $(document).ready( function () {
          $('#tabel3').DataTable();
      });
      $(document).ready( function () {
          $('#tabel4').DataTable();
      });
      $(document).ready( function () {
          $('#tabel5').DataTable();
      });
    </script>
    <!-- Datatables END -->

    </body>
</html>