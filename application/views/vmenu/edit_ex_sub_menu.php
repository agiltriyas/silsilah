<div class="row">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-body">
                <form method="post" action="<?= base_url('menu/editExtrasm/') . $exsubmenuJ['id'] ?>">
                    <div class="form-group">
                        <select name="submenuId" id="submenuId" class="form-control">
                            <?php foreach ($submenu as $sm) : ?>
                                <?php if ($exsubmenuJ['sub_menu_id'] == $sm['id']) : ?>
                                    <option value="<?= $sm['id']; ?>" selected><?= $sm['nama_sub']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $sm['id']; ?>"><?= $sm['nama_sub']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="extrasm" class="form-control" id="extrasm" placeholder="Masukan Judul Extra Submenu" value="<?= $exsubmenuJ['nama_extra'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="url" class="form-control" id="url" placeholder="Masukan url" value="<?= $exsubmenuJ['url'] ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>