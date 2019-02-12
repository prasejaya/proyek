
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
                <div class='box-header'>
                <h3 class='box-title'> Detail Karyawa</h3>
        <table class="table table-bordered">
	    <tr><td>Karyawan</td><td><?php echo $Karyawan_data; ?></td></tr>
	</table>
        <div class='box-footer'>
        <a href="<?php echo site_url('karyawan') ?>" class="btn btn-primary">Back</a>
        </div>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->