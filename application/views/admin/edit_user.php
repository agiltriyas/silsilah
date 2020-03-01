<!-- header content ada di top -->

<!-- Page Heading -->

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="float-left mr-1">Edit User : </h5>
                <?= strtoupper($user['nama_user']); ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('SuperAdmin/editUser/') . $user['id']; ?>">
                    <input type="text" name="userid" value="<?= $user['id']; ?>" hidden>
                    <div class="form-group">
                        <select class="form-control" id="masterid" name="masterid">
                            <option disabled>Master Id</option>
                            <?php foreach ($joinm as $jm) : ?>
                                <?php if ($jm['id'] == $user['master_id']) : ?>
                                    <option value="<?= $jm['id'] ?>" selected><?= $jm['namades'] . " - " . $jm['namakel']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $jm['id'] ?>"><?= $jm['namades'] . " - " . $jm['namakel']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="levelid" name="levelid">
                            <option disabled>Level Id</option>
                            <?php foreach ($level as $l) : ?>
                                <?php if ($l['id'] == $user['level_id']) : ?>
                                    <option value="<?= $l['id'] ?>" selected><?= $l['nama_level'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $l['id'] ?>"><?= $l['nama_level'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- end content ada di footer -->