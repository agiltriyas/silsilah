        <div class="row">
            <div class="col-lg-4">
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($admin as $adm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $adm['nama_user'] ?></td>
                                        <td scope="col">
                                            <a href="<?= base_url('admin/updateUser/') . $adm['id'] ?>" class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('admin/deleteUser/') . $adm['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Konfirmasi Pengahapusan')">
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
                        <h5 class="modal-title" id="modalTambahUserLabel">Admin Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">

                        <!-- form input -->
                        <form method="post" action="<?= base_url('admin/index') ?>">
                            <div class="form-group">
                                <input type="text" name="namauser" class="form-control" id="namauser" placeholder="Masukan User name" value="<?= set_value('namauser') ?>">

                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="kpassword" class="form-control" id="kpassword" placeholder="Konfirmasi Password">
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