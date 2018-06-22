<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building[]|\Cake\Collection\CollectionInterface $buildings
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><? //= __('Actions')  ?></li>
        <li><? //= $this->Html->link(__('New Building'), ['action' => 'add'])  ?></li>
        <li><? //= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index'])  ?></li>
        <li><? //= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add'])  ?></li>
    </ul>
</nav>
<div class="buildings index large-9 medium-8 columns content">
    <h3><? //= __('Buildings')  ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><? //= $this->Paginator->sort('id')  ?></th>
                <th scope="col"><? //= $this->Paginator->sort('name')  ?></th>
                <th scope="col"><? //= $this->Paginator->sort('properties_id')  ?></th>
                <th scope="col"><? //= $this->Paginator->sort('created')  ?></th>
                <th scope="col"><? //= $this->Paginator->sort('modified')  ?></th>
                <th scope="col" class="actions"><? //= __('Actions')  ?></th>
            </tr>
        </thead>
        <tbody>
<?php // foreach ($buildings as $building): ?>
            <tr>
                <td><? //= $this->Number->format($building->id)  ?></td>
                <td><? //= h($building->name)  ?></td>
                <td><? //= $building->has('property') ? $this->Html->link($building->property->id, ['controller' => 'Properties', 'action' => 'view', $building->property->id]) : ''  ?></td>
                <td><? //= h($building->created)  ?></td>
                <td><? //= h($building->modified)  ?></td>
                <td class="actions">
<? //= $this->Html->link(__('View'), ['action' => 'view', $building->id]) ?>
<? //= $this->Html->link(__('Edit'), ['action' => 'edit', $building->id]) ?>
<? //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)]) ?>
                </td>
            </tr>
<?php // endforeach; ?>
        </tbody>
    </table>-->
<section class="content-header">
    <h1>List Buildings</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Buildings</li>
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
                                    <th>Building name</th>
                                    <th>Building belongs to property</th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php
                                if (isset($_GET['page'])) {
                                    $i = ($_GET['page'] * 10) + 1;
                                } else {
                                    $i = 1;
                                }
                                foreach ($buildings as $building):
                                    ?>          
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?= h($building->name) ?></td>
                                        <td><?= $building->has('property')? $this->Html->link($building->property->jobsitename, ['controller' => 'Properties', 'action' => 'view', $building->property->id]) : '' ?></td>
                                        <td>
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $building->id,$building->property->id],['class' => 'btn btn-info']) ?>
                                            <?php
                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $building->id,$building->property->id], ['class' => 'btn btn-primary']
                                            );
                                            ?>
                                            <?=
                                            $this->Form->postLink(
                                                    __('Delete'), ['action' => 'delete', $building->id], ['class' => 'btn btn-danger',
                                                'confirm' => __('Are you sure you want to delete # {0}?', $building->id)]
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

