<div class="row">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="pt-1 float-left">Menu</h4>
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalTambahMenu">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($menu as $m) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $m['nama_menu']; ?></td>
                                <td scope="col">
                                    <a href="<?= base_url('menu/editMenu/') . $m['id']; ?>" class="btn btn-info btn-circle btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('menu/deleteMenu/') . $m['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
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

<!-- Modal -->
<div class="modal fade" id="modalTambahMenu" tabindex="-1" role="dialog" aria-labelledby="modalTambahMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahMenuLabel">Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form method="post" action="<?= base_url('menu/menuTambah') ?>">
                    <div class="form-group">
                        <input type="text" name="menu" class="form-control" id="menu" placeholder="Masukan Judul Menu" value="<?= set_value('menu') ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
                <!-- akhir form input -->
            </div>
        </div>
    </div>
</div>
<!-- end content ada di footer -->