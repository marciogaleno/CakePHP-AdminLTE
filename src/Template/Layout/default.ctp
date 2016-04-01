<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <? ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/bootstrap/css/bootstrap.min.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/dist/css/AdminLTE.min.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/dist/css/skins/_all-skins.min.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/plugins/iCheck/flat/blue.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/plugins/morris/morris.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/plugins/datepicker/datepicker3.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/plugins/daterangepicker/daterangepicker-bs3.css' ?>"/>
    <link rel="stylesheet" href="<?= $this->request->webroot . 'adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ?>"/>
</head>
<body class="sidebar-mini skin-green wysihtml5-supported">
<!--  <body class="sidebar-mini skin-green-light wysihtml5-supported">
 -->    <div class="wrapper">

        <?= $this->element('common/header');?>
        <?= $this->element('common/main-sidebar');?>
        <?= $this->element('common/content-wrapper');?>
        <?= $this->element('common/main-footer');?>
        <?php //$this->element('common/control-sidebar');?>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= $this->request->webroot . 'adminlte/bootstrap/js/bootstrap.min.js' ?>"></script>

    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?= $this->request->webroot . 'adminlte/plugins/morris/morris.min.js' ?>"></script>

    <!-- Sparkline -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/sparkline/jquery.sparkline.min.js' ?>"></script>

    <!-- jvectormap -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ?>"></script>
    <script src="<?= $this->request->webroot . 'adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ?>"></script>

    <!-- jQuery Knob Chart -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/knob/jquery.knob.js' ?>"></script>

    <!-- daterangepicker -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/daterangepicker/daterangepicker.js' ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

    <!-- datepicker -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ?>"></script>

    <!-- Slimscroll -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>

    <!-- FastClick -->
    <script src="<?= $this->request->webroot . 'adminlte/plugins/fastclick/fastclick.min.js' ?>"></script>

    <!-- AdminLTE App -->
    <script src="<?= $this->request->webroot . 'adminlte/dist/js/app.min.js' ?>"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= $this->request->webroot . 'adminlte/dist/js/pages/dashboard.js' ?>"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?= $this->request->webroot . 'adminlte/dist/js/demo.js' ?>"></script>
  </body>
</html>
