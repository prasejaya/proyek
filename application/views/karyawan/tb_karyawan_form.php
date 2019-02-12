<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<section class='content-header'>
    <h1>
        Karyawan
        <small>Karyawan</small>
    </h1>
    <?php 
    $jabatan = $this->db->get("jabatan")->result_array() ;
    $idusers = $this->session->userdata('idusers'); 
    ?>
</section>        
<section class='content'>
    <div class='row'>
        <!-- left column -->
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class='box box-primary'>
                <div class='box-header'>
                    <div class='col-md-5'>
                        <form action="<?php echo $action; ?>" method="post">
                            <div class='box-body'>
                                <div class='form-group'>NIK <?php echo form_error('karyawan_model') ?>
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Karyawan" value="<?php echo $nik    ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama Karyawan <?php echo form_error('karyawan_model') ?>
                                    <input type="text" class="form-control" name="namakaryawan" id="namakaryawan" placeholder="Nama Karyawan" value="<?php echo $namakaryawan    ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>No Hp <?php echo form_error('karyawan_model') ?>
                                    <input type="text" class="form-control" name="nohp" id="nohp" placeholder="0982918921" value="<?php echo $nohp      ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama Jabatan
                                <select class="form-control" name="namajabatan" id="namajabatan">
                                    <?php foreach($jabatan as $value){
                                     echo '<option id="namajabatan" name="namajabatan"
                                     value="'.$value['namajabatan'].'">'.$value['namajabatan'].'</option>';
                                    }
                                     ?>
                                </select>
                                </div>                                
                            </div>
                             <div class='box-body'>
                                <div class='form-group'>Password <?php echo form_error('karyawan_model') ?>
                                    <input type="password" id="password" name="password" class="form-control" data-toggle="password" value="<?php echo $password?>" />
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="idkaryawan" value="<?php echo $idkaryawan; ?>" /> 
                                <input type="hidden" name="idusers" value="<?php echo $idusers; ?>" /> 
                                <?php $canupdate = $this->session->userdata('canupdate'); 
                                if(!empty($canupdate)) { ?>
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a>
                            </div>
                            <?php }?>
                            
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->
<script type="text/javascript">
    $("#password").password('toggle');
</script>