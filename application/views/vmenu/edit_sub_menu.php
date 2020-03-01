<div class="row">
    <div class="col-lg-4">
        <div class="car shadow">
            <div class="card-body">

                <form method="post" action="<?= base_url('menu/editSubmenu/') . $submenuJ['id'] ?>">
                    <input type="text" name="submenuId" id="submenuId" value="<?= $submenuJ['id']; ?>" hidden>
                    <div class="form-group">
                        <select name="menu" id="menu" class="form-control">
                            <?php foreach ($menu as $m) : ?>
                                <?php if ($m['id'] == $submenuJ['menu_id']) : ?>
                                    <option value="<?= $m['id']; ?>" selected><?= $m['nama_menu']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['nama_menu']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="submenu" class="form-control" id="submenu" placeholder="Masukan Judul submenu" value="<?= $submenuJ['nama_sub']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="icon" class="form-control" id="icon" placeholder="Masukan icon" value="<?= $submenuJ['icon']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="url" class="form-control" id="url" placeholder="Masukan url" value="<?= $submenuJ['url']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end content ada di footer -->