<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<section class="content-header">
    <h1>
        Master Task List

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"> List Master Task </li>
    </ol>
</section>
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
                                        <th>name</th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php
                                    if (isset($_GET['page'])) {
                                        $i = ($_GET['page'] * 10) + 1;
                                    } else {
                                        $i = 1;
                                    }
                                    foreach ($tasks as $task):?>
                                        <tr>
                                            <td><?php echo $i; ?></td> 
                                            <td><?= h($task->name) ?></td>
                                            <td style="width:113px;">   
                                            <?php echo $this->Html->link(
                                                'Edit',
                                                '/tasks/edit/'.$task->id,
                                                ['class' => 'btn btn-primary']
                                            ); ?>

                                                   <?= $this->Form->postLink(
                                                    __('Delete'),
                                                    ['action' => 'delete', $task->id],
                                                    ['class' => 'btn btn-danger', 
                                                    'confirm' => __('Are you sure you want to delete # {0}?', $task->id)]
                                                ) ?>
                                           
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


<div class="users index large-9 medium-8 columns content">
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
</div>
<script>
 setTimeout(function(){
   //  alert('entered')
        $("div.alert").remove();
    }, 5000 ); // 5 secs

</script>
<style type="text/css">
	.btn{
		display:block;
		margin-bottom:5px;
	}
</style>