<div class="row">
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-body">
                <form method="post" action="<?= base_url('SuperAdmin/editMaster/') . $idmas ?>">
                    <div class="form-group">
                        <select name="daerahId" id="daerahId" class="form-control">
                            <?php foreach ($daerah as $d) : ?>
                                <?php if ($edmas['id_daerah'] == $d['id']) : ?>
                                    <option value="<?= $d['id']; ?>" selected><?= $d['nama']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="desaId" id="desaId" class="form-control">
                            <?php foreach ($desa as $ds) : ?>
                                <?php if ($edmas['id_desa'] == $ds['id']) : ?>
                                    <option value="<?= $ds['id']; ?>" selected><?= $ds['nama']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $ds['id']; ?>"><?= $ds['nama']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="kelompokId" id="kelompokId" class="form-control">
                            <?php foreach ($kelompok as $k) : ?>
                                <?php if ($edmas['id_kelompok'] == $k['id']) : ?>
                                    <option value="<?= $k['id']; ?>" selected><?= $k['nama']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                    </div>
            </div>
            </form>
        </div>
    </div>