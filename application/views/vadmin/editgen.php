<div class="row">
    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="card-header">
                <div class="float-left pt-1">
                    <span class="h4">Edit Generus - <?= $genm['namades'] . " " . $genm['namakel'] ?></span>
                </div>
                <div class="float-right">
                    <button class="btn btn-success btn-sm" onclick=self.history.back()>
                        <span class="icon">
                            <i class="fas fa-undo-alt"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $gen['img'] ?>" class="card-img img-thumbnail mb-5 mt-4 ml-2" data-toggle="modal" data-target="#profilepic" data-img="<?= $gen['img']; ?>">
                    <small class="text-muted ml-3">Terdaftar sejak : <?= $gen['date_created'] ?></small>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <?php echo form_open_multipart(''); ?>

                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= $gen['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="jk" name="jk">
                                <?php if ($gen['jk_id'] == 1) : ?>
                                    <option value="1" selected>Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                <?php else : ?>
                                    <option value="1">Laki-Laki</option>
                                    <option value="2" selected>Perempuan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="tmptlahir" class="form-control" id="tmptlahir" placeholder="Tempat Lahir" value="<?= $gen['tmpt_lahir'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" name="tgllahir" class="form-control" id="tgllahir" value="<?= $gen['tgl_lahir'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="namaayah" class="form-control" id="namaayah" placeholder="Nama Ayah" value="<?= $gen['nama_ayah'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Telepon" value="<?= $gen['no_telp'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="hobi" class="form-control" id="hobi" placeholder="Hobi" value="<?= $gen['hobi'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="kegiatan" class="form-control" id="kegiatan" placeholder="Kegiatan : Pelajar, Berkerja dll" value="<?= $gen['kegiatan'] ?>">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="alamat" id="alamat" cols="10" placeholder="Alamat Tinggal" value="<?= set_value('alamat') ?>"><?= $gen['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imgprof" id="csvinput">
                                <label class=" custom-file-label" for="inputGroupFile02">Choose Picture</label>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <?php if ($gen['gpi'] == 1) : ?>
                                <input checked class="form-check-input" type="checkbox" name="gpi" value="1" id="gpi">
                            <?php else : ?>
                                <input class="form-check-input" type="checkbox" name="gpi" value="1" id="gpi">
                            <?php endif; ?>
                            <label class="form-check-label" for="gpi">
                                Generus GPI
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header">
                Statistik Kehadiran
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="profilepic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <img class="img-fluid" src="">
            </div>
        </div>
    </div>
</div>