<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="page-header mt-3">
    <h4><?php echo $title ?></h4>
  </div>
</div>  
  <div class="container-fluid">
    
  </div>
<!-- Container-fluid Ends-->
</div>

<style>
  @media print{
    @page {size: A4 landscape}
  }
</style>

<h4 class="text-dark">Sistem Pendukung Keputusan (SPK)</h4>
<br>
<h6>
    Sistem Pendukung Keputusan (SPK) adalah sistem informasi interaktif yang menyediakan informasi, 
    pemodelan, dan pemanipulasian data. Sistem SPK digunakan untuk membantu pengambilan keputusan dalam 
    situasi yang semi terstruktur dan situasi yang tidak terstruktur, dimana tak seorang pun tahu secara 
    pasti bagaimana keputusan seharusnya dibuat.
</h6>
<br>
<h4 class="text-dark">Metode Multi-Objective Optimization by Ratio Analysis (MOORA)</h4>
<br>
<h6>
    Metode Multi-Objective Optimization on the Basis of Ratio Analisis (MOORA) 
    adalah metode yang diperkenalkan oleh Brauers dan Zavadskas.
    Metode ini merupakan sistem multiobjektif pada pengoptimalan dua atau lebih atribut 
    yang saling bertentangan secara bersamaan atau biasa disebut suatu pengambilan dengan multi-kriteria.
    Metode ini memiliki tingkat selektifitas yang baik dalam menentukan suatu alternatif.
</h6>

<h3 style="text-align: center">Laporan Hasil Perhitungan MBR Kecamatan <?php echo $kecamatan_dua ?></h3>

<h3 style="text-align: center">Laporan Data MBR
    <?php echo empty($kelurahan_dua)? "Kecamatan ".$kec:"Kelurahan ".$kelurahan_dua ;?>
    <?php echo ($bulan_tahun =='-' OR empty($bulan_tahun))?date("F Y"):date("F Y",strtotime($bulan_tahun)); ?>
</h3>

<h3 style="text-align: center">Laporan Hasil Perhitungan MBR
    <?php echo empty($kelurahan_dua)? "Kecamatan ".$kec:"Kelurahan ".$kelurahan_dua ;?>
</h3>

<h3 style="text-align: center">Laporan Hasil Perhitungan MBR
    <?php echo empty($kelurahan_dua)? "Kecamatan ".$kec:"Kelurahan ".$kelurahan_dua ;?>
</h3>

<h3 style="text-align: center">Laporan Data MBR
    <?php echo "Kelurahan ".$kelurahan_dua?>
    <?php echo ($bulan_tahun =='-' OR empty($bulan_tahun))?date("F Y"):date("F Y",strtotime($bulan_tahun)); ?>
</h3>

<h3 style="text-align: center">Laporan Hasil Perhitungan MBR Kelurahan <?php echo $kelurahan_dua ?></h3>

foreach(range('A', 'L') as $columId){
            $sheet->getColumnDimension($columId)->setAutoSize(true);
        }