<div class="row justify-content-end">
</div>
<div class="row">
    <div class="col-lg-6 mb-3">
        <div class="card shadow">
            <div class="card-header">
                <span class="h5">Presensi - Kegiatan Remaja <?= $extitle; ?></span>
                <div class="float-right pt-1">
                    <a href="<?= base_url('admin/kegiatangen/' . $this->uri->segment('3') . '?idjk=') . $this->input->get('idjk');   ?>">
                        <button class="btn btn-info btn-sm">
                            <span class="icon">
                                <i class="fas fa-undo"></i>
                            </span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['id'])) : ?>
                    <form class="mb-5" action="<?= base_url('admin/presensikeg/' . $this->uri->segment(3) . '?idjk=' . $this->input->get('idjk') . '&id=' . $_GET['id']) ?>" method="post">
                    <?php else : ?>
                        <form class="mb-5" action="<?= base_url('admin/presensikeg/' . $this->uri->segment(3) . '?idjk=' . $this->input->get('idjk')) ?>" method="post">
                        <?php endif; ?>
                        <?php if ($this->session->userdata('levelId') == 3 && $this->uri->segment(3) == "kelompok" && !isset($_GET['id'])) : ?>
                            <div class="form-group row">
                                <label for="hadits" class="col-sm-4 col-form-label"><?= $extitle ?></label>
                                <div class="col-sm-8">
                                    <select class="custom-select" id="filgen" name="filgen">
                                        <?php foreach ($filmaster as $fm) : ?>
                                            <?php if ($fm['namades'] === '00') : ?>
                                                <option value="<?= $fm['id'] ?>">Daerah</option>
                                            <?php elseif ($fm['namakel'] != 00) : ?>
                                                <option value="<?= $fm['id'] ?>"><?= $fm['namades'] . '-' . $fm['namakel']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        <?php elseif ($this->session->userdata('levelId') < 3 && !isset($_GET['id'])) : ?>
                            <div class="form-group row">
                                <label for="hadits" class="col-sm-4 col-form-label"><?= $extitle ?></label>
                                <div class="col-sm-8">
                                    <select class="custom-select" id="filgen" name="filgen">
                                        <?php foreach ($filmaster as $fm) : ?>
                                            <?php if ($fm['namades'] === '00') : ?>
                                                <option value="<?= $fm['id'] ?>">Daerah</option>
                                            <?php elseif ($fm['namakel'] == 00) : ?>
                                                <option value="<?= $fm['id'] ?>"><?= $fm['namades'] . '-' . $fm['namakel']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group row">
                            <label for="tgl_kegiatan" class="col-sm-4 col-form-label">Tanggal Kegiatan</label>
                            <div class="col-sm-8">
                                <?php if ($kegiatan && $kegiatan['is_active'] == 0) : ?>
                                    <input disabled value="<?= $kegiatan['tgl_kegiatan'] ?>" type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan">
                                <?php else : ?>
                                    <input value="<?= $kegiatan['tgl_kegiatan'] ?>" type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_kegiatan" class="col-sm-4 col-form-label">Nama Kegiatan</label>
                            <div class="col-sm-8">
                                <?php if ($kegiatan && $kegiatan['is_active'] == 0) : ?>
                                    <input disabled type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?= $kegiatan['nama_kegiatan'] ?>">
                                <?php else : ?>
                                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?= $kegiatan['nama_kegiatan'] ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="materi" class="col-sm-4 col-form-label">Materi Kegiatan</label>
                            <div class="col-sm-8">
                                <?php if ($kegiatan && $kegiatan['is_active'] == 0) : ?>
                                    <input disabled type="text" class="form-control" id="materi" name="materi" value="<?= $kegiatan['materi'] ?>">

                                <?php else : ?>
                                    <input type="text" class="form-control" id="materi" name="materi" value="<?= $kegiatan['materi'] ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                                <?php if ($kegiatan && $kegiatan['is_active'] == 0) : ?>
                                    <input disabled type="text" class="form-control" id="ket" name="ket" value="<?= $kegiatan['ket'] ?>">
                                <?php else : ?>
                                    <input type="text" class="form-control" id="ket" name="ket" value="<?= $kegiatan['ket'] ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hadits" class="col-sm-4 col-form-label">Hadits</label>
                            <div class="col-sm-8">
                                <?php if ($kegiatan && $kegiatan['is_active'] == 0) : ?>
                                    <select disabled name="hadits" id="hadits" class="form-control">
                                        <option value="0">Dalil</option>
                                        <option value="1">Kitabusollah</option>
                                    </select>
                                <?php else : ?>
                                    <select name="hadits" id="hadits" class="form-control">
                                        <option value="0">Dalil</option>
                                        <option value="1">Kitabusollah</option>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($kegiatan && $kegiatan['is_active'] == 0) : ?>
                            <div class="text-right">
                                <button disabled type="button" name="insert" class="btn btn-primary">Isi Presensi</button>
                            </div>
                        <?php else : ?>
                            <?php if (!isset($_GET['id'])) : ?>
                                <div class="text-right">
                                    <button type="submit" name="insert" class="btn btn-primary">Isi Presensi</button>
                                </div>
                            <?php else : ?>
                                <div class="text-right">
                                    <button type="submit" name="update" class="btn btn-primary">Update Presensi</button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        </form>

            </div>
        </div>
    </div>
    <?php if (isset($_GET['id'])) : ?>
        <div class="col-lg-6">
            <div class="alertpre" style="display:none;">
                <div class="alert alert-success alert-dismissible fade show hadir" role="alert">
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">

                        <div class="col-lg-4">
                            <span class="h5">Data Generus</span>
                        </div>
                        <div class="col-lg-4 text-center">
                            <?php if ($this->session->userdata('levelId') == 1 && $this->uri->segment(3) == "daerah") : ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generusbaru">
                                    Generus Baru
                                </button>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 text-right">
                            <a href="<?= base_url('admin/presensikeg/' . $this->uri->segment(3) . '?idjk=' . $this->input->get('idjk') . '&id=') . $kegiatan['id'] ?>">
                                <?php if (!isset($_GET['jk'])) : ?>
                                    <button class=" btn btn-info">
                                    <?php else : ?>
                                        <button class=" btn btn-outline-info">
                                        <?php endif; ?>
                                        All
                                        </button>
                            </a>
                            <a href="<?= base_url('admin/presensikeg/' . $this->uri->segment(3) . '?idjk=' . $this->input->get('idjk') . '&id=') . $kegiatan['id'] ?>&jk=1">
                                <?php if (isset($_GET['jk']) && $_GET['jk'] == 1) : ?>
                                    <button class="btn btn-info">
                                    <?php else : ?>
                                        <button class="btn btn-outline-info">
                                        <?php endif; ?>
                                        M
                                        </button>
                            </a>
                            <a href="<?= base_url('admin/presensikeg/' . $this->uri->segment(3) . '?idjk=' . $this->input->get('idjk') . '&id=') . $kegiatan['id'] ?>&jk=2">
                                <?php if (isset($_GET['jk']) && $_GET['jk'] == 2) : ?>
                                    <button class="btn btn-info">
                                    <?php else : ?>
                                        <button class="btn btn-outline-info">
                                        <?php endif; ?>
                                        F
                                        </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive table-striped" id="tbPresensi">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Hadir</th>
                                <th scope="col">Izin</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Hadir</th>
                                <th scope="col">Izin</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $i = 1;
                                if (isset($generus)) {
                                    foreach ($generus as $g) : ?>
                                    <?php $ket =  $this->db->get_where('detail_kegiatan', ['generus_id'  => $g['Id_gen'], 'kegiatan_id' => $kegiatan['id']])->row_array(); ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $g['nama']; ?></td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <?php if ($kegiatan && $kegiatan['is_active'] == 0) : ?>
                                                        <?php if ($this->db->get_where('detail_kegiatan', ['generus_id' => $g['Id_gen'], 'kegiatan_id' => $kegiatan['id'], 'presensi_id >=' => 2])->num_rows() == 0) : ?>
                                                            <input disabled type="checkbox" class="custom-control-input " id="isactswitch <?= $g['idg'] ?>" data-genid="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                            <label class="custom-control-label" for="isactswitch <?= $g['idg'] ?>"></label>
                                                        <?php elseif ($ket['ket'] != "") : ?>
                                                            <input disabled type="checkbox" class="custom-control-input " id="isactswitch <?= $g['idg'] ?>" data-genid="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                            <label class="custom-control-label" for="isactswitch <?= $g['idg'] ?>"></label>
                                                        <?php else : ?>
                                                            <input disabled checked type="checkbox" class="custom-control-input " id="isactswitch <?= $g['idg'] ?>" data-genid="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                            <label class="custom-control-label" for="isactswitch <?= $g['idg'] ?>"></label>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <?php if ($this->db->get_where('detail_kegiatan', ['generus_id' => $g['Id_gen'], 'kegiatan_id' => $kegiatan['id'], 'presensi_id >=' => 2])->num_rows() == 0) : ?>
                                                            <input type="checkbox" class="custom-control-input presensigen" id="isactswitch <?= $g['idg'] ?>" data-genid="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                            <label class="custom-control-label" for="isactswitch <?= $g['idg'] ?>"></label>
                                                        <?php elseif ($ket['ket'] != "") : ?>
                                                            <input disabled type="checkbox" class="custom-control-input" id="isactswitch <?= $g['idg'] ?>" data-genid="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                            <label class="custom-control-label" for="isactswitch <?= $g['idg'] ?>"></label>
                                                        <?php else : ?>
                                                            <input checked type="checkbox" class="custom-control-input presensigen" id="isactswitch <?= $g['idg'] ?>" data-genid="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                            <label class="custom-control-label" for="isactswitch <?= $g['idg'] ?>"></label>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <?php if ($this->db->get_where('detail_kegiatan', ['generus_id' => $g['Id_gen'], 'kegiatan_id' => $kegiatan['id'], 'presensi_id >=' => 2])->num_rows() == 0) : ?>
                                                    <input type="text" class="form-control valizin" placeholder="Ket, cth: sakit" id="" data-genidket="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                <?php elseif ($ket['presensi_id'] == 2) : ?>
                                                    <input disabled type="text" class="form-control valizin" placeholder="Ket, cth: sakit" id="" data-genidket="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                <?php else : ?>
                                                    <input value="<?= $ket['ket']; ?>" type="text" class="form-control valizin" placeholder="Ket, cth: sakit" id="" data-genidket="<?= $g['Id_gen'] ?>" data-kegitan="<?= $kegiatan['id'] ?>">
                                                <?php endif; ?>
                                                <?php if ($kegiatan && $kegiatan['is_active'] == 0) : ?>
                                                    <div class="input-group-append">
                                                        <button disabled class="btn btn-outline-secondary" type="button">S</button>
                                                    <?php else : ?>
                                                        <div class="input-group-append presensiizin">
                                                            <?php if ($ket['ket'] == "") : ?>
                                                                <button class="btn btn-outline-secondary simpanket" type="button">S</button>
                                                            <?php else : ?>
                                                                <button class="btn btn-outline-secondary simpanket" type="button">C</button>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>
                                        </td>
                                    </tr>
                            <?php $i++;
                                    endforeach;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php if ($this->session->userdata('levelId') == 1) : ?>

    <div class="modal fade" id="generusbaru">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Generus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <select class="custom-select" id="masterid" name="masterid">
                                <?php foreach ($masterkel as $mk) : ?>
                                    <option value="<?= $mk['id'] ?>"><?= $mk['namades'] . '-' . $mk['namakel']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" id="jk" name="jk">
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No. HP">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>