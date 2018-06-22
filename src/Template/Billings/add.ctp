<section class="content-header">
    <h1>Set up  Billing/Paying Pricing</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Billing/Paying Pricing</li>
    </ol>
</section>

<!-- Main content -->
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?= $this->Form->create($billing) ?>

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php
                      //  if (!empty($billing)) { ?>     
                        <table class="table table-bordered">
                            <tbody><tr>
                                    <th style="width: 10px">S.No</th>
                                    <th>Point</th>
                                    <th>Billing Rate</th>
                                    <th>Paying Rate</th>
                                </tr>
                                <?php
                                if (isset($_GET['page'])) {
                                    $i = ($_GET['page'] * 10) + 1;
                                } else {
                                    $i = 1;
                                }
                                $j = 0;
                                foreach ($billing as $key => $value) :
                                    $j++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?= h($value->task->name) ?>
                                            <input type="hidden" name="id[]" value="<?php if(isset($value['id'])){ echo $value['id']; } ?>" class="form-control">

                                            <input type="hidden" name="task_id[]" value="<?php if(isset($value['task_id'])){ echo $value['task_id']; } ?>" class="form-control">
                                        </td> 
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="number" name="billrate[]" class="form-control" value="<?php if(isset($value['billrate'])){ echo $value['billrate']; } ?>" id="billrate">
                                                <span class="input-group-addon">sq ft</span>
                                            </div> 
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="number" name="payrate[]" class="form-control"  value="<?php if(isset($value['payrate'])){ echo $value['payrate']; } ?>" id="payrate">
                                            </div> 
                                        </td>
                                    </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                            </tbody></table>
    
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
<?= $this->Form->button(__('Submit')) ?>
                    </div>
                </div>
<?php echo $this->Form->end(); ?>
            </div>
            <!-- /.box -->
            <!-- Form Element sizes -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <div class="paginator">
        <ul class="pagination">
<?= $this->Paginator->first('<< ' . __('first')) ?>
<?= $this->Paginator->prev('< ' . __('previous')) ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(__('next') . ' >') ?>
<?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</section>
