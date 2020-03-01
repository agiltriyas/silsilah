<div class="row">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header">
                <span class="text text-lg">Data Level</span>
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalLevel">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($level as $l) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $l['nama_level']; ?></td>
                                <td scope="col">
                                    <a href="<?= base_url('SuperAdmin/editAccess/') . $l['id'] ?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-key"></i>
                                    </a>
                                    <button class="btn btn-info btn-circle btn-sm editlev" data-id="<?= $l['id'] ?>" data-toggle="modal" data-target="#modalLevel">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url('SuperAdmin/deleteLev/') . $l['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Level -->
<div class="modal fade" id="modalLevel" tabindex="-1" role="dialog" aria-labelledby="modalLevelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLevelLabel">Tambah Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form method="post" id="formlev" action="<?= base_url('SuperAdmin/Level') ?>">
                    <div class="form-group">
                        <input type="text" id="idlev" name="id" hidden>
                        <input type="text" id="lev" class="form-control" placeholder="Level baru" name="level">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="butlev" class="btn btn-primary">Tambah</button>
                </form>
                <!-- akhir form input -->
            </div>
        </div>
    </div>
</div>