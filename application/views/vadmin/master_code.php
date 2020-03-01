<!-- header content ada di top -->

<!-- Page Heading -->

<div class="row">
    <div class="col-lg">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="float-left mr-3 pt-1">Data Master Code</h5>
                <button class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambahMaster">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Master Id</th>
                                <th scope="col">Daerah</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Kelompok</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Master Id</th>
                                <th scope="col">Daerah</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Kelompok</th>
                                <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($joinM as $jm) : ?>
                                <tr>
                                    <td scope="row"><?= $i; ?></td>
                                    <td><?= $jm['idmas']; ?></td>
                                    <td><?= $jm['namadar']; ?></td>
                                    <td><?= $jm['namades']; ?></td>
                                    <td><?= $jm['namakel']; ?></td>
                                    <td scope="col">
                                        <a href="<?= base_url('SuperAdmin/editMaster/') . $jm['idmas']; ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('SuperAdmin/deleteMaster/') . $jm['idmas']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content ada di footer -->

<!-- Modal -->
<div class="modal fade" id="modalTambahMaster" tabindex="-1" role="dialog" aria-labelledby="modalTambahMasterLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahMasterLabel">Master Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form method="post" action="<?= base_url('SuperAdmin/mastercode') ?>">
                    <div class="form-group">
                        <select name="daerahId" id="daerahId" class="form-control">
                            <?php foreach ($daerah as $d) : ?>
                                <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="desaId" id="desaId" class="form-control">
                            <?php foreach ($desa as $ds) : ?>
                                <option value="<?= $ds['id']; ?>"><?= $ds['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="kelompokId" id="kelompokId" class="form-control">
                            <?php foreach ($kelompok as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
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