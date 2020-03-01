<div class="row">
    <div class="col-lg">
        <div class="card shadow">
            <div class="card-header">
                <span class="text text-lg">
                    Generus Pena Ilmu
                </span>
                <span class="text text-lg mct">

                </span>

                <div class="float-right pt-1">
                    <?php if ($this->session->userdata('levelId') <= 2) : ?>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#uploadcsv">
                            <span class="icon">
                                <i class="fas fa-file"></i>
                            </span>
                        </button>
                    <?php endif; ?>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahGen">
                        <span class="icon">
                            <i class="fas fa-plus"></i>
                        </span>
                    </button>
                </div>
                <div class="float-right mr-2">
                    <div class="input-group">
                        <select class="custom-select" id="filgen" name="filgen">
                            <?php if ($this->session->userdata('levelId') <= 2) : ?>
                                <option value="none" selected>Semua Desa</option>
                            <?php endif; ?>
                            <?php foreach ($mc as $m) : ?>
                                <?php if ($m['id'] == $this->input->get('id')) : ?>
                                    <option selected value="<?= $m['id'] ?>"><?= $m['namades'] . '-' . $m['namakel']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['namades'] . '-' . $m['namakel']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="float-right mr-2">
                    <div class="input-group">
                        <select class="custom-select" id="filgen2" name="filgen2">
                            <option value="none">Semua Generus</option>
                            <option value="cr">Cabe Rawit</option>
                            <option value="pr">Pra Remaja</option>
                            <option value="rm">Remaja</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive table-striped" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Generus</th>
                                <th scope="col">No.Telp</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">img</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Generus</th>
                                <th scope="col">No.Telp</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">img</th>
                                <th scope="col">active</th>
                                <th scope="col">Action</th>

                            </tr>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- //modal-title -->
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

<div class="modal fade" id="tambahGen" tabindex="-1" role="dialog" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahUserLabel">User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">

                <!-- form input -->
                <form method="post" action="">
                    <div class="form-group">
                        <select class="form-control" id="masterid" name="masterid">
                            <option disabled>Master Id</option>
                            <?php foreach ($mcnewgen as $jm) : ?>
                                <option value="<?= $jm['id'] ?>"><?= $jm['namades'] . " - " . $jm['namakel'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="jk" name="jk">
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="tmptlahir" class="form-control" id="tmptlahir" placeholder="Tempat Lahir" value="<?= set_value('tmptlahir') ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="date" name="tgllahir" class="form-control" id="tgllahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="namaayah" class="form-control" id="namaayah" placeholder="Nama Ayah" value="<?= set_value('namaayah') ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Telepon" value="<?= set_value('notelp') ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="hobi" class="form-control" id="hobi" placeholder="Hobi" value="<?= set_value('hobi') ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="kegiatan" class="form-control" id="kegiatan" placeholder="Kegiatan : Pelajar, Berkerja dll" value="<?= set_value('kegiatan') ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="alamat" id="alamat" cols="10" placeholder="Alamat Tinggal" value="<?= set_value('alamat') ?>"></textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="isact" id="isact" value=1 checked="checked">
                        <label class="form-check-label" for="isact">Active ?</label>
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

<div class="modal fade" id="uploadcsv" tabindex="-1" role="dialog" aria-labelledby="modalcsvLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahUserLabel">Pilih File CSV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart(''); ?>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="csv" id="csvinput">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text" name="uploadcsv" id="inputGroupFileAddon02">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>