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
$cakeDescription = 'Login';
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
        <?= $this->Html->css(array('AdminLTE.min', '_all-skins.min', 'bootstrap3-wysihtml5.min', 'morris', 'jquery-jvectormap', 'ionicons.min', 'daterangepicker', 'bootstrap', 'bootstrap-theme', 'bootstrap-datepicker.min', 'bootstrap.min', 'bootstrap-theme.min')) ?>


        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <!--  <body class="hold-transition skin-blue sidebar-mini">-->
        <div class="wrapper">
             <?= $this->Flash->render() ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?= $this->fetch('content') ?>
            </div>
            <!-- include footer here -->
            <?//= $this->element('Admin/footer') ?>
        </div>
        <?php echo $this->Html->script(array('jquery.min', 'demo', 'dashboard', 'adminlte.min.js', 'bootstrap3-wysihtml5.all.min', 'jquery-jvectormap-world-mill-en', 'jquery-jvectormap-1.2.2.min', 'bootstrap.min', 'bootstrap', 'bootstrap-datepicker.min', 'daterangepicker', 'fastclick', 'jquery-ui.min', 'jquery.knob.min', 'jquery.slimscroll.min', 'jquery.sparkline.min', 'moment.min', 'morris.min', 'raphael.min')) ?>
   <!-- </body>-->
</html>
<script>
    $("#apmanagname").change(function () {
        var selectedrole = $("#apmanagname option:selected").val();
        //  alert("You have selected - " + selectedrole);
        jQuery.ajax({
            method: 'POST',
            data: {user_id: selectedrole},
            url: 'http://localhost/apartment/properties/addfield',
        }).then(function successCallback(response) {
            console.log(JSON.parse(response))
            var res = JSON.parse(response);
            console.log(res.data)
            $("#apartemail").val(res.data.email);
            $("#apartphone").val(res.data.phone);
        }, function errorCallback(error) {
            console.log(error)
        });
    });

    $("#generalcont").change(function () {
        var selectedrole = $("#generalcont option:selected").val();
        //  alert("You have selected - " + selectedrole);
        jQuery.ajax({
            method: 'POST',
            data: {user_id: selectedrole},
            url: 'http://localhost/apartment/properties/addfield',
        }).then(function successCallback(response) {
            console.log(JSON.parse(response))
            var res = JSON.parse(response);
            console.log(res.data)
            $("#generalemail").val(res.data.email);
            $("#generalphone").val(res.data.phone);
        }, function errorCallback(error) {
            console.log(error)
        });
    });

    $("#buildingsave").click(function () {
        var building = $("#buildingname").val();
        alert("You have entered building - " + building);

        $.ajax({
            method: 'POST',
            data: {building_name: building},
            url: 'http://localhost/apartment/buildings/add',
        }).then(function successCallback(response) {
            console.log(JSON.parse(response))

        }, function errorCallback(error) {
            console.log(error)
        });

    });

    $("#addproperty").submit(function (event) {
        alert("Handler for .submit() called.");
        var $inputs = $('#addproperty :input');
var data=$(this).serializeArray();
        // not sure if you wanted this, but I thought I'd add it.
        // get an associative array of just the values.
        var values = {};
//        $inputs.each(function () {
//            values[this.name] = $(this).val();
//        });
        for(var i=1;i< data.length ; i++){
            console.log(data[i])
           values[data[i].name].push(data[i].val());
        }
        console.log(values)
//         jQuery.each( frmdata, function( i, field ) {
//     
//    });
//        $.ajax({
//            method: 'POST',
//            data: {} ,
//            url: 'http://localhost/apartment/properties/add',
//        }).then(function successCallback(response) {
//            console.log(JSON.parse(response))
//
//        }, function errorCallback(error) {
//            console.log(error)
//        });
        event.preventDefault();
    });

</script>
