<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i data-feather="server"></i> <?php echo $title ?></h4>
    </div>
</div>  
    <div class="container-fluid">
    <!-- body -->
        <div class="card-body">
            <div class="table table-responsive">
                <table class="display" id="basic-1">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Kode Kriteria</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Jenis Kriteria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($kriteria as $k) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $k->kode_kriteria ?></td>
                                <td><?php echo $k->kriteria ?></td>
                                <td><?php echo $k->bobot ?></td>
                                <td><?php echo $k->jenis ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Container-fluid Ends-->
</div>