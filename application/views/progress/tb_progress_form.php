<section class='content-header'>
    <h1>
        Progress
        <small>Form Progress</small>
    </h1>
    <?php 
    $proyek = $this->db->get("proyek")->result_array() ;
   
    ?>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Master</a></li>
        <li class='active'>Form Progress</li>
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
                                <div class='form-group'>Nama Proyek
                                <select class="form-control" name="idproyek" id="idproyek">
                                    <?php foreach($proyek as $value){
                                     echo '<option id="idproyek" name="namaproyek"
                                     value="'.$value['idproyek'].'">'.$value['namaproyek'].'</option>';
                                    }
                                     ?>
                                </select>                              
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nilai Rencana <?php echo form_error('proyek_model') ?>
                                    <input type="text" class="form-control" name="nilairencana" id="namaproyek" placeholder="Nilai Rencana" value="<?php echo $nilairencana    ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nilai Realisasi <?php echo form_error('proyek_model') ?>
                                    <input type="text" class="form-control" name="nilairealisasi" id="nilairealisasi" placeholder="Nilai Realisasi" value="<?php echo $nilairealisasi    ; ?>" />
                                </div>                      
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Timeline <?php echo form_error('proyek_model') ?>
                                    <input type="text" class="form-control" name="timeline" id="nilaiproyek" placeholder="Timeline" value="<?php echo $timeline    ; ?>" />
                                </div>                                
                            </div>
                             <div class='box-body'>
                                <div class='form-group'>Gambar Realisasi <?php echo form_error('proyek_model') ?>
                                    <input class="form-control-file <?php echo form_error('image')? 'is-invalid' : ''?>" type="file" name="gambarrealisasi" id="gambarrealisasi" value="<?php echo $gambarrealisasi    ; ?>" />
                                    <input type = "hidden" name="old_image" value="<?php echo $gambarrealisasi?>" />
                                    <!--input type="text" class="form-control" name="gambarrealisasi" id="gambarrealisasi" placeholder="Gambar Realisasi" value="<?php echo $gambarrealisasi    ; ?>" /-->
                                </div>                                
                            </div>
                            
                            <div class='box-footer'>
                                <input type="hidden" name="idprogress" value="<?php echo $idprogress; ?>" /> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('progress') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->