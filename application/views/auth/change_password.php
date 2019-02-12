<html>
    <head>
        <meta charset="UTF-8">
        <title>Proyek | Ganti Password</title>
        <link href='<?php echo base_url("assets/img/favicon.ico"); ?>' rel='shortcut icon' type='image/x-icon'/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" >
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">  
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet">        
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/js/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet"> 
            <link href="<?php echo base_url('assets/css/main_style.css'); ?>" rel="stylesheet" >

    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#" ><b class="primary-color">Proyek</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg text-bold">Silahkan Rubah Password Anda</p>
                
       <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script> 
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>   
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
        
 <form action="<?php echo site_url('auth/change_password') ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="Password Baru" data-toggle="password"/> 
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Ketik Ulang Password Baru" data-toggle="password"/> 
                    </div>
                    <div class="row">                        
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Ganti Password</button>
                        </div><!-- /.col -->
                    </div>
                </form>
   
       </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script> 
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>   
    </body>
</html>
<?php echo form_close();?>
 <script type="text/javascript">
            $("#password").password('toggle')
        </script>