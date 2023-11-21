<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url() ?>/assets/images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/images/logo.png" type="image/x-icon">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            margin: 0 auto;
        }
        th, td {
            width: auto;
            font-size: 12px;
            text-align: left;
            padding: 3px 10px;
            border: 1px solid #000000;
        }
        .signature_wrapper{
            text-align: right;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="rpw">
        <div class="col-4">
            <img src="<?php echo base_url() ?>/assets/images/logo/logo.png" alt="" width="120px" height="160px">
        </div>
        <div class="col-8">
            <div style="text-align: center; margin-top: -170px;  margin-left: 50px">
                <h3>PEMERINTAH KOTA SURABAYA</h3>
                <h3>DINAS PEMBERDAYAAN PEREMPUAN DAN</h3>
                <H3>PERLINDUNGAN ANAK SERTA PENGENDALIAN</H3>
                <h3>PENDUDUK DAN KELUARGA BERENCANA</h3>
                <h8>Jalan Kedungsari No. 18 Surabaya</h8>
                <br>
                <h8>Telp. (031) 5346317 Fax. (031) 5480904</h8>
            </div>
        </div>
    </div>
    <br>
    <br>
    <h3 style="text-align: center">Laporan Hasil Perhitungan MBR Kecamatan <?php echo $kecamatan_dua ?></h3>
    <br>
    <?php function tgl_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);
      
      // variabel pecahkan 0 = tanggal
      // variabel pecahkan 1 = bulan
      // variabel pecahkan 2 = tahun
    
      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    } ?>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Tanggal Perhitungan</th>
            <th>NIK</th>
            <th>Nama MBR</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Nilai</th>
            <th>Status</th>
        </tr>
        <?php $no=1; foreach($laporan as $l) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $l->tanggal_hitung ?></td>
            <td><?php echo $l->nik ?></td>
            <td><?php echo $l->nama_mbr ?></td>
            <td><?php echo $l->kecamatan ?></td>
            <td><?php echo $l->kelurahan ?></td>
            <td><?php echo $l->nilai ?></td>
            <td><?php echo $l->status ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <br>
    <div class="signature_wrapper">
        <p>Surabaya, <?php echo tgl_indo(date("Y-m-d")); ?></p>
        <br>
        <br>
        <p class="font-weight-bold"><br>_______________________<br></p>
    </div>

</body>
</html>