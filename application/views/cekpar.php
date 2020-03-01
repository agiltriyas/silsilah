<div id="chart-container" class='img-responsive'></div>

<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalView">
                <div class="row">
                    <div class="col-lg-6">
                        <img class="card-img-top pict1" src="" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item nama1"></li>
                                <li class="list-group-item ttl1"></li>
                                <li class="list-group-item no1"></li>
                                <li class="list-group-item alamat1"></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="card-img-top pict2" src="" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item nama2"></li>
                                <li class="list-group-item ttl2"></li>
                                <li class="list-group-item no2"></li>
                                <li class="list-group-item alamat2"></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- </div>  -->
            </div>
            <div class="modal-footer footerview">
                <a href="" class="btn btn-outline-danger delete"><i class="fas fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalCreate">
                <?php echo form_open_multipart('admin/tambahpar'); ?>
                <input type="text" name="id" class="idpar" hidden>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="namapar1" class="form-control namapar1" disabled>
                    </div>
                    <div class="col form-group">
                        <input type="text" name="namapar2" class="form-control namapar2" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="nama1" class="form-control" placeholder="Nama 1">
                    </div>
                    <div class="col form-group">
                        <input type="text" name="nama2" class="form-control" placeholder="Nama 2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="tempat1" class="form-control" placeholder="Tempat Lahir">
                    </div>
                    <div class="col form-group">
                        <input type="text" name="tempat2" class="form-control" placeholder="Tempat Lahir">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="date" name="tgl1" class="form-control" placeholder="Tempat">
                    </div>
                    <div class="col form-group">
                        <input type="date" name="tgl2" class="form-control" placeholder="Tempat">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="no1" class="form-control" placeholder="No. Hp">
                    </div>
                    <div class="col form-group">
                        <input type="text" name="no2" class="form-control" placeholder="No. Hp">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="alamat1" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="col form-group">
                        <input type="text" name="alamat2" class="form-control" placeholder="Alamat">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="pict1" id="pict1">
                            <label class=" custom-file-label" for="inputGroupFile02">Choose Picture</label>
                            <small>Max 2mb</small>
                        </div>
                    </div>
                    <div class="col form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="pict2" id="pict2">
                            <label class=" custom-file-label" for="inputGroupFile02">Choose Picture</label>
                            <small>Max 2mb</small>
                        </div>
                    </div>
                </div> <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><b>Simpan</b></button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalEdit">
                <?php echo form_open_multipart('admin/editpar'); ?>
                <input type="text" name="id" class="id" hidden>
                <input type="text" name="idpar" class="idpar" hidden>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="nama1" class="form-control nama1" placeholder="Nama 1">
                    </div>
                    <div class="col form-group">
                        <input type="text" name="nama2" class="form-control nama2" placeholder="Nama 2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="tempat1" class="form-control tempat1" placeholder="Tempat Lahir">
                    </div>
                    <div class="col form-group">
                        <input type="text" name="tempat2" class="form-control tempat2" placeholder="Tempat Lahir">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="date" name="tgl1" class="form-control tgl1" placeholder="Tempat">
                    </div>
                    <div class="col form-group">
                        <input type="date" name="tgl2" class="form-control tgl2" placeholder="Tempat">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="no1" class="form-control no1" placeholder="No. Hp">
                    </div>
                    <div class="col form-group">
                        <input type="text" name="no2" class="form-control no2" placeholder="No. Hp">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" name="alamat1" class="form-control alamat1" placeholder="Alamat">
                    </div>
                    <div class="col form-group">
                        <input type="text" name="alamat2" class="form-control alamat2" placeholder="Alamat">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="pict1" id="pict1">
                            <label class=" custom-file-label" for="inputGroupFile02">Choose Picture</label>
                            <small>Max 2mb</small>
                        </div>
                    </div>
                    <div class="col form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="pict2" id="pict2">
                            <label class=" custom-file-label" for="inputGroupFile02">Choose Picture</label>
                            <small>Max 2mb</small>
                        </div>
                    </div>
                </div> <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><b>Simpan</b></button>
            </div>
            </form>
        </div>
    </div>
</div>