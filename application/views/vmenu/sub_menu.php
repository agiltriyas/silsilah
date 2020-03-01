<div class="row">
    <div class="col-lg">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="float-left pt-1">Submenu</h4>
                <button class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambahsubmenu">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Sub Menu</th>
                            <th scope="col">Icon</th>
                            <th scope="col">URL</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Sub Menu</th>
                            <th scope="col">Icon</th>
                            <th scope="col">URL</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($joinsubmenu as $sm) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $sm['nama_menu']; ?></td>
                                <td><?= $sm['nama_sub']; ?></td>
                                <td><i class="<?= $sm['icon']; ?>"></i> <?= $sm['icon']; ?></td>
                                <td><?= $sm['url']; ?></td>
                                <td>

                                    <div class="custom-control custom-switch">
                                        <?php if ($sm['is_active'] == 1 && $sm['id'] != 5) : ?>
                                            <input type="checkbox" class="custom-control-input menuact" id="isactswitch <?= $sm['id'] ?>" data-id="<?= $sm['is_active'] ?>" data-sm="<?= $sm['id'] ?>" data-isact="<?= $sm['is_active'] ?>" checked>
                                            <label class="custom-control-label" for="isactswitch <?= $sm['id'] ?>"></label>
                                        <?php elseif ($sm['id'] == 5) : ?>
                                            <input type="checkbox" class="custom-control-input menuact" id="isactswitch <?= $sm['id'] ?>" data-id="<?= $sm['is_active'] ?>" data-sm="<?= $sm['id'] ?>" data-isact="<?= $sm['is_active'] ?>" checked disabled>
                                            <label class="custom-control-label" for="isactswitch <?= $sm['id'] ?>"></label>
                                        <?php else : ?>
                                            <input type="checkbox" class="custom-control-input menuact" id="isactswitch <?= $sm['id'] ?>" data-id="<?= $sm['is_active'] ?>" data-sm="<?= $sm['id'] ?>" data-isact="<?= $sm['is_active'] ?>">
                                            <label class="custom-control-label" for="isactswitch <?= $sm['id'] ?>"></label>
                                        <?php endif; ?>

                                    </div>
                                </td>
                                <td scope="col">
                                    <a href="<?= base_url('menu/editSubmenu/') . $sm['id']; ?>" class="btn btn-info btn-circle btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('menu/deleteSubmenu/') . $sm['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
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
                <form method="post" action="<?= base_url('menu/submenu') ?>">
                    <div class="form-group">
                        <select name="menu" id="menu" class="form-control">
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="submenu" class="form-control" id="submenu" placeholder="Masukan Judul submenu" value="<?= set_value('submenu') ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="icon" class="form-control" id="icon" placeholder="Masukan icon" value="fas fa-fw fa-flag">
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