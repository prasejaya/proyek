
<section class='content-header'>
    <h1>
        Karyawan
        <small>Daftar Karyawan</small>
    </h1>
</section>        
<section class='content'>
    <div class='row'>
            <div class='col-xs-12'>
            <div class='box box-primary'>  
                <div class='box-header with-border'>
                    <h3 class='box-title'><?php echo anchor('karyawan/create/', '<i class="glyphicon glyphicon-plus"></i>Tambah Data', array('class' => 'btn btn-primary btn-sm')); ?>
                        <?php echo anchor(site_url('karyawan/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body table-responsive'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>NIK</th>
                                <th>Nama Karyawan</th>
                                <th>No Hp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            
                            foreach ($Karyawan_data as $karyawan) {
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $karyawan->nik; ?></td>
                                    <td><?php echo $karyawan->namakaryawan; ?></td>
                                    <td><?php echo $karyawan->nohp; ?></td>
                                    <td style="text-align:center" width="100px">
                                    <?php 
                                    $canupdate = $this->session->userdata('canupdate'); 
                                    $candelete = $this->session->userdata('candelete'); 
                                    if(!empty($canupdate)) { 
                                        echo anchor(site_url('karyawan/update/' . $karyawan->idkaryawan), '<i class="fa fa-pencil-square-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'edit', 'class' => 'btn btn-info btn-sm'));
                                    };
                                    if(!empty($candelete)) { 
                                        echo anchor(site_url('karyawan/delete/' . $karyawan->idkaryawan), '<i class="fa fa-trash-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'delete', 'class' => 'btn btn-danger btn-sm'));
                                    };
                                    ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>					
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>
<script type="text/javascript">
function confirmDialog() {
    return confirm("Are you sure you want to delete this record?")
}
</script>