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
        img {
            margin-left: 40px;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            margin-right: 100px;
        }
        th, td {
            text-align: left;
            padding: 5px 6px;
            border: 1px solid #000000;
        }
        .signature_wrapper{
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="rpw">
        <div class="col-4">
            <img src="<?php echo base_url() ?>/assets/images/logo/logo.png" alt="" width="150px" height="200px">
        </div>
        <div class="col-8">
            <div style="text-align: center; margin-top: -210px;  margin-left: 70px">
                <h2>PEMERINTAH KOTA SURABAYA</h2>
                <h2>DINAS PEMBERDAYAAN PEREMPUAN DAN</h2>
                <H2>PERLINDUNGAN ANAK SERTA PENGENDALIAN</H2>
                <h2>PENDUDUK DAN KELUARGA BERENCANA</h2>
                <h8>Jalan Kedungsari No. 18 Surabaya</h8>
                <br>
                <h8>Telp. (031) 5346317 Fax. (031) 5480904</h8>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <h3 style="text-align: center">Laporan Data MBR
        <?php echo "Kelurahan ".$kelurahan_dua?>
        <!-- <?php echo ($bulan_tahun =='-' OR empty($bulan_tahun))?date("F Y"):date("F Y",strtotime($bulan_tahun)); ?> -->
    </h3>
    <br>
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
    <table class="table table-responsive" border="1">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Metode Kontrasepsi</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <?php foreach($kriterias as $kriteria): ?>    
                <th><?= $kriteria->kriteria; ?></th>
            <?php endforeach ?>
        </tr>
        <?php $no=1; foreach($mbrs as $mbr) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $mbr->nik ?></td>
            <td><?php echo date("d-m-Y", strtotime($mbr->tanggal)) ?></td>
            <td><?php echo $mbr->nama_mbr ?></td>
            <td><?php echo $mbr->met_kontra ?></td>
            <td><?php echo $mbr->kecamatan ?></td>
            <td><?php echo $mbr->kelurahan ?></td>
            <?php foreach($kriterias as $kriteria): ?>    
                <td><?php echo $sub_kriteria_mbrs[$kriteria->kriteria][$mbr->nik] ?></td>
            <?php endforeach ?>
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