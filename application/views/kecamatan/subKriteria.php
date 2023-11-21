<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header mt-3">
        <h4><i data-feather="database"></i> <?php echo $title ?></h4>
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
                            <th>Kriteria</th>
                            <th>Nama Sub-Kriteria</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($sub_kriteria as $sk) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $sk->nama_kriteria ?></td>
                                <td><?php echo $sk->nama_sub ?></td>
                                <td><?php echo $sk->nilai_sub ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Container-fluid Ends-->
</div>