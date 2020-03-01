        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left pt-1">Data Admin</h5>
                        <button class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambahUser">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover table-bordered table-responsive-sm" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Master id</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($joinUser as $ju) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $ju['nama_user'] ?></td>
                                        <td><?= $ju['master_id'] ?></td>
                                        <td><?= $ju['nama_level'] ?></td>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <?php if ($ju['is_active'] == 1) : ?>
                                                    <input type="checkbox" class="custom-control-input useract" id="isactswitch <?= $ju['idUser'] ?>" data-id="<?= $ju['is_active'] ?>" data-user="<?= $ju['idUser'] ?>" checked>
                                                    <label class="custom-control-label" for="isactswitch <?= $ju['idUser'] ?>"></label>
                                                <?php else : ?>
                                                    <input type="checkbox" class="custom-control-input useract" id="isactswitch <?= $ju['idUser'] ?>" data-id="<?= $ju['is_active'] ?>" data-user="<?= $ju['idUser'] ?>">
                                                    <label class="custom-control-label" for="isactswitch <?= $ju['idUser'] ?>"></label>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td scope="col">
                                            <a href="<?= base_url('SuperAdmin/editUser/') . $ju['idUser'] ?>" class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            <a href="<?= base_url('SuperAdmin/deleteUser/') . $ju['idUser'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalTambahUser" tabindex="-1" role="dialog" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
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
                        <form method="post" action="<?= base_url('SuperAdmin/dataAdmin') ?>">
                            <div class="form-group">
                                <input type="text" name="namauser" class="form-control" id="namauser" placeholder="Masukan User name" value="<?= set_value('namauser') ?>">

                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="kpassword" class="form-control" id="kpassword" placeholder="Konfirmasi Password">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="masterid" name="masterid">
                                    <option disabled>Master Id</option>
                                    <?php foreach ($joinm as $jm) : ?>
                                        <option value="<?= $jm['id'] ?>"><?= $jm['namades'] . " - " . $jm['namakel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="levelid" name="levelid">
                                    <option disabled>Level Id</option>
                                    <?php foreach ($level as $l) : ?>
                                        <option value="<?= $l['id'] ?>"><?= $l['nama_level'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="isact" id="isact" cheked value=1>
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