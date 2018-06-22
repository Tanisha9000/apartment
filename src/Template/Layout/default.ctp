<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'Apartments';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?php //$this->Html->css('base.css') ?>
        <?php //$this->Html->css('style.css') ?>
        <?= $this->Html->css(array('AdminLTE.min', '_all-skins.min', 'bootstrap3-wysihtml5.min', 'jquery-jvectormap', 'ionicons.min', 'daterangepicker', 'bootstrap', 'bootstrap-theme', 'bootstrap-datepicker.min', 'bootstrap.min', 'bootstrap-theme.min')) ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <?php echo $this->Html->script(array('jquery.min')); ?>
         <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>-->

         <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script> 
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?= $this->element('Admin/header') ?>
            <?= $this->element('Admin/sidebar') ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
            <!-- include footer here -->
            <?= $this->element('Admin/footer') ?>
        </div>
        <?php echo $this->Html->script(array('jquery-ui.min', 'bootstrap.min', 'raphael.min', 'jquery.sparkline.min', 'jquery-jvectormap-1.2.2.min', 'jquery-jvectormap-world-mill-en', 'jquery.knob.min', 'daterangepicker', 'bootstrap-datepicker.min', 'bootstrap3-wysihtml5.all.min', 'jquery.slimscroll.min', 'fastclick', 'adminlte.min.js', 'demo')) ?>
        <script> 
            $(document).ready(function(){

        var a = $('a[href="<?php echo $this->request->webroot . $this->request->url ?>"]');
        if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }
    });
    </script>
        
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    </body>
</html>

