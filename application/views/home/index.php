<!-- <div class="container-fluid" style="background-image:url('<?= base_url('assets/img/profile/backhome.jpg') ?>');background-repeat:no-repeat;background-position:center;background-size:cover">

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg">
                <h1 class="float-left" style="color:white;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"><b><?= $home['title']; ?></b></h1>
                <?php if ($this->session->has_userdata('namaUser')) : ?>
                    <a href="<?= base_url('auth/logout') ?>" class="float-right mt-2 ml-2" style="text-decoration: none;color:white">Logout</a>
                    <a href="<?= base_url('admin') ?>" class="float-right mt-2" style="text-decoration: none;color:white">Admin</a>

                <?php else : ?>
                    <a href="<?= base_url('admin') ?>" class="float-right mt-2" style="text-decoration: none;color:white">LOGIN</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <h5 style="color:white"><u><?= $home['subtitle']; ?></u></h5>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
            
                <ul class="list-group listhome">
                    <li class="list-group-item list-group-item-dark list-group-item-action font-weight-bold"><?= $home['header1']; ?></li>
                    <li class="list-group-item list-group-item-action">1. <?= $home['name1']; ?></li>
                    <li class="list-group-item list-group-item-action">2. <?= $home['name2']; ?></li>
                    <li class="list-group-item list-group-item-action">3. <?= $home['name3']; ?></li>
                    <li class="list-group-item list-group-item-action">4. <?= $home['name4']; ?></li>
                </ul>
            </div>
            <div class="col-sm-6">
            
                <ul class="list-group listhome">
                    <li class="list-group-item list-group-item-dark list-group-item-action font-weight-bold"><?= $home['header2']; ?></li>
                    <li class="list-group-item list-group-item-action">1. <?= $home['name5']; ?></li>
                    <li class="list-group-item list-group-item-action">2. <?= $home['name6']; ?></li>
                    <li class="list-group-item list-group-item-action">3. <?= $home['name7']; ?></li>
                    <li class="list-group-item list-group-item-action">4. <?= $home['name8']; ?></li>
                </ul>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg silsilah">
                <a href="<?= base_url('silsilah') ?>" class="btn btn-info font-weight-bold">SILSILAH</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg pt-2" style="min-height: 220px;background-color:transparent;">
                <div class="card-group mb-2">
                    <div class="card mr-1 rounded">
                        <img style="height: 210px" src="<?= base_url('assets/img/homepict/') . $home['pict1'] ?>" class=" card-img-top" alt="...">
                    </div>
                    <div class="card mr-1 rounded">
                        <img style="height: 210px" src="<?= base_url('assets/img/homepict/') . $home['pict2'] ?>" class=" card-img-top" alt="...">

                    </div>
                    <div class="card mr-1 rounded">
                        <img style="height: 210px" src="<?= base_url('assets/img/homepict/') . $home['pict3'] ?>" class=" card-img-top" alt="...">

                    </div>
                    <div class="card mr-1 rounded">
                        <img style="height: 210px" src="<?= base_url('assets/img/homepict/') . $home['pict4'] ?>" class=" card-img-top" alt="...">

                    </div>
                    <div class="card mr-1 rounded">
                        <img style="height: 210px" src="<?= base_url('assets/img/homepict/') . $home['pict5'] ?>" class=" card-img-top" alt="...">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption" style="text-align:end;padding-top:15px;font-size: 1.5vw;right:25px">

                            <!-- <a href="<?= base_url('silsilah') ?>" class=" text-decoration-none text-white">Silsilah</a>
                            &nbsp;
                            <?php if ($this->session->has_userdata('namaUser')) : ?>
                                <a href="<?= base_url('auth') ?>" class="text-decoration-none text-white">Admin</a>
                            <?php else : ?>
                                <a href="<?= base_url('auth') ?>" class="text-decoration-none text-white">Login</a>
                            <?php endif; ?> -->

                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="navbar-brand" href="#"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                    </ul>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a href="<?= base_url('silsilah') ?>" class=" text-decoration-none text-white h5">Silsilah</a>
                                        </li>
                                        &nbsp;&nbsp;
                                        </br>
                                        <li class="nav-item">
                                            <?php if ($this->session->has_userdata('namaUser')) : ?>
                                                <a href="<?= base_url('auth') ?>" class="text-decoration-none text-white h5">Admin</a>
                                            <?php else : ?>
                                                <a href="<?= base_url('auth') ?>" class="text-decoration-none text-white h5">Login</a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </nav>

                        </div>
                        <div class="carousel-caption d-md-block">
                            <div style="font-size: 5vw;padding-top:20px"><?= $home['title']; ?></div>
                            <div style="font-size: 3vw;margin-top:-10px"><?= $home['subtitle']; ?></div>
                        </div>
                        <img id="car-head" src=" <?= base_url('assets/img/profile/backhome.jpg') ?>" class="" alt=" ...">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mt-5 mb-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <h4 class="mb-4 font-weight-bolder">
                                <?= $home['header1']; ?>
                            </h4>
                            <p class="" style="font-size: 18px">
                                <?= $home['desk']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class='slick-img'>
                <div>
                    <img src="<?= base_url('assets/img/homepict/') . $home['pict1'] ?>"" >
                </div>
                <div>
                    <img src=" <?= base_url('assets/img/homepict/') . $home['pict2'] ?>"">
                </div>
                <div>
                    <img src="<?= base_url('assets/img/homepict/') . $home['pict3'] ?>"" >
                </div>
                <div>
                    <img src=" <?= base_url('assets/img/homepict/') . $home['pict4'] ?>"">
                </div>
                <div>
                    <img src="<?= base_url('assets/img/homepict/') . $home['pict5'] ?>"" >
                </div>
            </div>
            <div class=" row mt-5 text-center">
                    <div class="col-lg">
                        <a href="<?= base_url('silsilah') ?>" class="h3 font-weight-bold text-decoration-none text-dark">Silsilah</a>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-lg">
                        <div id="chart-container" class='img-responsive'></div>
                    </div>
                </div>
                <?php $a = $this->session->userdata('namaUser'); ?>
                <div id="cekses" data-ses="<?= $a ?>"></div>