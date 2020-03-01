<div class="row">
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-header">
                <span class="text text-lg">Daerah</span>
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalDaerah">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($daerah as $d) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $d['nama']; ?></td>
                                <td scope="col">
                                    <button class="btn btn-info btn-circle btn-sm editdar" data-id="<?= $d['id'] ?>" data-toggle="modal" data-target="#modalDaerah">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url('SuperAdmin/deleteDaerah/') . $d['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
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
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-header">
                <span class="text text-lg">Desa</span>
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalDesa">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover datamaster">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($desa as $ds) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $ds['nama']; ?></td>
                                <td scope="col">
                                    <button class="btn btn-info btn-circle btn-sm editdes" data-id="<?= $ds['id'] ?>" data-toggle="modal" data-target="#modalDesa">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url('SuperAdmin/deleteDesa/') . $ds['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
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
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-header">
                <span class="text text-lg">Kelompok</span>
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalKelompok">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover datamaster">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kelompok as $k) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $k['nama']; ?></td>
                                <td scope="col">
                                    <a href="" class="btn btn-info btn-circle btn-sm editkel" data-id="<?= $k['id'] ?>" data-toggle="modal" data-target="#modalKelompok">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('SuperAdmin/deleteKel/') . $k['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
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



<!-- Modal Daerah -->
<div class="modal fade" id="modalDaerah" tabindex="-1" role="dialog" aria-labelledby="modalDaerahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDaerahLabel">Daerah Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form method="post" id="formdar" action="<?= base_url('SuperAdmin/tambahDaerah') ?>">
                    <div class="form-group">
                        <input type="text" id="id" name="id" hidden>
                        <input type="text" id="dar" class="form-control" placeholder="Nama Daerah" name="namadaerah">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="butdar" class="btn btn-primary">Tambah</button>
                </form>
                <!-- akhir form input -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Desa -->
<div class="modal fade" id="modalDesa" tabindex="-1" role="dialog" aria-labelledby="modalDesaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDesaLabel">Desa Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form method="post" id="formdes" action="<?= base_url('SuperAdmin/tambahDesa') ?>">
                    <div class="form-group">
                        <input type="text" id="iddes" name="id" hidden>
                        <input type="text" id="des" class="form-control" placeholder="Nama Desa" name="namadesa">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="butdes" class="btn btn-primary">Tambah</button>
                </form>
                <!-- akhir form input -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Kelompok -->
<div class="modal fade" id="modalKelompok" tabindex="-1" role="dialog" aria-labelledby="modalKelompokLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKelompokLabel">Kelompok Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form method="post" id="formkel" action="<?= base_url('SuperAdmin/tambahKel') ?>">
                    <div class="form-group">
                        <input type="text" id="idkel" name="id" hidden>
                        <input type="text" id="kel" class="form-control" placeholder="Nama Kelompok" name="namakel">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="butkel" class="btn btn-primary">Tambah</button>
                </form>
                <!-- akhir form input -->
            </div>
        </div>
    </div>
</div>