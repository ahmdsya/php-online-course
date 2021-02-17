<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Peserta</h1>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Peserta</h6>
            </div>
            <div class="card-body">
            <?php
                if ($session->get('alert')) {
                    echo $session->get('alert');
                }
            ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">NO</th>
                                <th width="40%">Nama Peserta</th>
                                <th width="30%">Email</th>
                                <th width="20%" class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($peserta->getData() as $row){ ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->email ?></td>
                                    <td class="text-center">
                                        <form method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <button type="submit" name="delPeserta" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
