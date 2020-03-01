<!-- header content ada di top -->

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-body">
                <form method="post" action="<?= base_url('menu/editMenu/') . $menuId['id'] ?>">
                    <div class="form-group">
                        <input type="text" name="id" value="<?= $menuId['id'] ?>" hidden>
                        <input type="text" name="menu" class="form-control" id="menu" placeholder="Masukan Judul Menu" value="<?= $menuId['nama_menu'] ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control" name="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- end content ada di footer -->