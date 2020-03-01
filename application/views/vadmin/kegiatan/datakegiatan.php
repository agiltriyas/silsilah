<div class="row mb-3">
    <div class="col-lg text-center">
        <h2>Kegiatan <?= $extitle; ?></h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card border-bottom-info shadow cardkeg">
            <div class="card-header">
                Kegiatan Generus Remaja
            </div>
            <a href="
            <?php if ($extitle == "Kelompok") : ?>
            <?= base_url('admin/kegiatangen/kelompok?idjk=1') ?>
            <?php elseif ($extitle == "Desa") : ?>
            <?= base_url('admin/kegiatangen/desa?idjk=1') ?>
            <?php elseif ($extitle == "Daerah") : ?>
            <?= base_url('admin/kegiatangen/daerah?idjk=1') ?>
<?php endif; ?>
            ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kegiatan Bulan <?= date('F'); ?> <?= $prg['jum_kegkel'] ?> dari <?= $prg['totalkegkel'] ?> </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $prg['presentasekeg'] ?>%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $prg['presentasekeg'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-bottom-success shadow cardkeg2">
            <div class="card-header">
                Kegiatan Generus Pra Remaja
            </div>
            <a>
                <div class="card-body">
                    <h2>SOON</h2>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 ">
        <div class="card border-bottom-primary shadow cardkeg3">
            <div class="card-header">
                Kegiatan Generus Caberawit
            </div>
            <a>
                <div class="card-body">
                    <h2>SOON</h2>
                </div>
            </a>
        </div>
    </div>
</div>