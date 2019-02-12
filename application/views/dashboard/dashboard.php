<?php $canread = $this->session->userdata('canread');

if (!empty($canread)) {
?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Info</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <?php /*?>
    <!-- Left col -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Transaksi Hari Ini</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive" style="overflow-x: scroll">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Nomer</th>
                            <th>No.PKB</th>
                            <th>No. Rangka Kendaraan</th>
                            <th>No. Mesin Kendaraan</th>
                            <th>Tipe Model</th>
                            <th>Plat nomer</th>
                            <th>Nama Customer</th>
                            <th>Pekerjaan</th>
                            <th>Tgl masuk</th>
                            <th>Tgl Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        if(!empty($kendaraan)) {
                        foreach ($kendaraan as $transaksi) {
                            
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $transaksi->nopkb; ?></td>
                                <td><?php echo $transaksi->norangka; ?></td>
                                <td><?php echo $transaksi->nomesin; ?></td>
                                <td><?php echo $transaksi->namamodel; ?></td>
                                <td><?php echo $transaksi->platnomor ?></td>
                                <td><?php echo $transaksi->namacustomer ?></td>                                    
                                <td><?php echo $transaksi->namapekerjaan ?></td>                                    
                                <td><?php echo $transaksi->tglmasuk ?></td>                                    
                                <td><?php echo $transaksi->tglkeluar ?></td>                                    
                            </tr>
                            <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <tr>
                                <td colspan="10" align="center">Tidak Ada Data Yang Ditampilkan</td>                                 
                            </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <?php $caninsert = $this->session->userdata('canread'); 
                if(!empty($caninsert)) {
            ?>
            <a href="<?php echo site_url('kendaraan/create'); ?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah Servis Baru Baru</a>
            <?php } ?>
            <a href="<?php echo site_url('kendaraan'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Servis</a>
        </div>
        <!-- /.box-footer -->
    </div>
</section>
<br/>
<!-- Main content -->
<section class="content">
    <!-- Left col -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Proyek</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Nomer</th>
                            <th>No.PKB</th>
                            <th>No. Rangka Kendaraan</th>
                            <th>No. Mesin Kendaraan</th>
                            <th>Tipe Model</th>
                            <th>Plat nomer</th>
                            <th>Nama Customer</th>
                            <th>Pekerjaan</th>
                            <th>Tgl Servis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($Proyek)) {
                        foreach ($Proyek as $ramal) {
                            
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $ramal->nopkb; ?></td>
                                <td><?php echo $ramal->norangka; ?></td>
                                <td><?php echo $ramal->nomesin; ?></td>
                                <td><?php echo $ramal->namamodel; ?></td>
                                <td><?php echo $ramal->platnomor ?></td>
                                <td><?php echo $ramal->namacustomer ?></td>                                    
                                <td><?php echo $ramal->namapekerjaan ?></td>                                    
                                <td><?php echo $ramal->bulanservis ?></td>
                                <td style="text-align:center" width="100px">
                                <?php
                                    echo anchor(site_url('kendaraan/sendEMail/' . $ramal->idservis), '<i class="fa fa-envelope"></i>', array('data-toggle' => 'tooltip', 'title' => 'email', 'class' => 'btn btn-info btn-sm'));
                                    echo anchor(site_url('kendaraan/senSms/' .  $ramal->idservis), '<i class="fa fa-send-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'sms', 'class' => 'btn btn-primary btn-sm'));
                                ?>
                                </td>                                    
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                                <td colspan="4" align="center"> Tidak Ada Data Yang Ditampilkan</td>                                    
                            </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer -->
    </div>
    <?php */?>
</section>
<?php } else { ?>
<section>
    <h1>
        Anda tidak dapat mengakses halaman ini
    </h1>
</section>
<?php }?>