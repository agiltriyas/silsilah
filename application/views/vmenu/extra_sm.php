<div class="row">
    <div class="col-lg">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="pt-1 float-left">Extra Submenu</h4>
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modaltambahsubmenu">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sub Menu</th>
                            <th scope="col">Extra Submenu</th>
                            <th scope="col">URL</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sub Menu</th>
                            <th scope="col">Extra Submenu</th>
                            <th scope="col">URL</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($joinesm as $jesm) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $jesm['nama_sub']; ?></td>
                            <td><?= $jesm['nama_extra']; ?></td>
                            <td><?= $jesm['url']; ?></td>
                            <td>

                                <div class="custom-control custom-switch">
                                    <?php if ($jesm['is_active'] == 1) : ?>
                                    <input type="checkbox" class="custom-control-input exmenuact" id="isactswitch <?= $jesm['id'] ?>" data-id="<?= $jesm['is_active'] ?>" data-sm="<?= $jesm['id'] ?>" data-isact="<?= $jesm['is_active'] ?>" checked>
                                    <label class="custom-control-label" for="isactswitch <?= $jesm['id'] ?>"></label>
                                    <?php else : ?>
                                    <input type="checkbox" class="custom-control-input exmenuact" id="isactswitch <?= $jesm['id'] ?>" data-id="<?= $jesm['is_active'] ?>" data-sm="<?= $jesm['id'] ?>" data-isact="<?= $jesm['is_active'] ?>">
                                    <label class="custom-control-label" for="isactswitch <?= $jesm['id'] ?>"></label>
                                    <?php endif; ?>

                                </div>
                            </td>
                            <td scope="col">
                                <a href="<?= base_url('menu/editExtrasm/') . $jesm['id']; ?>" class="btn btn-info btn-circle btn-sm">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="<?= base_url('menu/deleteExtrasm/') . $jesm['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
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
<div class="modal fade" id="modaltambahsubmenu" tabindex="-1" role="dialog" aria-labelledby="modaltambahsubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahsubmenuLabel">Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form method="post" action="<?= base_url('menu/extrasm') ?>">
                    <div class="form-group">
                        <select name="submenu" id="submenu" class="form-control">
                            <?php foreach ($submenu as $sm) : ?>
                            <option value="<?= $sm['id']; ?>"><?= $sm['nama_sub']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="extrasm" class="form-control" id="extrasm" placeholder="Masukan Judul Extra Submenu" value="<?= set_value('extrasm') ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="url" class="form-control" id="url" placeholder="Masukan url" value="<?= set_value('url') ?>">
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