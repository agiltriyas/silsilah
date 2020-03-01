<!-- header content ada di top -->

<!-- Page Heading -->

<div class="row">
    <div class="col-lg-10">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <span class="h5">
                        Kegiatan <?= $extitle ?> -
                        <?php if (isset($_POST['filgen'])) : ?>
                            <?php $mckel = $this->madmin->joinM($this->input->post('filgen')); ?>
                            <?php if ($this->input->post('filgen') != "none") : ?>
                                <?php if ($mckel['namades'] === "00") : ?>
                                    Daerah
                                <?php else : ?>
                                    <?= $mckel['namades'] . " " . $mckel['namakel']  ?>
                                <?php endif; ?>
                            <?php else : ?>
                                Semua <?= $extitle ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('levelId') > 3) : ?>
                            <?php $getses = $this->mdata->sessiondata(); ?>
                            <?php $mckel = $this->madmin->joinM($getses['master_id']); ?>
                            <?= $mckel['namades'] . " " . $mckel['namakel']  ?>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="float-right pt-1">
                    <?php if (isset($button)) : ?>
                        <a href="<?= base_url('admin/presensikeg/' . $this->uri->segment('3') . '?idjk=') . $this->input->get('idjk'); ?>">
                            <?= $button; ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('levelId') <= 3) : ?>
                        <a href="<?= base_url('admin/kegiatangen/' . $this->uri->segment('3') . '?idjk=') . $this->input->get('idjk');   ?>">
                            <button class="btn btn-info btn-sm">
                                <span class="icon">
                                    <i class="fas fa-undo"></i>
                                </span>
                            </button>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="float-right mr-1 pb-2">
                    <div class="input-group ">
                        <input class="form-control" id="filterkel" type="month" value="<?= date('Y-m') ?>">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-responsive table-striped" id="tbkel">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Tempat</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Materi</th>
                                <th scope="col">Hadist</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kehadiran</th>
                                <?php if (isset($type)) : ?>
                                    <th scope="col">Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Desa Kelompok</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Materi</th>
                                <th scope="col">Hadist</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kehadiran</th>
                                <?php if (isset($type)) : ?>
                                    <th scope="col">Action</th>
                                <?php endif; ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <input type="text" id="postmc" value="<?= $this->input->post('filgen') ?>" hidden>
                            <input type="text" id="postidjk" value="<?= $this->input->get('idjk') ?>" hidden>
                            <input type="text" id="postseg" value="<?= $this->uri->segment('3') ?>" hidden>
                            <?php
                            $i = 1;
                            foreach ($keg as $kg) :
                                ?>
                                <tr>
                                    <td scope="col"><?= $i ?></td>
                                    <td scope="col"><?PHP $tglf = date_create($kg['tgl_kegiatan']);
                                                        $day = ["", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
                                                        echo $day[date_format($tglf, 'N')] . ", ";

                                                        echo date_format($tglf, "j-n-y") ?></td>
                                    <td scope="col">
                                        <?php foreach ($dk as $k) : ?>
                                            <?php if ($kg['idg'] == $k['id']) : ?>
                                                <?php if ($k['namadesa'] === '00') : ?>
                                                    Daerah
                                                <?php else : ?>
                                                    <?= $k['namadesa'] . ' ' . $k['namakel'] ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td scope="col"><?= $kg['nama_kegiatan'] ?></td>
                                    <td scope="col"><?= $kg['materi'] ?></td>
                                    <td scope="col"><?= $kg['hadits'] ?></td>
                                    <td scope="col"><?= $kg['ket'] ?></td>
                                    <td scope="col" class="text-center">
                                        <?php if (isset($dk)) : ?>
                                            <?php foreach ($dk as $d) : ?>
                                                <?php if ($kg['idg'] == $d['id']) : ?>
                                                    <?= $d['jumlah'] ?> %
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <?php if (isset($type)) : ?>
                                        <td scope="col">
                                            <?php if ($type == "kelompok") : ?>
                                                <a href="<?= base_url('admin/presensikeg/' . $this->uri->segment('3') . '?idjk=' . $this->input->get('idjk') . '&id=') . $kg['idg'] ?>" class="btn btn-info btn-circle btn-sm">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            <?php elseif ($type == "desa") : ?>
                                                <?php if ($sesmaster['level_id'] < 4) : ?>
                                                    <a href="<?= base_url('admin/presensikeg/' . $this->uri->segment('3') . '?idjk=' . $this->input->get('idjk') . '&id=') . $kg['idg'] ?>" class="btn btn-info btn-circle btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php elseif ($type == "daerah") : ?>
                                                <?php if ($sesmaster['level_id'] < 3) : ?>
                                                    <a href="<?= base_url('admin/presensikeg/' . $this->uri->segment('3') . '?idjk=' . $this->input->get('idjk') . '&id=') . $kg['idg'] ?>" class="btn btn-info btn-circle btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if ($sesmaster['level_id'] == 1) : ?>
                                            <a href="<?= base_url('admin/deletekeg/' . $kg['idg'] . '?type=') . lcfirst($extitle) ?>" class="btn btn-danger btn-circle btn-sm delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>

                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- end content ada di footer -->

    <?php if ($this->session->userdata('levelId') <= 3) : ?>
        <?php if (!isset($_POST['filgen'])) : ?>
            <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Pilih <?= $extitle ?></h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <select class="custom-select" id="filgen" name="filgen">
                                        <?php if ($this->session->userdata('levelId') <= 2 && $extitle != "Daerah") : ?>
                                            <option value="none" selected>Semua <?= $extitle ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($mc as $m) : ?>
                                            <?php if ($m['namades'] === '00') : ?>
                                                <option value="<?= $m['id'] ?>">Daerah</option>
                                            <?php else : ?>
                                                <option value="<?= $m['id'] ?>"><?= $m['namades'] . '-' . $m['namakel']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url('admin/datakegiatan/') . lcfirst($extitle)  ?>">
                                <button type="button" class="btn btn-default btn-outline-secondary">Kegiatan</button>
                            </a>
                            <button type="submit" class="btn btn-default btn-outline-primary">Go</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>