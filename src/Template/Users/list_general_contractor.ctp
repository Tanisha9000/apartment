<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List General Contractor
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Properties</a></li>
        <li class="active"> List General Contractor </li>
    </ol>
</section>

<!-- Main content -->

<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <!--<form role="form">-->
                    <!-- /.box-body -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                        <th style="width:10px;">S.No</th>
                                        <th style="width:120px;">name</th>
                                        <th>phone</th>
                                        <th style="width:120px;">tax-id</th>
                                        <th>logo</th>
                                         <th class="actions" style="width:113px;"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php
                                    if (isset($_GET['page'])) {
                                        $i = ($_GET['page'] * 10) + 1;
                                    } else {
                                        $i = 1;
                                    }
                                    foreach ($users as $user):
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td> 
                                            <td><?= h($user->name) ?></td>
                                            <td><?= h($user->phone) ?></td>
                                            <td><?= h($user->taxid) ?></td>
                                            <td><?php echo $this->Html->image('upload_dir/'.$user->image); ?></td>
                                            <!-- <td><?//= h($user->image) ?></td> -->
                                            <td>   
                                            <?php echo $this->Html->link(
                                                'Edit',
                                                '/users/editGeneralcontractor/'.$user->id,
                                                ['class' => 'btn btn-block btn-primary']); 
                                            ?>
                                            <?php if($loggeduser['role'] != 'officeuser'){
                                            echo $this->Form->postLink(
                                                __('Delete'),
                                                ['action' => 'deleteGeneralcontractor', $user->id],
                                                ['class' => 'btn btn-block btn-danger', 
                                                'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
                                            );
                                            } ?>
                                         
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                        ?>
                                    <?php endforeach; ?>

                                </tbody></table>
                        </div>
                        <!-- /.box-body -->

                    </div>
                <!--</form>-->
            </div>
            <!-- /.box -->

            <!-- Form Element sizes -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
</section>

<style>
.btn-danger{
margin-top:5px;
}
</style>