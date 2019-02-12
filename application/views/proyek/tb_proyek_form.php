<section class='content-header'>
    <h1>
        PROYEK
        <small>Form Proyek</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Master</a></li>
        <li class='active'>Form Proyek</li>
    </ol>
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
                                <div class='form-group'>Kontrak Proyek <?php echo form_error('proyek_model') ?>
                                    <input type="text" class="form-control" name="kontrakproyek" id="kontrakproyek" placeholder="Kontrak Proyek" value="<?php echo $kontrakproyek    ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama proyek <?php echo form_error('proyek_model') ?>
                                    <input type="text" class="form-control" name="namaproyek" id="namaproyek" placeholder="Nama proyek" value="<?php echo $namaproyek    ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>
                                <label>Tanggal Proyek</label>  <br> 
                                    <input type="date" id="tglproyek" name="tglproyek" value="<?php echo $tglproyek;?>"/>                            
                                </div>                      
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nilai Proyek <?php echo form_error('proyek_model') ?>
                                    <input type="text" class="form-control" name="nilaiproyek" id="nilaiproyek" placeholder="Nilai proyek" value="<?php echo $namaproyek    ; ?>" />
                                </div>                                
                            </div>
                             <div class='box-body'>
                                <div class='form-group'>Lokasi proyek <?php echo form_error('proyek_model') ?>
                                    <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi proyek" value="<?php echo $namaproyek    ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Owner<?php echo form_error('proyek_model') ?>
                                    <input type="text" class="form-control" name="owner" id="owner" placeholder="Owner" value="<?php echo $namaproyek    ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="idproyek" value="<?php echo $idproyek; ?>" /> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('proyek') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->
<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script> 
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script> 
        <script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js');?>"></script>