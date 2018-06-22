<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Floor[]|\Cake\Collection\CollectionInterface $floors
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Floor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<!--<div class="floors index large-9 medium-8 columns content">
    <h3><?= __('Floors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('buildings_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($floors as $floor): ?>
            <tr>
                <td><?= $this->Number->format($floor->id) ?></td>
                <td><?= h($floor->name) ?></td>
                <td><?= $floor->has('building') ? $this->Html->link($floor->building->name, ['controller' => 'Buildings', 'action' => 'view', $floor->building->id]) : '' ?></td>
                <td><?= h($floor->created) ?></td>
                <td><?= h($floor->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $floor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $floor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $floor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>-->

<section class="content-header">
    <h1>List Floors</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">floors</li>
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
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                    <th style="width: 10px">S.No</th>
                                    <th>Floor name</th>
                                    <th>Floor belongs to Building</th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php
                                if (isset($_GET['page'])) {
                                    $i = ($_GET['page'] * 10) + 1;
                                } else {
                                    $i = 1;
                                }
                                foreach ($floors as $floor):
                                    ?>          
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?= h($floor->name) ?></td>
                                        <td><?= $floor->has('building') ? $this->Html->link($floor->building->name, ['controller' => 'Buildings', 'action' => 'view', $floor->building->id]) : '' ?></td>
                                        <td>
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $floor->id],['class' => 'btn btn-info']) ?>
                                            <?php
                                            echo $this->Html->link(
                                                    'Edit', '/floors/edit/' . $floor->id, ['class' => 'btn btn-primary']
                                            );
                                            ?>
                                            <?=
                                            $this->Form->postLink(
                                                    __('Delete'), ['action' => 'delete', $floor->id], ['class' => 'btn btn-danger',
                                                'confirm' => __('Are you sure you want to delete # {0}?', $floor->id)]
                                            )
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
</section>
<!-- /.content -->
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
<style type="text/css">
.paginator .pagination li a{
	    text-transform: capitalize;
}
</style>
