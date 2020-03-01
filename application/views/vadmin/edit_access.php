<!-- header content ada di top -->

<!-- Page Heading -->

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="float-left mr-1">Edit Access : </h5>
                <?= strtoupper($levelid['nama_level']); ?>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Menu</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td><?= $m['nama_menu']; ?></td>
                                <td scope="col">
                                    <div class="custom-control custom-switch">
                                        <?php $accessm = $this->db->get_where('access_menu', ['menu_id' => $m['id'], 'level_id' => $levelid['id']]); ?>
                                        <?php if ($accessm->num_rows() >= 1) : ?>
                                            <input type="checkbox" class="custom-control-input accsact" id="accsact <?= $m['id'] ?>" data-levelid="<?= $levelid['id'] ?>" data-menuid="<?= $m['id'] ?>" checked>
                                            <label class="custom-control-label" for="accsact <?= $m['id'] ?>"></label>
                                        <?php else : ?>
                                            <input type="checkbox" class="custom-control-input accsact" id="accsact <?= $m['id'] ?>" data-levelid="<?= $levelid['id'] ?>" data-menuid="<?= $m['id'] ?>">
                                            <label class="custom-control-label" for="accsact <?= $m['id'] ?>"></label>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- end content ada di footer -->