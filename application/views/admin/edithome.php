<div class="row">
    <div class="col-lg-6">
        <?php echo form_open_multipart('admin/doedithome'); ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="title">Title</label>
            <div class="col-sm-10">
                <?php if ($home['subtitle']) : ?>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $home['title'] ?>" required>
                <?php else : ?>
                    <input type="text" class="form-control" id="title" name="title" required>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="subtitle">Sub Title</label>
            <div class="col-sm-10">
                <?php if ($home['subtitle']) : ?>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?= $home['subtitle'] ?>" required>
                <?php else : ?>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" required>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="header1">Header</label>
            <div class="col-sm-10">
                <?php if ($home['header1']) : ?>
                    <input type="text" class="form-control" id="header1" name="header1" value="<?= $home['header1'] ?>" required>
                <?php else : ?>
                    <input type="text" class="form-control" id="header1" name="header1" required>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="desk">Deskripsi</label>
            <div class="col-sm-10">
                <?php if ($home['desk']) : ?>
                    <textarea class="form-control" id="desk" name="desk" rows="7" required><?= $home['desk'] ?></textarea>
                <?php else : ?>
                    <textarea class="form-control" id="desk" name="desk" rows="7"></textarea>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
<div class="row justify-content-center mt-2">
    <div class="col-lg-2">
        <div class="form-group">
            <label for="pict1">Picture 1</label>
            <div class="card" style="width: 150px;">
                <img class="card-img-top img-thumbnail" style="width:150px;height:150px;" src=" <?= base_url('assets/img/homepict/') . $home['pict1'] ?>" alt="Card image cap">
            </div>
            <input type="file" class="form-control-file" id="pict1" name="pict1">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label for="pict2">Picture 2</label>
            <div class="card" style="width: 150px;">
                <img class=" card-img-top img-thumbnail" style="width: 150px;height:150px;" src="<?= base_url('assets/img/homepict/') . $home['pict2'] ?>" alt="Card image cap">
            </div>
            <input type="file" class="form-control-file" id="pict2" name="pict2">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label for="pict3">Picture 3</label>
            <div class="card" style="width: 150px;">
                <img class=" card-img-top img-thumbnail" style="width: 150px;height:150px;" src="<?= base_url('assets/img/homepict/') . $home['pict3'] ?>" alt="Card image cap">
            </div>
            <input type="file" class="form-control-file" id="pict3" name="pict3">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label for="pict4">Picture 4</label>
            <div class="card" style="width: 150px;">
                <img class=" card-img-top img-thumbnail" style="width: 150px;height:150px;" src="<?= base_url('assets/img/homepict/') . $home['pict4'] ?>" alt="Card image cap">
            </div>
            <input type="file" class="form-control-file" id="pict4" name="pict4">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label for="pict5">Picture 5</label>
            <div class="card" style="width: 150px;">
                <img class=" card-img-top img-thumbnail" style="width: 150px;height:150px;" src="<?= base_url('assets/img/homepict/') . $home['pict5'] ?>" alt="Card image cap">
            </div>
            <input type="file" class="form-control-file" id="pict5" name="pict5">
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>