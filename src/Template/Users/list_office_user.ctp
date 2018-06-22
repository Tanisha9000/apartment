<section class="content-header">
    <h1>
        List office user

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Properties</a></li>
        <li class="active"> List office user </li>
        
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
                    <h3 class="box-title">Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                    <!-- /.box-body -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                        <th style="width:10px;">S.No</th>
                                        <th style="width:120px;">name</th>
                                        <th>phone</th>
                                        <th style="width:120px;">email</th>
                                        <th>address</th>
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
                                            <td><?= h($user->email) ?></td>            
                                            <td><?= h($user->address);  ?></td>       
                                            <td>
                                            <?= $this->Html->link(
                                                        'Edit',
                                                        '/users/edit/'.$user->id,
                                                        ['class' => 'btn btn-block btn-primary']
                                            ); ?>
          
                                                   <?= $this->Form->postLink(
                                                        __('Delete'),
                                                        ['action' => 'delete', $user->id],
                                                        ['class' => 'btn btn-block btn-danger', 
                                                        'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
