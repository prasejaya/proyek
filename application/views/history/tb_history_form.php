<section class='content-header'>
    <h1>
        History
        <small>History Progress</small>
    </h1>
    <?php 
    $history = $this->db->get("history")->result_array() ;
   
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
                                <div class='form-group'>History Proyek
                                <select class="form-control" name="idhistory" id="idhistory">
                                    <?php foreach($history as $value){
                                     echo '<option id="idhistory" name="namahistory"
                                     value="'.$value['idhistory'].'">'.$value['namahistory'].'</option>';
                                    }
                                     ?>
                                </select>                              
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nilai Rencana <?php echo form_error('history_model') ?>
                                    <input type="text" class="form-control" name="nilairencana" id="namahistory" placeholder="Nilai Rencana" value="<?php echo $nilairencana    ; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nilai Realisasi <?php echo form_error('history_model') ?>
                                    <input type="text" class="form-control" name="nilairealisasi" id="nilairealisasi" placeholder="Nilai Realisasi" value="<?php echo $nilairealisasi    ; ?>" />
                                </div>                      
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Timeline <?php echo form_error('history_model') ?>
                                    <input type="text" class="form-control" name="timeline" id="nilaihistory" placeholder="Timeline" value="<?php echo $timeline    ; ?>" />
                                </div>                                
                            </div>
                             <div class='box-body'>
                                <div class='form-group'>Gambar Realisasi <?php echo form_error('history_model') ?>
                                    <input type="text" class="form-control" name="gambarrealisasi" id="gambarrealisasi" placeholder="Gambar Realisasi" value="<?php echo $gambarrealisasi    ; ?>" />
                                </div>                                
                            </div>
                            
                            <div class='box-footer'>
                                <input type="hidden" name="idprogress" value="<?php echo $idprogress; ?>" /> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('history') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->