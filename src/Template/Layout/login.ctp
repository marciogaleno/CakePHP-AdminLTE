<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title_for_layout?> | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/bootstrap/css/bootstrap.min.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/dist/css/AdminLTE.min.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/plugins/iCheck/flat/blue.css' ?>"/>
 


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?= $this->Url->build('/users/login')?>"><b><?= $title_for_layout?></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <br>
        <?= $this->Flash->render()?>
        <?= $this->fetch('content') ?>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>    
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= $this->request->webroot . 'adminlte/bootstrap/js/bootstrap.min.js' ?>"></script>
    <!-- iCheck -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/iCheck/icheck.min.js' ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
