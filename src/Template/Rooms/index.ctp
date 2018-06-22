<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room[]|\Cake\Collection\CollectionInterface $rooms
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Apartments'), ['controller' => 'Apartments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Apartment'), ['controller' => 'Apartments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rooms index large-9 medium-8 columns content">
    <h3><?= __('Rooms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apartments_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= $this->Number->format($room->id) ?></td>
                <td><?= h($room->name) ?></td>
                <td><?= $room->has('apartment') ? $this->Html->link($room->apartment->name, ['controller' => 'Apartments', 'action' => 'view', $room->apartment->id]) : '' ?></td>
                <td><?= h($room->created) ?></td>
                <td><?= h($room->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $room->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>-->
    
<section class="content-header">
    <h1>List Rooms</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">rooms</li>
    </ol>
</section>

<!-- Main content -->
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
<!--                <div class="box-header with-border">
                    <h3 class="box-title">Details</h3>
                </div>-->
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                    <th style="width: 10px">S.No</th>
                                    <th>Room no.</th>
                                    <th>Room belongs to Apartment</th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php
                                if (isset($_GET['page'])) {
                                    $i = ($_GET['page'] * 10) + 1;
                                } else {
                                    $i = 1;
                                }
                                foreach ($rooms as $room):
                                    ?>          
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?= h($room->name) ?></td>
                                        <td><?= $room->has('apartment') ? $this->Html->link($room->apartment->name, ['controller' => 'Apartments', 'action' => 'view', $room->apartment->id]) : '' ?></td>
                                        <td>
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $room->id],['class' => 'btn btn-info']) ?>
                                            <?php
                                            echo $this->Html->link(
                                                    'Edit', '/rooms/edit/' . $room->id, ['class' => 'btn btn-primary']
                                            );
                                            ?>
                                            <?=
                                            $this->Form->postLink(
                                                    __('Delete'), ['action' => 'delete', $room->id], ['class' => 'btn btn-danger',
                                                'confirm' => __('Are you sure you want to delete # {0}?', $room->id)]
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
